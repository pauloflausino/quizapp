<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::resource('quiz', App\Http\Controllers\QuizController::class);
	Route::resource('question', App\Http\Controllers\QuestionController::class);
	Route::resource('user', App\Http\Controllers\UserController::class);

	Route::get('/quiz/{id}/questions', [App\Http\Controllers\QuizController::class, 'question'])->name('quiz.question');

	Route::get('exam/assign',[App\Http\Controllers\ExamController::class, 'create'])->name('user.exam');
	Route::post('exam/assign',[App\Http\Controllers\ExamController::class, 'assignExam'])->name('exam.assign');
  	Route::get('exam/user',[App\Http\Controllers\ExamController::class, 'userExam'])->name('view.exam');
	Route::post('exam/remove',[App\Http\Controllers\ExamController::class, 'removeExam'])->name('exam.remove');
    Route::get('result',[App\Http\Controllers\ExamController::class, 'result'])->name('result');
    Route::get('result/{userId}/{quizId}', [App\Http\Controllers\ExamController::class, 'userQuizResult']);
