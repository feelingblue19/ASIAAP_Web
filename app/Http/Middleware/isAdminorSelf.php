<?php

namespace App\Http\Middleware;

use Closure;
use \Auth;

class isAdminorSelf
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
            $requestedPegawaiID = $request->route()->parameter('id');
            if( $jabatan == 'Admin' || Auth::user()->id_pegawai == $requestedPegawaiID)
                return $next($request);
            else
                return response()->json(['status' => 'Unauthorized'], 403);
        }
        else
            return response()->json(['error' => 'Unauthorized'], 403);
    }
}
