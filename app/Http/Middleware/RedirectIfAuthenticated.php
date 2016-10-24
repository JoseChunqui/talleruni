<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->get('sesionAdministrador') == true) {
            echo "Ya para que te vas a volver a logear rufian";
            return redirect('admin/revisarVentas');
        }
        return $next($request);
    }
}
