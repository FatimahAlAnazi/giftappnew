<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//additional
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    //send case success
    protected function sendResetLinkResponse(Request $request, $response)
    {
        $token_reset = DB::table('password_resets')->where('email', $request->email)->first();
        $tokenFromEmail['token'] = $request->token;
        return $this->sendResponse($tokenFromEmail, ['message'=> trans($response)]);
    }

    //send case fail
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
       // return response(['error'=> trans($response)], 422);
       return $this->sendError(['error'=> trans($response)]);
    }

    //---------------------------------------------------------------

    public function sendResponse($result, $message){

        $response = [
            'success' => true,
           // 'data' => $result,
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
}
