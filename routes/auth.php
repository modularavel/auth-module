<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Modularavel\Auth\Livewire\Actions\Logout;
use Modularavel\Auth\Livewire\ConfirmPassword;
use Modularavel\Auth\Livewire\ForgotPassword;
use Modularavel\Auth\Livewire\Login;
use Modularavel\Auth\Livewire\Register;
use Modularavel\Auth\Livewire\ResetPassword;
use Modularavel\Auth\Livewire\VerifyEmail;

Route::middleware('guest')->group(function () {
    Volt::route('login', Login::class)->name('login');

    Volt::route('register', Register::class)->name('register');

    Volt::route('forgot-password', ForgotPassword::class)->name('password.request');

    Volt::route('reset-password/{token}', ResetPassword::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', VerifyEmail::class)->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    Volt::route('confirm-password', ConfirmPassword::class)->name('password.confirm');
});

Route::post('logout', Logout::class)->name('logout');
