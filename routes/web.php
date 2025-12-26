<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

Route::get('/user-management', function () {
    return view('user-management.index');
});

Route::post('/notify', [NotificationController::class, 'notify']);
