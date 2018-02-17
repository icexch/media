<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $previousUrlPath = array_get(parse_url(url()->previous()), 'path');

            if(!$previousUrlPath) {
                return auth()->user()->isAdvertiser() ? redirect()->route('advertiser.dashboard') : redirect()->route('publisher.dashboard');
            }
        }

        return $next($request);
    }
}
