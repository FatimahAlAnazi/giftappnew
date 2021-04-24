<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\testMail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{

    public function sendEmail(request $request)
    {
        /*
        $input = $request->all();
        $validator = validator::make($input, [
            'email' => 'required|email',
        ]);

        /*
        if ($validator->fails()) {
            return $this->sendError('All fields are required', $validator->errors());
        }
        */

        $details = [
            'title' => 'Mail from Gift App - Game Development',
            'body' => 'This is for testing email using smtp'
        ];

        //$input = the used email
        Mail::to('fatimahLaravel@gmail.com')->send(new testMail($details));
            return "Email sent";
    }
}
