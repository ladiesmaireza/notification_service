<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserNotificationMail;

class EmailService
{
    /**
     * Mengirim email pendaftaran ke user
     *
     * @param string
     * @param string
     * @return void
     */
    public function sendRegistrationEmail(string $name, string $email): void
    {
        Mail::to($email)->send(new UserNotificationMail($name, $email));
    }
}
