<?php

namespace App\Http\Middleware;

use Closure;
use \Auth;

class isAdmin
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
            if( $jabatan == 'Admin')
                return $next($request);
            else
                return response()->json(['status' => 'Unauthorized'], 401);
        }
        else
            return response()->json(['error' => 'Unauthorized'], 401);

    }
}
