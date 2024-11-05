<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\EmployeeController;

Route::get('/', [HomeController::class , 'welcome'])->name('welcome');

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard', 'as' => 'dashboard.' ], static function () {
    Route::get('/', [HomeController::class , 'index'])->name('home');
    Route::get('/employee', [EmployeeController::class , 'index'])->name('employee');
});


//Route::group(['middleware' => ['auth', 'role:'. UserConstants::ROLE_EMPLOYEE], 'prefix' => '/employee/'], function () {
//    Route::get('/',function (){
//        return "<h1>employee</h1>";
//    });
//});
