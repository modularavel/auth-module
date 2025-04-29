<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Modularavel\Auth\Livewire\Settings\Appearance;
use Modularavel\Auth\Livewire\Settings\Password;
use Modularavel\Auth\Livewire\Settings\Profile;

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
Route::middleware(['web'])->prefix('auth')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::redirect('settings', 'settings/profile');

        Volt::route('settings/profile', Profile::class)->name('settings.profile');
        Volt::route('settings/password', Password::class)->name('settings.password');
        Volt::route('settings/appearance', Appearance::class)->name('settings.appearance');
    });

    require __DIR__.'/auth.php';
});
