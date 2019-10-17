<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CSWeb
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
        if(Auth::check()) {
            $jabatan = Auth::user()->jabatan_pegawai;
            if( $jabatan == 'Customer Service') 
                return $next($request);
            else
                return redirect('/');
        }
        else
            return redirect('/');
    }
}
