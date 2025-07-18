<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormContoller;

Route::get('/login',[FormContoller::class,'loginView']);
Route::post('/login',[FormContoller::class,'login'])->name('form.login');

Route::get('/signup',[FormContoller::class,'signupView']);
Route::post('/signup/create',[FormContoller::class,'signup'])->name('form.create');

Route::get('/edit/{id}',[FormsController::class,'edit'])->name('form.edit');


Route::get('/profile',[FormContoller::class,'profile'])->name('profile');


