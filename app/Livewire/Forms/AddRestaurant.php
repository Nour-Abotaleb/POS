<?php

namespace App\Livewire\Forms;

use App\Enums\PackageType;
use App\Models\User;
use App\Models\Role;
use App\Models\Branch;
use App\Models\Country;
use App\Models\Package;
use Livewire\Component;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Http;
use App\Notifications\WelcomeRestaurantEmail;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AddRestaurant extends Component
{

    public $restaurantName;
    public $sub_domain;
    public $fullName;
    public $email;
    public $password;
    public $branchName;
    public $address;
    public $country;
    public $status;
    public $facebook;
    public $instagram;
    public $twitter;
    public $licenseType = 'free';
    public $showUserForm = true;
    public $showBranchForm = false;
    public $domain;
    public $phoneCode;
    public $phone;
    public $restaurantPhoneNumber;
    public $restaurantPhoneCode;
    public $phoneCodeSearch = '';
    public $phoneCodeIsOpen = false;
    public $allPhoneCodes;
    public $filteredPhoneCodes;
    public $isSubmitting = false;



    #[\Livewire\Attributes\Computed]
    public function countries()
    {
        return Country::select('id', 'countries_name')->get();
    }

    public function mount()
    {
        $this->domain = '.' . getDomain();

        $ipCountry = (new User)->getCountryFromIp();

        $defaultCountry = Country::where('countries_code', $ipCountry)->first();
        if (!$defaultCountry) {
            $defaultCountry = Country::first();
        }
        $this->country = $defaultCountry->id;
        $this->phoneCode = user()?->phone_code ?? $defaultCountry->phonecode;
        $this->restaurantPhoneCode = $this->phoneCode; // Set default for select box
        $this->status = 1; // Set default status to active

        // Initialize phone codes
        $this->allPhoneCodes = collect(Country::pluck('phonecode')->unique()->filter()->values());
        $this->filteredPhoneCodes = $this->allPhoneCodes;
    }

    public function updatedCountry($value)
    {
        $country = Country::find($value);
        $this->phoneCode = $country->phonecode;
    }

    public function updatedPhoneCodeIsOpen($value)
    {
        if (!$value) {
            $this->reset(['phoneCodeSearch']);
            $this->updatedPhoneCodeSearch();
        }
    }

    public function updatedPhoneCodeSearch()
    {
        $this->filteredPhoneCodes = $this->allPhoneCodes->filter(function ($phonecode) {
            return str_contains($phonecode, $this->phoneCodeSearch);
        })->values();
    }

    public function selectPhoneCode($phonecode)
    {
        $this->restaurantPhoneCode = $phonecode;
        $this->phoneCodeIsOpen = false;
        $this->phoneCodeSearch = '';
        $this->updatedPhoneCodeSearch();
    }

    public function submitForm()
    {
        if (!$this->validateSubdomain()) {
            return;
        }

        $this->validate([
            'restaurantName' => 'required',
            'fullName' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'restaurantPhoneNumber' => [
                'required',
                'regex:/^[0-9\s]{8,20}$/',
            ],
        ]);

        $this->showUserForm = false;
        $this->showBranchForm = true;
    }

    public function submitForm2()
    {
        // Prevent double submission
        if ($this->isSubmitting) {
            return;
        }

        $this->isSubmitting = true;

        $timezone = (new User)->getTimezoneFromIp();

        try {
            $this->validate([
                'address' => 'required',
                'branchName' => 'required',
            ]);

            // Start database transaction to ensure data consistency
            \DB::beginTransaction();

            try {
                // Create restaurant
                $restaurant = new Restaurant();
                $restaurant->name = $this->restaurantName;
                $package = Package::firstWhere('package_type', PackageType::DEFAULT);

                if (module_enabled('Subdomain')) {
                    $restaurant->sub_domain = strtolower($this->sub_domain . $this->domain);
                }

                $restaurant->hash = md5(microtime() . rand(1, 99999999));
                $restaurant->address = $this->address;
                $restaurant->timezone = $timezone ?? 'UTC';
                $restaurant->theme_hex = global_setting()->theme_hex;
                $restaurant->theme_rgb = global_setting()->theme_rgb;
                $restaurant->email = $this->email;
                $restaurant->country_id = $this->country;
                $restaurant->license_type = $this->licenseType;
                $restaurant->phone_number = $this->restaurantPhoneNumber;
                $restaurant->phone_code = $this->restaurantPhoneCode;
                $restaurant->is_active = (bool)$this->status;
                $restaurant->facebook_link = $this->facebook;
                $restaurant->instagram_link = $this->instagram;
                $restaurant->twitter_link = $this->twitter;
                $restaurant->customer_site_language = 'en';
                $restaurant->save();

                Log::info('Restaurant created successfully', ['restaurant_id' => $restaurant->id, 'name' => $restaurant->name]);

                // Create branch
                $branch = Branch::create([
                    'name' => $this->branchName,
                    'restaurant_id' => $restaurant->id,
                    'address' => $this->address,
                ]);

                Log::info('Branch created successfully', ['branch_id' => $branch->id, 'name' => $branch->name]);

                // Create roles first
                $adminRole = Role::create(['name' => 'Admin_' . $restaurant->id, 'display_name' => 'Admin', 'guard_name' => 'web', 'restaurant_id' => $restaurant->id]);
                $branchHeadRole = Role::create(['name' => 'Branch Head_' . $restaurant->id, 'display_name' => 'Branch Head', 'guard_name' => 'web', 'restaurant_id' => $restaurant->id]);

                Role::create(['name' => 'Waiter_' . $restaurant->id, 'display_name' => 'Waiter', 'guard_name' => 'web', 'restaurant_id' => $restaurant->id]);
                Role::create(['name' => 'Chef_' . $restaurant->id, 'display_name' => 'Chef', 'guard_name' => 'web', 'restaurant_id' => $restaurant->id]);

                Log::info('Roles created successfully', ['restaurant_id' => $restaurant->id]);

                // Assign permissions to roles
                $allPermissions = Permission::get()->pluck('name')->toArray();
                $adminRole->syncPermissions($allPermissions);
                $branchHeadRole->syncPermissions($allPermissions);

                Log::info('Permissions assigned to roles', ['restaurant_id' => $restaurant->id]);

                // Create user - this is the critical part
                $userData = [
                    'name' => $this->fullName,
                    'email' => $this->email,
                    'phone_number' => $this->restaurantPhoneNumber,
                    'phone_code' => $this->restaurantPhoneCode,
                    'password' => bcrypt($this->password),
                    'facebook' => $this->facebook,
                    'instagram' => $this->instagram,
                    'twitter' => $this->twitter,
                    'restaurant_id' => $restaurant->id,
                    'branch_id' => $branch->id,
                ];

                Log::info('Creating user with data', ['email' => $this->email, 'restaurant_id' => $restaurant->id]);

                $user = User::create($userData);

                Log::info('User created successfully', ['user_id' => $user->id, 'email' => $user->email]);

                // Assign admin role to user
                $user->assignRole('Admin_' . $restaurant->id);

                Log::info('Admin role assigned to user', ['user_id' => $user->id, 'role' => 'Admin_' . $restaurant->id]);

                // Commit transaction
                \DB::commit();

                Log::info('Restaurant creation completed successfully', [
                    'restaurant_id' => $restaurant->id,
                    'user_id' => $user->id,
                    'email' => $user->email
                ]);

                // Send welcome email (outside transaction to avoid rollback on email failure)
                try {
                    $user->notify(new WelcomeRestaurantEmail($restaurant, $this->password));
                    Log::info('Welcome email sent successfully', ['email' => $user->email]);
                } catch (\Exception $e) {
                    Log::error('Error sending restaurant welcome email: ' . $e->getMessage(), [
                        'email' => $user->email,
                        'restaurant_id' => $restaurant->id
                    ]);
                }

                // Reset isSubmitting and redirect with page reload
                $this->isSubmitting = false;
                return $this->redirect(route('superadmin.restaurants.index'), navigate: false);

            } catch (\Exception $e) {
                // Rollback transaction on any error
                \DB::rollback();
                
                Log::error('Error creating restaurant: ' . $e->getMessage(), [
                    'email' => $this->email,
                    'restaurant_name' => $this->restaurantName,
                    'trace' => $e->getTraceAsString()
                ]);
                
                $this->isSubmitting = false;
                throw $e;
            }

        } catch (\Exception $e) {
            $this->isSubmitting = false;
            
            // Add user-friendly error message
            $this->addError('general', 'Failed to create restaurant. Please check the logs for details.');
            
            Log::error('Restaurant creation failed: ' . $e->getMessage());
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.forms.add-restaurant', [
            'phonecodes' => $this->filteredPhoneCodes,
        ]);
    }

    /**
     * Validate the subdomain input
     *
     * @return bool Returns true if validation passes, false otherwise
     */
    private function validateSubdomain()
    {
        // Skip validation if Subdomain module is not enabled
        if (!module_enabled('Subdomain')) {
            return true;
        }


        // Validate domain or subdomain based on input
        if (empty($this->domain)) {
            $this->validate([
                'sub_domain' => 'required|string'
            ]);
            // For custom domains, we don't need to validate the domain field
            // as it's intentionally empty for custom domains
            // Just continue with the subdomain validation below
        } else {
            $this->validate([
                'sub_domain' => 'required|min:3|max:50|regex:/^[a-z0-9\-_]{2,20}$/|banned_sub_domain',
            ]);
        }


        // Check if subdomain is already in use
        $fullSubdomain = strtolower($this->sub_domain . $this->domain);
        if (Restaurant::where('sub_domain', $fullSubdomain)->exists()) {
            $this->addError('sub_domain', __('subdomain::app.messages.subdomainAlreadyExists'));
            return false;
        }

        return true;
    }

}
