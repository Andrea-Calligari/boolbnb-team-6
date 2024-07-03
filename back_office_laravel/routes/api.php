<?php

use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\AuthenticatedSessionApiController;
use App\Http\Controllers\Api\MessageApiController;
use App\Http\Controllers\Api\RegisteredUserApiController;
use App\Http\Controllers\Api\OptionsController;
use App\Http\Controllers\Api\ProfileApiController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// ####################################
// rotte per tutti 
//Rotta Options Database
Route::get('/options', [OptionsController::class, 'index'])->name('options.index');

//Rotte crud appartamenti
Route::get('/apartments', [ApartmentController::class, 'index'])->name('apartments.index');

Route::get('/apartments/{slug}', [ApartmentController::class, 'show'])->name('apartments.show');

Route::post('/messages', [MessageApiController::class, 'store'])->name('messages.store');

// ####################################
// rotte per utenti non loggati 
Route::middleware('guest')->group(function () {

    Route::post('register', [RegisteredUserApiController::class, 'store']);

    Route::post('login', [AuthenticatedSessionApiController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

// ####################################
// rotte per utenti loggati 
Route::middleware('auth')->group(function () {
    Route::get('/user', function (Request $request) {
        $user = Auth::user();
        $apartments = Apartment::where('user_id', Auth::id())->with('messages', 'category', 'promotions', 'services')->get();

        return response()->json(compact('user', 'apartments'));
    });

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionApiController::class, 'destroy'])
        ->name('logout');

    //Rotte crud appartamenti

    Route::get('/apartments/create', [ApartmentController::class, 'create'])->name('apartment.create');

    Route::post('/apartments', [ApartmentController::class, 'store'])->name('apartments.store');

    Route::get('/apartments/{apartment}/edit', [ApartmentController::class, 'edit'])->name('apartments.edit');

    Route::put('/apartments/{slug}', [ApartmentController::class, 'update'])->name('apartments.update');

    Route::delete('/apartments/{slug}', [ApartmentController::class, 'destroy'])->name('apartments.destroy');

    Route::get('userapartments', [AuthenticatedSessionApiController::class, 'getApartments']);

    //Rotte crud messaggi

    Route::get('/messages', [MessageApiController::class, 'index'])->name('messages.index');

    Route::post('/profile', [ProfileApiController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileApiController::class, 'destroy'])->name('profile.destroy');
});
