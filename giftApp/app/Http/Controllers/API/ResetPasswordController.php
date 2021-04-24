<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//add
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BassController as BassController;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/home';


    protected function sendResetResponse(Request $request, $response)
    {
        return response(['message'=> trans($response)]);
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response(['error'=> trans($response)], 422);
    }


    //----------------------------------------

    public function sendResponse($result, $message){

        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message
        ];

        return response()->json($response, 200);
    }


    public function sendError($error, $errormessage= [], $code=404){

        $response = [
            'success' => false,
            'message' => $error
        ];

        if(!empty($errormessage))
        { $response['data'] = $errormessage;}
        return response()->json($response, $code);
    }

/*
    public function tokenCheck(Request $request)
    {
        $token_reset = DB::table('password_resets')->where('email', $request->email)->first();

        if ($token_reset && Hash::check($request->token, $token_reset->token)) {
            //return redirect(url('/password/reset'));
            //return response(['success'=> 'true']);
            //$tokenFromEmail['token'] = $user->createToken('fatimah')->accessToken;
            $tokenFromEmail['token'] = $request->token;
            return $this->sendResponse($tokenFromEmail, 'valid Token');
            //return $this->sendResponse('valid Token');
        }

        return $this->sendError('Invalid Token');
    }
*/
}
