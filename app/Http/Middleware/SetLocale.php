<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Determine the locale for this request using this priority order:
     *  1. The authenticated user's saved locale (stored in users.locale column)
     *  2. The locale stored in the session (set by the language switcher)
     *  3. The application default from config/app.php
     *
     * The locale is validated against config('app.available_locales') so that
     * a tampered session value cannot force an invalid locale.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $available = config('app.available_locales', ['en']);

        // 1. Prefer the user's saved preference (requires users.locale column)
        if (Auth::check() && in_array(Auth::user()->locale, $available)) {
            App::setLocale(Auth::user()->locale);

        // 2. Fall back to what was stored in the session by the language switcher
        } elseif (Session::has('locale') && in_array(Session::get('locale'), $available)) {
            App::setLocale(Session::get('locale'));

        // 3. Fall back to the application default
        } else {
            App::setLocale(config('app.locale'));
        }

        return $next($request);
    }
}