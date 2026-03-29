<?php

namespace App\Livewire\Shop;

use Livewire\Component;
use App\Models\LanguageSetting;

class LanguageSwitcher extends Component
{
    /** 'inline' (footer) | 'menu' (drawer row) */
    public string $variant = 'inline';

    public function setLanguage($locale)
    {
        session(['customer_locale' => $locale]);
        $language = LanguageSetting::where('language_code', $locale)->first();
        $isRtl = ($language->is_rtl == 1);
        session(['customer_is_rtl' => $isRtl]);

        $this->js('window.location.reload()');

    }

    public function render()
    {
        $locale = session('customer_locale') ?? global_setting()->locale;

        $codes = languages()->pluck('language_code')->all();
        $hasAr = in_array('ar', $codes, true);
        $hasEn = in_array('en', $codes, true);
        $onlyArEnPair = $hasAr && $hasEn && languages()->count() === 2;

        return view('livewire.shop.language-switcher', [
            'currentLocale' => $locale,
            'hasArEnToggle' => $onlyArEnPair,
        ]);
    }

}
