<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthContoller;

//Route::get('/edit/{id}',[FormController::class,'edit'])->name('form.edit');

//Route::middleware(['auth'])->group(function () {
    Route::get('/profile',[AuthContoller::class,'profile'])->name('profile');
    Route::get('/logout',[AuthContoller::class,'logout'])->name('form.logout');
//});

//Route::middleware(['guest'])->group(function () {
    Route::get('/islogin',[AuthContoller::class,'loginView'])->name('form.loginview');
    Route::post('/login',[AuthContoller::class,'login'])->name('form.login');

    Route::get('/issignup',[AuthContoller::class,'signupView'])->name('form.signupview');
    Route::post('/signup/create',[AuthContoller::class,'signup'])->name('form.create');
//});