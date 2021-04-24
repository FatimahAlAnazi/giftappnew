<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BassController as BassController;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use phpDocumentor\Reflection\Types\Null_;

class RegisterController extends BassController
{
    use HasApiTokens;

    //for register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);


        if ($validator->fails()) {
            return $this->sendError('Your information is not correct', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('fatimah')->accessToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'You registered successfully');
    }


    //login with verification
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();
            if(Auth::user()->email_verified_at == null){
                Auth::logout();
                return $this->sendError('Unauthorised', ['error', 'Please verify your Email']);
            }

            $success['token'] = $user->createToken('fatimah')->accessToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success, 'You logged in successfully');
        } else {
            return $this->sendError('Unauthorised', ['error', 'Unauthorised']);
        }
    }


    //for logout
    protected function loggedOut(Request $request)
    {
        Auth::logout();
        return redirect(url('/login'));
    }
}


