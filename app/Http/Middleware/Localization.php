<?php

namespace App\Http\Middleware;

use Closure;
//use Illuminate\Support\Facades\Log;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->get('locale')) {
            app()->setLocale(session()->get('locale'));

            //Log::debug("Check logging works...in the middleware. and it is now ".app()->getLocale());
        }

        return $next($request);
    }
}
