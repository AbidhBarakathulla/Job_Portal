<?php

use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/onetoone',[CandidateController::class,'one']);
Route::get('/onetomany',[CandidateController::class,'many']);
Route::get('/manytomany',[CandidateController::class,'manytomany']);


