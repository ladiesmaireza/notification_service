<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\UserNotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public function notify(Request $request)
{
    $data = $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    Mail::to($data['email'])
        ->send(new UserNotificationMail($data['name'], $data['email']));

    return response()->json([
        'status' => 'success',
        'message' => 'Email berhasil dikirim'
    ]);
}
}

