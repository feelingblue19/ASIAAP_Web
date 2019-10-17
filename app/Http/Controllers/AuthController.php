<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json(['jabatan' => Auth::user()->jabatan_pegawai, 'token' => $token], 200)->header('Authorization', $token);
        }
        return response()->json(['error' => 'login_error'], 401);
    }

    public function logout()
    {
        $this->guard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs', 'token' => $token], 200)
                ->header('Authorization', $token);
        }
        else
            return response()->json(['error' => 'refresh_token_error'], 401);
        // $token = JWTAuth::getToken();
        // if(!$token){
        //     throw new BadRequestHtttpException('Token not provided');
        // }
        // try{
        //     $token = JWTAuth::refresh($token);
        // }catch(TokenInvalidException $e){
        //     throw new AccessDeniedHttpException('The token is invalid');
        // }
        // return response()->json(['token'=>$token]);
    }

    private function guard()
    {
        return Auth::guard();
    }
}
