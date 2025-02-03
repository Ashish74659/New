<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('home');
    
     
 
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');

    Route::any('otp-verification', [NewPasswordController::class, 'otpverification'])
                ->name('otp-verification');

    Route::any('otpverification-Store', [NewPasswordController::class, 'otpverificationStore'])
                ->name('otpverification-Store');
});

Route::middleware('auth')->group(function () {
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

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
    // Route::get('release-user', [AuthenticatedSessionController::class, 'releaseUser'])->name('release_user');

    // Route::get('blocked-user', [AuthenticatedSessionController::class, 'blockedList'])->name('blocked_user');
    // Route::get('released-log', [AuthenticatedSessionController::class, 'releasedLog'])->name('released_log');
    // Route::get('released-log-list', [AuthenticatedSessionController::class, 'releasedLogList'])->name('released_log_list');

    // Route::get('released-otp-log', [AuthenticatedSessionController::class, 'releasedotpLog'])->name('released-otp-log');
    // Route::get('released-log-otp-list', [AuthenticatedSessionController::class, 'releasedLogotpList'])->name('released-log-otp-list');
    // Route::get('released-otp-user', [AuthenticatedSessionController::class, 'releasedotpuser'])->name('released-otp-user');

});
