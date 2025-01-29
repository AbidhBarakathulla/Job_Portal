<?php

use App\Http\Controllers\CandidateController;
use App\Models\Candidate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/onetoone',[CandidateController::class,'one']);
Route::get('/onetomany',[CandidateController::class,'many']);
Route::get('/manytomany',[CandidateController::class,'manytomany']);
Route::get('/hasone',[CandidateController::class,'hasonethrough']);
Route::get('/hasmany',[CandidateController::class,'hasmanythrough']);
Route::get('/polymorphic_one',[CandidateController::class,'polymorphic_one']);
Route::get('/polymorphic_onetomany',[CandidateController::class,'polymorphic_onetomany']);

Route::get('/profile', function () {return view('profile');});
Route::get('/profile1', function () {return view('profile1');});

Route::get('/checkage/{age}', function ($age) {
    return view('/profile', ['age' => $age]);
})->middleware(['checkAge']);

Route::any('/login', function () {
    return view('login');
});
