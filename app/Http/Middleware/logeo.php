<?php

namespace App\Http\Middleware;

use Closure;
use App\Administrador;
use Illuminate\Support\Facades\Auth;

class logeo
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
        if ($request->session()->get('sesionAdministrador') == null) {

            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect('login');;
            }
        }
        return $next($request);
        
    }
}
