<?php

use Illuminate\Support\Facades\Route;
use App\Http\Constants\UserConstants;
use \App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class , 'welcome'])->name('welcome');

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard', 'as' => 'dashboard.' ], static function () {
    Route::get('/', [HomeController::class , 'index'])->name('home');
});


//Route::group(['middleware' => ['auth', 'role:'. UserConstants::ROLE_EMPLOYEE], 'prefix' => '/employee/'], function () {
//    Route::get('/',function (){
//        return "<h1>employee</h1>";
//    });
//});
