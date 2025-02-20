<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NominationController;
use App\Http\Controllers\PositionController;

Route::get('/', function () {
    return view('welcome');
})->name('index.home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('positions', PositionController::class);
});

Route::get('/search-user', function(){
    return view('search-user-practiceID');
})->name('show.reg.form');

Route::get('/member/search/callback', [NominationController::class, 'paymentCallback2'])->name('member.payment.callback2');
Route::post('/search-practice-id', [NominationController::class, 'searchPractice'])->name('search.practice');
Route::post('/process-form', [NominationController::class, 'processSearch'])->name('process.form');

Route::get('/update-profile/{id}', [NominationController::class, 'showUploadForm'])->name('passport.upload');
Route::post('/update-profile/{id}', [NominationController::class, 'upload'])->name('update.profile.data');
Route::get('/update/success', function () {
    return view('update.success');
})->name('update.success');

Route::get('/member/success', [NominationController::class, 'success'])->name('payment.success');
Route::get('/member/failure', [NominationController::class, 'failure'])->name('payment.failure');
require __DIR__.'/auth.php';
