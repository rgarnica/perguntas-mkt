<?php

use Illuminate\Support\Facades\Auth;

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
    if (Auth::user()) {
        return redirect()->route('home');
    } else {
        return view('index');
    }
})->name('index');

Route::get('/login', function () {
    return view('login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/quiz/{quizHash}', 'QuizController@index')->name('quiz');
Route::post('/quiz', 'QuizController@store')->name('quiz.store');

Route::post('/answers', 'AnswerController@store')->name('answers.store');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('forms', 'FormController');
    Route::resource('questions', 'QuestionController');
    Route::resource('alternatives', 'AlternativeController');
});
