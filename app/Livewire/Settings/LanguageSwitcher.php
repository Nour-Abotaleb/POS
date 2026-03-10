<?php

namespace App\Livewire\Settings;

use App\Models\User;
use App\Scopes\BranchScope;
use Livewire\Component;

class LanguageSwitcher extends Component
{
    /** Locales always available in the header for anyone to switch (no Settings required). */
    protected static array $headerLocales = ['en', 'ar'];

    /** RTL language codes. */
    protected static array $rtlLocales = ['ar', 'fa'];

    /** Display names for header locales (in their own language). */
    protected static array $localeNames = [
        'en' => 'English',
        'ar' => 'عربي',
    ];

    public function setLanguage($locale)
    {
        $this->applyLanguage($locale);
    }

    /**
     * Toggle language from header (e.g. English <-> Arabic). Works for everyone, no admin setup.
     */
    public function toggleLanguage()
    {
        $current = $this->getEffectiveLocale();
        $other = collect(static::$headerLocales)->first(fn ($code) => $code !== $current) ?? 'ar';
        $this->applyLanguage($other);
    }

    /**
     * Effective locale: session override (from switcher), else app default (en).
     * Matches SetLocaleMiddleware so the label always reflects the active language.
     */
    protected function getEffectiveLocale(): string
    {
        return session('force_locale') ?? config('app.locale', 'en');
    }

    protected function applyLanguage(string $locale): void
    {
        if (! in_array($locale, static::$headerLocales, true)) {
            return;
        }

        User::withoutGlobalScope(BranchScope::class)->where('id', user()->id)->update(['locale' => $locale]);

        auth()->user()->refresh();
        session()->forget('user');
        session(['user' => auth()->user()]);
        // Remember the chosen locale in the session so middleware & helpers
        // can treat it as the active language for this browser session.
        session(['force_locale' => $locale]);
        session(['isRtl' => in_array($locale, static::$rtlLocales, true)]);

        $this->js('window.location.reload()');
    }

    public function getCurrentLanguageName(): string
    {
        $locale = $this->getEffectiveLocale();

        return static::$localeNames[$locale] ?? 'English';
    }

    public function render()
    {
        return view('livewire.settings.language-switcher', [
            'currentLanguageName' => $this->getCurrentLanguageName(),
        ]);
    }
}
