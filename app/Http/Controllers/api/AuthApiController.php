<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    public function register(Request $request){
        return $request;
        // $user=User::create([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>$request->password
        // ]);
        // $token=$user->createToken('passport auth')->accessToken();
        // return response()->json(['token'=>$token]);
    }
}
