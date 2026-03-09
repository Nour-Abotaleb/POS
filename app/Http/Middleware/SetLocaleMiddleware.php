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
        if (auth()->check() && auth()->user()->locale) {
            $locale = auth()->user()->locale;
            $appLocale = self::$localeMap[$locale] ?? $locale;
            if (is_dir(lang_path($appLocale))) {
                App::setLocale($appLocale);
            }
        } else {
            App::setLocale(config('app.fallback_locale', 'eng'));
        }

        return $next($request);
    }
}
