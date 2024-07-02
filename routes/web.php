<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\VerifyLogin;
use Illuminate\Support\Facades\Route;

Route::get('/login',    [ViewController::class, 'loginView']);
Route::post('/do-login',[AuthenticationController::class, 'authenticate']);

Route::middleware([VerifyLogin::class])->group(function () {
    Route::get('/', [ViewController::class, 'indexView']);

    // Staff Route
    //====================================
    Route::get      ('/staff',          [ViewController::class, 'staffView']);
    Route::get      ('/get-staff-list', [ViewController::class, 'staffGet']);
    Route::put      ('/add-staff',      [ViewController::class, 'staffAdd']);
    Route::patch    ('/update-staff',   [ViewController::class, 'staffUpdate']);
    Route::delete   ('/delete-staff',   [ViewController::class, 'staffDelete']);

    // Customer Route
    //====================================
    Route::get      ('/customer',           [ViewController::class, 'customerView']);
    Route::get      ('/get-customer-list',  [ViewController::class, 'customerGet']);
    Route::put      ('/add-customer',       [ViewController::class, 'customerAdd']);
    Route::patch    ('/update-customer',    [ViewController::class, 'customerUpdate']);
    Route::delete   ('/delete-customer',    [ViewController::class, 'customerDelete']);

    // Room Route
    //====================================
    Route::get      ('/room',           [ViewController::class, 'roomView']);
    Route::get      ('/get-room-list',  [ViewController::class, 'staffView']);
    Route::put      ('/add-room',       [ViewController::class, 'staffView']);
    Route::patch    ('/update-room',    [ViewController::class, 'staffView']);
    Route::delete   ('/delete-room',    [ViewController::class, 'staffView']);

    // Room Booking Route
    //====================================
    Route::get      ('/room-booking-schedule',          [ViewController::class, 'roomView']);
    Route::get      ('/get-room-booking-schedule',      [ViewController::class, 'staffView']);
    Route::put      ('/add-room-booking-schedule',      [ViewController::class, 'staffView']);
    Route::patch    ('/update-room-booking-schedule',   [ViewController::class, 'staffView']);
    Route::delete   ('/delete-room-booking-schedule',   [ViewController::class, 'staffView']);

    // Room Cleaning Route
    //====================================
    Route::get      ('/room-cleaning-schedule',         [ViewController::class, 'roomView']);
    Route::get      ('/get-room-cleaning-schedule',     [ViewController::class, 'staffView']);
    Route::put      ('/add-room-cleaning-schedule',     [ViewController::class, 'staffView']);
    Route::patch    ('/update-room-cleaning-schedule',  [ViewController::class, 'staffView']);
    Route::delete   ('/delete-room-cleaning-schedule',  [ViewController::class, 'staffView']);
});