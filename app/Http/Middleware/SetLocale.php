<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('locale')) {
            $locale = $request->session()->get('locale');
        } else {
            // Kies best passende taal, standaard terugvallen op 'en'
            $locale = $request->getPreferredLanguage(['nl', 'en']) ?? config('app.locale', 'en');
        }

            App::setLocale($locale);

        return $next($request);
    }
}

