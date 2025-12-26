<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendUserNotification($name, $email)
    {
        Mail::send([], [], function ($message) use ($name, $email) {
            $message->to($email)
                ->subject('Selamat! Pendaftaran Anda Berhasil')
                ->setBody("Hai {$name}, terima kasih telah mendaftar. Akun Anda dengan email {$email} telah berhasil dibuat.");
        });
    }
}
