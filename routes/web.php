<?php

use App\Http\Controllers\LinkedInController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/auth/redirect/linkedin', [LinkedInController::class, 'redirect'])->name('linkedin.redirect');

// Route to handle LinkedIn callback after authentication
Route::get('/auth/linkedin-openid/callback', [LinkedInController::class, 'callback'])->name('linkedin.callback');

// Route to trigger posting on LinkedIn
Route::post('/linkedin/post', [LinkedInController::class, 'postToLinkedIn'])->name('linkedin.post');


require __DIR__.'/auth.php';
