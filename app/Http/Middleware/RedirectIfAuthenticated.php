<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // $guards = empty($guard) ? [null] : $guard;
        // foreach ($guards as $guard) {
            Config::set('auth.guards.customer.driver','session');
            Config::set('auth.guards.employee.driver','session');
            if($guard == 'customer'){
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('Frontend.Frontend.home');
                } else if (Auth::guard('employee')->check()) {
                    return redirect()->route('Frontend.Frontend.home');
                }else {
                    return $next($request);
                }
            }else if($guard== null || $guard=='web'){
                if (Auth::guard('web')->check()) {
                    return redirect(RouteServiceProvider::HOME);
                }else {
                    return $next($request);
                }
            }
        
       

           
        // }

        
    }
}
