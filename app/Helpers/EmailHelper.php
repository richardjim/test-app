<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;

class EmailHelper
{
    public static function sendConfirmationEmail($user)
    {
        $to = $user->email;
        $subject = 'Account Confirmation';
        $message = 'Thank you for registering.';

        Mail::send('emails.confirmation', ['user' => $user], function ($message) use ($to, $subject) {
            $message->to($to)
                    ->subject($subject);
        });
    }
}

