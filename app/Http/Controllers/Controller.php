<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;


abstract class Controller
{
    /**
     * @var array
     */
    public $data = [];

    /**
     * @param mixed $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param mixed $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * @param mixed $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __construct()
    {
        $this->checkMigrateStatus();

        // Keep the locale logic consistent with SetLocaleMiddleware:
        // use a session override if present, otherwise fall back to the app default (English).
        $locale = session('force_locale') ?? config('app.locale', 'en');

        $supported = config('app.supported_locales', []);
        $appLocale = $supported[$locale] ?? $locale;

        try {
            App::setLocale($appLocale);
        } catch (\Exception $e) {
            App::setLocale('en');
        }
    }

    public function checkMigrateStatus()
    {
        return check_migrate_status();
    }
}
