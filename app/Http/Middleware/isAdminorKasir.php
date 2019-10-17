<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdminorKasir
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
            if( $jabatan == 'Admin' || $jabatan == 'Kasir')
                return $next($request);
            else
                return response()->json(['status' => 'Unauthorized'], 403);
        }
        else
            return response()->json(['error' => 'Unauthorized'], 403);
    }
}
