<?php

namespace App\Livewire\Settings;

use App\Models\Country;
use Livewire\Component;
use App\Models\OrderType;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\RestaurantTax;
use App\Models\RestaurantCharge;
use PHPUnit\Framework\Constraint\Count;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\PredefinedAmount;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class GeneralSettings extends Component
{

    use LivewireAlert, WithPagination;

    public $settings;
    public $restaurantName;
    public $restaurantAddress;
    public $restaurantPhoneCode;
    public $restaurantPhoneNumber;
    public $restaurantEmailAddress;
    public $vatNumber;
    public $commercialRegistration;
    public $taxName;
    public $taxId;
    public $showTax = false;
    public $taxFields = [];
    public $confirmDeleteTax = false;
    public $isSaveClicked = false;
    public $fieldId;
    public $fieldIndex;
    public $confirmDeleteTaxModal = false;
    public $showChargesForm = false;
    public $selectedChargeId;
    public $confirmDeleteChargeModal = false;
    public $countries;
    public $phoneCodeSearch = '';
    public $phoneCodeIsOpen = false;
    public $allPhoneCodes;
    public $filteredPhoneCodes;
    public $predefinedAmounts = [];
    public $showPredefinedAmountsForm = false;
    public $zatcaPrivateKey;
    public $zatcaCertificate;
    public $zatcaSecret;
    public $zatcaApiEnvironment;
    public $zatcaCsid;
    public $zatcaOtp;
    public $zatcaOnboardingStatus;
    public $zatcaOnboardingError;

    public function mount()
    {
        $this->restaurantName = $this->settings->name;
        $this->restaurantAddress = $this->settings->address;
        $this->restaurantEmailAddress = $this->settings->email;
        $this->restaurantPhoneCode = $this->settings->phone_code;
        $this->restaurantPhoneNumber = ltrim($this->settings->phone_number, '+');
        $this->vatNumber = $this->settings->vat_number;
        $this->commercialRegistration = $this->settings->commercial_registration;
        $this->zatcaPrivateKey = $this->settings->zatca_private_key;
        $this->zatcaCertificate = $this->settings->zatca_certificate;
        $this->zatcaSecret = $this->settings->zatca_secret;
        $this->zatcaApiEnvironment = $this->settings->zatca_api_environment ?? 'simulation';
        $this->zatcaCsid = $this->settings->zatca_csid;
        $this->zatcaOnboardingStatus = $this->settings->zatca_onboarding_status ?? 'not_started';

        $this->fatchData();

        if (empty($this->taxFields)) {
            $this->addMoreTaxFields();
        }

        $this->countries = Country::all();

        // Initialize phone codes
        $this->allPhoneCodes = collect(Country::pluck('phonecode')->unique()->filter()->values());
        $this->filteredPhoneCodes = $this->allPhoneCodes;

        // Initialize predefined amounts
        $this->loadPredefinedAmounts();
    }

    public function showForm($id = null)
    {
        $this->selectedChargeId = $id;
        $this->showChargesForm = true;
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

    public function fatchData()
    {

        $reciptSetting = restaurant()->receiptSetting;
        $this->showTax = (bool)$reciptSetting->show_tax;
        $taxes = RestaurantTax::all();

        $this->taxFields = $taxes->map(function ($tax) {
            return [

                'taxId' => $tax->tax_id,
                'taxName' => $tax->tax_name,
                'id' => $tax->id
            ];
        })->toArray();
    }

    public function addMoreTaxFields()
    {
        $this->taxFields[] = ['taxId' => '', 'taxName' => '' ,'id' => null];
    }

    public function submitForm()
    {
        $this->validate([
            'restaurantName' => 'required',
            'restaurantPhoneNumber' => [
                'required',
                'regex:/^[0-9\s]{8,20}$/',
            ],
            'restaurantPhoneCode' => 'required',
            'restaurantEmailAddress' => 'required|email',
        ]);

        $fullPhone = '+' . trim($this->restaurantPhoneCode) . ' ' . trim($this->restaurantPhoneNumber);

        $this->settings->email = $this->restaurantEmailAddress;
        $this->settings->name = $this->restaurantName;
        $this->settings->phone_number = $this->restaurantPhoneNumber;
        $this->settings->phone_code = $this->restaurantPhoneCode;
        $this->settings->address = $this->restaurantAddress;
        $this->settings->vat_number = $this->vatNumber;
        $this->settings->commercial_registration = $this->commercialRegistration;
        $this->settings->zatca_private_key = $this->zatcaPrivateKey;
        $this->settings->zatca_certificate = $this->zatcaCertificate;
        $this->settings->zatca_secret = $this->zatcaSecret;
        $this->settings->zatca_api_environment = $this->zatcaApiEnvironment;
        $this->settings->zatca_csid = $this->zatcaCsid;
        $this->settings->save();

        session()->forget(['restaurant', 'timezone', 'currency']);

        $this->alert('success', __('messages.settingsUpdated'), [
            'toast' => true,
            'position' => 'top-end',
            'showCancelButton' => false,
            'cancelButtonText' => __('app.close')
        ]);
    }

    public function showConfirmationField($id = null, $index)
    {

        if (is_null($id)) {
            $this->removeLastTaxField($index);
        }
        else
        {
            $this->confirmDeleteTaxModal = true;
            $this->fieldId = $id;
            $this->fieldIndex = $index;
        }
    }

    public function deleteAndRemove($id, $index)
    {
        $this->deleteRecord($id);
        $this->removeLastTaxField($index);
        $this->reset(['fieldId', 'fieldIndex', 'confirmDeleteTaxModal']);
    }

    public function removeLastTaxField($index)
    {
        if (isset($this->taxFields[$index])) {
            unset($this->taxFields[$index]);
            $this->taxFields = array_values($this->taxFields);
        }
    }

    public function deleteRecord($id)
    {
        RestaurantTax::destroy($id);
        $this->confirmDeleteTax = false;
        session()->flash('message', 'Record deleted successfully.');
    }

    public function submitTax()
    {
        $this->taxFields = array_values(array_filter($this->taxFields, function ($field) {
            return !empty($field['taxName']) && !empty($field['taxId']);
        }));

        $this->validate([
        'taxFields.*.taxName' => 'required',
        'taxFields.*.taxId' => 'required',
        'showTax' => 'boolean',
        ]);

        $restaurantId = restaurant()->id;

        foreach ($this->taxFields as $field) {
            RestaurantTax::updateOrCreate(
            ['id' => $field['id']],
            [
                'restaurant_id' => $restaurantId,
                'tax_id' => $field['taxId'],
                'tax_name' => $field['taxName'],
            ]
            );
        }

        $reciptSetting = restaurant()->receiptSetting;
        $reciptSetting->show_tax = $this->showTax;
        $reciptSetting->save();

        $this->fatchData();
        $this->alert('success', __('messages.settingsUpdated'), [
        'toast' => true,
        'position' => 'top-end',
        'showCancelButton' => false,
        'cancelButtonText' => __('app.close'),
        ]);
    }

    #[On('hideShowChargesForm')]
    public function hideShowChargesForm()
    {
        $this->showChargesForm = false;
    }

    public function confirmDeleteCharge($id)
    {
        $this->confirmDeleteChargeModal = true;
        $this->selectedChargeId = $id;
    }

    public function deleteCharge($id)
    {
        RestaurantCharge::destroy($id);

        $this->selectedChargeId = null;
        $this->confirmDeleteChargeModal = false;

        $this->alert('success', __('messages.chargeDeleted'), [
            'toast' => true,
            'position' => 'top-end',
            'showCancelButton' => false,
            'cancelButtonText' => __('app.close')
        ]);
    }

    public function loadPredefinedAmounts()
    {
        $amounts = restaurant()->predefinedAmounts()->get();

        if ($amounts->isEmpty()) {
            // If no predefined amounts exist, create default ones
            $this->createDefaultPredefinedAmounts();
            $amounts = restaurant()->predefinedAmounts()->get();
        }

        $this->predefinedAmounts = $amounts->map(function ($amount) {
            return [
                'id' => $amount->id,
                'amount' => $amount->amount,
            ];
        })->toArray();
    }

        public function createDefaultPredefinedAmounts()
    {
        $defaultAmounts = [50, 100, 500, 1000];

        foreach ($defaultAmounts as $amount) {
            PredefinedAmount::create([
                'restaurant_id' => restaurant()->id,
                'amount' => $amount,
            ]);
        }
    }

    public function editPredefinedAmounts()
    {
        $this->showPredefinedAmountsForm = true;
    }

    public function hidePredefinedAmountsForm()
    {
        $this->showPredefinedAmountsForm = false;
        $this->loadPredefinedAmounts();
    }



    public function savePredefinedAmounts()
    {
        $this->validate([
            'predefinedAmounts.*.amount' => 'required|numeric|min:0',
        ]);

        // Then, check for duplicates in the array
        $amounts = collect($this->predefinedAmounts)->pluck('amount');

        if ($amounts->duplicates()->isNotEmpty()) {
            throw ValidationException::withMessages([
                'predefinedAmounts' => __('Each amount must be unique.'),
            ]);
        }

        // Save amounts
        foreach ($this->predefinedAmounts as $amount) {
            if ($amount['amount'] > 0) {
                PredefinedAmount::updateOrCreate(
                    ['id' => $amount['id']],
                    [
                        'restaurant_id' => restaurant()->id,
                        'amount' => $amount['amount'],
                    ]
                );
            }
        }

        $this->loadPredefinedAmounts();
        $this->showPredefinedAmountsForm = false;

        $this->alert('success', __('messages.settingsUpdated'), [
            'toast' => true,
            'position' => 'top-end',
            'showCancelButton' => false,
            'cancelButtonText' => __('app.close')
        ]);
    }

    public function render()
    {
        $orderTypes = OrderType::all();
        return view('livewire.settings.general-settings', [
            'charges' => RestaurantCharge::paginate(5),
            'phonecodes' => $this->filteredPhoneCodes,
            'orderTypes' => $orderTypes,
        ]);
    }

    public $generatedCsr;

    public function generateZatcaCsr()
    {
        try {
            $this->validate([
                'vatNumber' => 'required',
                'restaurantName' => 'required',
                'zatcaApiEnvironment' => 'required',
            ]);

            $csrRequest = \Salla\ZATCA\Models\CSRRequest::make()
                ->setUID($this->vatNumber)
                ->setCommonName($this->restaurantName)
                ->setOrganizationName($this->restaurantName)
                ->setOrganizationalUnitName($this->restaurantName)
                ->setCountryName('SA')
                ->setRegisteredAddress($this->restaurantAddress ?? 'Saudi Arabia')
                ->setSerialNumber('NOMU', '1.0', (string) \Illuminate\Support\Str::uuid())
                ->setInvoiceType(true, true) // Both standard and simplified
                ->setCurrentZatcaEnv($this->zatcaApiEnvironment);

            $csrGenerator = \Salla\ZATCA\GenerateCSR::fromRequest($csrRequest);
            $csrGenerator->initialize();
            $csrObj = $csrGenerator->generate();

            $this->zatcaPrivateKey = $csrObj->getPrivateKey();
            $this->generatedCsr = $csrObj->getCSR();
            
            $this->alert('success', 'CSR Generated Successfully. You can now use the OTP to onboard.');
        } catch (\Exception $e) {
            $this->alert('error', 'CSR Generation Failed: ' . $e->getMessage());
        }
    }

    public function onboardZatca()
    {
        if (!$this->zatcaOtp) {
            $this->alert('error', 'Please enter the OTP from ZATCA Portal.');
            return;
        }

        if (!$this->zatcaPrivateKey || !str_contains($this->zatcaPrivateKey, 'PRIVATE KEY')) {
            $this->generateZatcaCsr();
        }

        try {
            $endpoint = $this->getZatcaEndpoint($this->zatcaApiEnvironment) . '/compliance';
            
            $response = \Illuminate\Support\Facades\Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'OTP' => $this->zatcaOtp,
                'Accept-Version' => 'V2',
            ])->post($endpoint, [
                'csr' => base64_encode($this->generatedCsr),
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $this->zatcaCsid = $data['binarySecurityToken'] ?? null;
                $this->zatcaSecret = $data['secret'] ?? null;
                
                // For simplicity, we also set the certificate which is the binarySecurityToken
                $this->zatcaCertificate = "-----BEGIN CERTIFICATE-----\n" . wordwrap($this->zatcaCsid, 64, "\n", true) . "\n-----END CERTIFICATE-----";
                
                $this->alert('success', 'System Onboarded Successfully (Compliance Stage).');
                $this->submitForm(); // Save changes
            } else {
                $this->zatcaOnboardingError = $response->body();
                $this->alert('error', 'Onboarding Failed: ' . $response->body());
            }
        } catch (\Exception $e) {
            $this->alert('error', 'Onboarding Exception: ' . $e->getMessage());
        }
    }

    private function getZatcaEndpoint($env)
    {
        return match ($env) {
            'developer' => 'https://gw-apic-gov.gazt.gov.sa/e-invoicing/developer-portal',
            'simulation' => 'https://gw-apic-gov.gazt.gov.sa/e-invoicing/simulation',
            'production' => 'https://gw-apic-gov.gazt.gov.sa/e-invoicing/core',
            default => 'https://gw-apic-gov.gazt.gov.sa/e-invoicing/simulation',
        };
    }
}
