<?php

use Illuminate\Support\Facades\Route;

// HOME
//Route::group(['prefix'=>'employee','middleware'=>'auth'],function(){
   // route::get('/',[App\Http\Controllers\Employee\HomeController::class, 'index'])
   // ->name('employee');
//});

//Account Admmin
//Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])
//->middleware('auth:employee')
//->name('profile');
//Route::get('/account', [App\Http\Controllers\ProfileController::class, 'account'])
//->middleware('auth:employee')
//->name('account');

// auth
//Route::group(['prefix'=>'employee'],function(){
   // route::get('/login',[App\Http\Controllers\Employee\Auth\LoginController::class,'showLoginForm'])
    //->name('employee.login');
    //route::post('/login',[App\Http\Controllers\Employee\Auth\LoginController::class,'getLogin'])
    //->name('employee.login');
    //route::post('/logout',[App\Http\Controllers\Employee\Auth\LoginController::class,'logout'])
    //->name('employee.logout');
//});




// middleware('permission:product,product_read')
