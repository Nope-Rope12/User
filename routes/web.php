<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormContoller;

Route::view('/login','login');
Route::post('/login',[FormContoller::class,'login'])->name('form.login');

Route::view('/signup','signup');
Route::post('/signup/create',[FormContoller::class,'signup'])->name('form.create');

