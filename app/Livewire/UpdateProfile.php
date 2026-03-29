<?php

namespace App\Livewire;

use App\Models\Country;
use App\Models\Customer;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class UpdateProfile extends Component
{
    use LivewireAlert;

    public $fullName;
    public $email;
    public $phone;
    public $phoneCode;
    public $address;
    public $phoneCodeSearch = '';
    public $phoneCodeIsOpen = false;
    public $allPhoneCodes;
    public $filteredPhoneCodes;

    /** Show edit form vs. summary card (shop profile design). */
    public $showEditForm = false;

    public ?string $restaurantHash = null;

    public $shopBranchId = null;

    public function mount($restaurantHash = null, $shopBranchId = null)
    {
        if (is_null(customer())) {
            return $this->redirect(route('home'));
        }

        $this->restaurantHash = $restaurantHash;
        $this->shopBranchId = $shopBranchId;
        $this->loadCustomerData();

        // Initialize phone codes
        $this->allPhoneCodes = collect(Country::pluck('phonecode')->unique()->filter()->values());
        $this->filteredPhoneCodes = $this->allPhoneCodes;
    }

    protected function loadCustomerData(): void
    {
        $c = customer();
        $this->fullName = $c->name;
        $this->email = $c->email;
        $this->phone = $c->phone;
        $this->phoneCode = $c->phone_code;
        $this->address = $c->delivery_address;
    }

    public function startEditing(): void
    {
        $this->loadCustomerData();
        $this->showEditForm = true;
    }

    public function cancelEditing(): void
    {
        $this->loadCustomerData();
        $this->showEditForm = false;
        $this->phoneCodeIsOpen = false;
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
        $this->phoneCode = $phonecode;
        $this->phoneCodeIsOpen = false;
        $this->phoneCodeSearch = '';
        $this->updatedPhoneCodeSearch();
    }

    public function submitForm()
    {
        $this->validate([
            'fullName' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $customer = Customer::findOrFail(customer()->id);
        $customer->name = $this->fullName;
        $customer->phone = $this->phone;
        $customer->phone_code = $this->phoneCode;
        $customer->delivery_address = $this->address;
        $customer->save();

        session(['customer' => $customer]);
        $this->dispatch('setCustomer', customer: $customer);

        $this->loadCustomerData();
        $this->showEditForm = false;

        $this->alert('success', __('messages.profileUpdated'), [
            'position' => 'center'
        ]);

    }

    public function render()
    {
        return view('livewire.update-profile', [
            'phonecodes' => $this->filteredPhoneCodes,
        ]);
    }

}
