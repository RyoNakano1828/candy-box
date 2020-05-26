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
    return view('welcome');
});

Route::get('questionary','QuestionaryController@index')->name('questionary.index');
Route::get('questionary/form','QuestionaryController@form')->name('questionary.form');
Route::post('questionary/store','QuestionaryController@store');

Route::get('candybox','CandyboxController@index')->name('candybox.index');
Route::post('candybox','CandyboxController@add')->name('candybox.add');
Route::post('candybox/store','CandyboxController@store')->name('candybox.store');
Route::post('/candybox/{id}/delete', 'CandyboxController@delete');
