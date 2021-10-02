<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{

    public function login(Request $request){
        $request->validate([
           'email' => 'required|email',
            'password'=> 'required'
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            $user = Auth::user();
            $user->api_token =  $user->createToken('barber_app')->plainTextToken;
            return $this->setData($user)->getResponse();
        }
        return $this->setError(true)
                    ->setMessage("The provided credentials are incorrect.")
                    ->getResponse();
    }

    public function logout(Request $request){
        Auth::logout();
    }

    public function user(Request $request){
        try {
            return $this->setData(auth()->user())->getResponse();
        }catch (\Exception $exception){
            return $this->setError(true)
                ->setStatusCode(400)
                ->setMessage($exception->getMessage().'<br>'.$exception->getTrace())
                ->getResponse();
        }
    }
}
