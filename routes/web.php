<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MerchantController;


Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(MerchantController::class)->prefix('merchants')->group(function () {
        Route::get('', 'index')->name('merchants');
        Route::get('create', 'create')->name('merchants.create');
        Route::post('store', 'store')->name('merchants.store');
        Route::get('show/{id}', 'show')->name('merchants.show');
        Route::get('edit/{id}', 'edit')->name('merchants.edit');
        Route::put('edit/{id}', 'update')->name('merchants.update');
        Route::delete('destroy/{id}', 'destroy')->name('merchants.destroy');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});
