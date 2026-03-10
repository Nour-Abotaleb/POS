<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{
    /**
     * Map user locale (language_code) to Laravel lang folder name.
     * 'en' -> 'eng' (existing folder), 'ar' -> 'ar', etc.
     */
    protected static array $localeMap = [
        'en' => 'eng',
        'ar' => 'ar',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        // Prefer an explicit per-session locale (set from the header switcher),
        // otherwise fall back to the app default (English).
        $locale = session('force_locale') ?? config('app.locale', 'en');

        // Map user-facing locale code to actual lang folder (e.g. 'en' -> 'eng').
        $supported = config('app.supported_locales', []);
        $appLocale = $supported[$locale] ?? (self::$localeMap[$locale] ?? $locale);

        if (! is_dir(lang_path($appLocale))) {
            $appLocale = config('app.fallback_locale', 'eng');
        }

        App::setLocale($appLocale);

        return $next($request);
    }
}
