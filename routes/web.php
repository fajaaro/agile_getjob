<?php

use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['prefix' => 'me', 'middleware' => 'auth'], function() {
	Route::get('/edit-profile', [MemberController::class, 'editProfile'])->name('frontend.member.edit-profile');
	Route::put('/edit-profile', [MemberController::class, 'updateProfile']);	
	Route::get('/profile', [MemberController::class, 'profile'])->name('frontend.member.profile');
});