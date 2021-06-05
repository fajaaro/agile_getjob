<?php

use App\Http\Controllers\Frontend\JobController;
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

Route::group(['prefix' => 'jobs'], function() {
	Route::get('/', [JobController::class, 'index'])->name('frontend.jobs.index');
	Route::get('/create', [JobController::class, 'create'])->name('frontend.jobs.create');
	Route::get('/{id}', [JobController::class, 'show'])->name('frontend.jobs.show');
	Route::post('/', [JobController::class, 'store'])->name('frontend.jobs.store')->middleware('recruiter');
	Route::get('/{id}/edit', [JobController::class, 'edit'])->name('frontend.jobs.edit')->middleware('recruiter');
	Route::put('/{id}', [JobController::class, 'update'])->name('frontend.jobs.update')->middleware('recruiter');
});