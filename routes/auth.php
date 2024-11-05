<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\AuthController;

Route::group(['middleware' => ['guest']], static function () {
    Route::get('/login', [AuthController::class , 'showLoginForm'])->name('login');

    Route::post('/login', [AuthController::class , 'login'])->name('login.submit');

});

Route::group(['middleware' => ['auth']], static function () {
    Route::get('/logout', [AuthController::class , 'logout'])->name('logout');
});
