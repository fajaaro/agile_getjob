<?php

use App\Http\Controllers\Frontend\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'me', 'middleware' => 'auth'], function() {
	Route::get('/edit-profile', [MemberController::class, 'editProfile'])->name('frontend.member.edit-profile');
	Route::put('/edit-profile', [MemberController::class, 'updateProfile']);	
	Route::get('/profile', [MemberController::class, 'profile'])->name('frontend.member.profile');
});