<?php

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
use Illuminate\Auth\Middleware\Authenticate;

Route::get('/', function () {
    return view('home');
});

// Route::resource('banglaSentencesControllers', 'BanglaSentencesControllerController')

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sentence/sentencetable', 'SentenceTaskController@getData')->middleware('auth');;

Route::get('/words/wordtable', 'WordTaskController@getData')->middleware('auth');;
Route::get('/words/dictionarytable', 'DictionaryController@getData')->middleware('auth');;




