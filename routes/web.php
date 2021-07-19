<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/***************************************** AUTHENTICATION ROUTES ***********************************/

//Authentication Routes with Verification Enabled
Auth::routes(['verify' => true]);

/***************************************** VERIFICATION ROUTES *************************************/

//Gives link to verification notice
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

//Verification Redirection from link for email verification
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//Verification link resend
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/******************************************** PAGE ROUTES *****************************************/

//Base Route
Route::get('/', function () {
    return view('auth.login');
});

//Route to home page, only accessed when the user is logged in and verified
Route::get('/home', function () {
    return view('home');
})->name('home')->middleware(['auth', 'verified']);

//Route to Related Links page
Route::get('/other', function () 
{
    return view('related');
});

//Route to specific user's dashboard based on their username. Calls the DashboardController
//User must be verified and logged in to access
Route::get('/dashboard/{username}', [DashboardController::class, 'show'])
            ->name('dashboard')
            ->middleware(['auth', 'verified']);