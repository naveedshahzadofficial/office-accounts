<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password'=> 'required'
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if(Auth::attempt( array($fieldType => $request->username, 'password' => $request->password))){
            $user =  User::with('role')->find(auth()->id());
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
            $user =  User::with('role')->find(auth()->id());
            return $this->setData($user)->getResponse();
        }catch (\Exception $exception){
            return $this->setError(true)
                ->setStatusCode(400)
                ->setMessage($exception->getMessage().'<br>'.$exception->getTrace())
                ->getResponse();
        }
    }
}
