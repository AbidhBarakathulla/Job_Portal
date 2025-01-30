<?php

use App\Http\Controllers\CandidateController;
use App\Models\Candidate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
}); // route for index page

Route::get('/onetoone',[CandidateController::class,'one']); //route for one to one relationship
Route::get('/onetomany',[CandidateController::class,'many']); //route for one to many relationship
Route::get('/manytomany',[CandidateController::class,'manytomany']); //route for many to many relationship
Route::get('/hasone',[CandidateController::class,'hasonethrough']); //route for hasonethrough relationship
Route::get('/hasmany',[CandidateController::class,'hasmanythrough']); //route for hasmanythrough relationship
Route::get('/polymorphic_one',[CandidateController::class,'polymorphic_one']); //route for polymorphic one to one relationship
Route::get('/polymorphic_onetomany',[CandidateController::class,'polymorphic_onetomany']); //route for polymorphic one to many relationship

Route::get('/profile', function () {return view('profile');}); //route for profile blade 
Route::get('/profile1', function () {return view('profile1');}); //route for profile1 blade

Route::get('/checkage/{age}', function ($age) {
    return view('/profile', ['age' => $age]);
})->middleware(['checkAge']); //route for custom checkAge Middleware


Route::prefix('admin')->group(function () {
    Route::any('/login', function () {
        return view('login');
    });
}); //route for login blade with prefix

// Route::group([], function()  
// {  
//    Route::get('/first',function()  
//  {  
//    echo "first route";  
//  });  
// Route::get('/second',function()  
//  {  
//    echo "second route";  
//  });  
// Route::get('/third',function()  
//  {  
//    echo "third route";  
//  });  
// });  

// Route::group(['prefix' => 'tutorial'], function()  
// {  
//    Route::get('/aws',function()  
//  {  
//    echo "aws tutorial";  
//  });  
// Route::get('/jira',function()  
//  {  
//    echo "jira tutorial";  
//  });  
// Route::get('/testng',function()  
//  {  
//    echo "testng tutorial";  
//  });  
// });  