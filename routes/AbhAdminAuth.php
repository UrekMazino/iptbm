<?php

use App\Http\Controllers\AbhAdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\AbhAdminAuth\ConfirmablePasswordController;
use App\Http\Controllers\AbhAdminAuth\EmailVerificationNotificationController;
use App\Http\Controllers\AbhAdminAuth\EmailVerificationPromptController;
use App\Http\Controllers\AbhAdminAuth\NewPasswordController;
use App\Http\Controllers\AbhAdminAuth\PasswordController;
use App\Http\Controllers\AbhAdminAuth\PasswordResetLinkController;
use App\Http\Controllers\AbhAdminAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin_abh')->group(function () {

    Route::get('admin/abh/login', [AuthenticatedSessionController::class, 'create'])
        ->name('admin.abh.login');

    Route::post('admin/abh/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('admin/abh/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('admin.abh.password.request');

    Route::post('admin/abh/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('admin.abh.password.email');

    Route::get('admin/abh/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('admin.abh.password.reset');

    Route::post('admin/abh/reset-password', [NewPasswordController::class, 'store'])
        ->name('admin.abh.password.store');
});

Route::middleware('auth:admin_abh')->group(function () {
    Route::get('admin/abh/verify-email', EmailVerificationPromptController::class)
        ->name('admin.abh.verification.notice');

    Route::get('admin/abh/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('admin.abh.verification.verify');

    Route::post('admin/abh/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('admin.abh.verification.send');

    Route::get('admin/abh/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('admin.abh.password.confirm');

    Route::post('admin/abh/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('admin/abh/password', [PasswordController::class, 'update'])->name('admin.abh.password.update');

    Route::post('admin/abh/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('admin.abh.logout');
});
