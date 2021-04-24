<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /*
    //this was before
    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }
    */

    public function __construct($data)
    {
        $this->email_data = $data;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*
        //هذا كان اول
        return $this->subject('Mail from Gift App - Game Development')
        ->view('emails.TestMail');
        */
        //add for verificiation

/*
        return $this->from(env('MAIL_USERNAME'), 'Gift App')->subject("Welcome to Gift app!")->view('signup-email', ['email_data' => $this->email_data]);
    */  }
}
