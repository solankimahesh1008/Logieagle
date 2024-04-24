<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;


Route::get('/', function () {
    return view('welcome');
});
Route::resource('surveys', SurveyController::class);
Route::resource('questions',QuestionController::class);
Route::resource('answers', AnswerController::class);



