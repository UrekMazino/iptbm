<?php

use App\Http\Controllers\IptbmAdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\IptbmAdminAuth\ConfirmablePasswordController;
use App\Http\Controllers\IptbmAdminAuth\EmailVerificationNotificationController;
use App\Http\Controllers\IptbmAdminAuth\EmailVerificationPromptController;
use App\Http\Controllers\IptbmAdminAuth\NewPasswordController;
use App\Http\Controllers\IptbmAdminAuth\PasswordController;
use App\Http\Controllers\IptbmAdminAuth\PasswordResetLinkController;
use App\Http\Controllers\IptbmAdminAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin_iptbm')->group(function () {

    Route::get('admin/iptbm/login', [AuthenticatedSessionController::class, 'create'])
        ->name('admin.iptbm.login');

    Route::post('admin/iptbm/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('admin/iptbm/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('admin.iptbm.password.request');

    Route::post('admin/iptbm/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('admin.iptbm.password.email');

    Route::get('admin/iptbm/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('admin.iptbm.password.reset');

    Route::post('admin/iptbm/reset-password', [NewPasswordController::class, 'store'])
        ->name('admin.password.store');
});

Route::middleware('auth:admin_iptbm')->group(function () {
    Route::get('admin/iptbm/verify-email', EmailVerificationPromptController::class)
        ->name('admin.iptbm.verification.notice');

    Route::get('admin/iptbm/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('admin.iptbm.verification.verify');

    Route::post('admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('admin.iptbm.verification.send');

    Route::get('admin/iptbm/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('admin.password.confirm');

    Route::post('admin/iptbm/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('admin/iptbm/password', [PasswordController::class, 'update'])->name('admin.password.update');

    Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('admin.iptbm.logout');
});
