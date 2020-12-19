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

Route::get('/', 'LoginController@dashboard');

Route::get('/informations', 'PagesController@info');

Route::get('/participants/create', 'ParticipantsController@create');

Route::get('/participants', 'ParticipantsController@index');

Route::get('/participants/{participant}', 'ParticipantsController@show');

Route::patch('/participants/{participant}','ParticipantsController@update');

Route::get('/participantedit/{participant}', 'ParticipantsController@edit');

Route::post('/participants','ParticipantsController@store');

Route::delete('/participants/{participant}','ParticipantsController@destroy');

Route::get('/criteria', 'PagesController@criteria');

Route::get('/criteria/codas/{codascriteria}', 'CriteriasController@edit');

Route::get('/criteria/pkh/{pkhcriteria}', 'CriteriasController@pkhedit');

Route::patch('/codascriteria/{codascriteria}','CriteriasController@update');

Route::patch('/pkhcriteria/{pkhcriteria}','CriteriasController@pkhupdate');

Route::get('/login', 'LoginController@index');

Route::post('/post-login', 'LoginController@postLogin');

Route::get('/logout', 'LoginController@logout');

Route::get('/codasresult', 'PagesController@codasresult');

Route::get('/codasresult/refresh', 'PagesController@codasresultupdate');

Route::get('/codasresult/{participant}', 'PagesController@profilecodas');

Route::get('/finalresult', 'PagesController@finalresult');

Route::get('/finalresult/refresh', 'PagesController@finalresultupdate');

Route::get('/finalresult/{participant}', 'PagesController@profilepkh');

Route::get('/adminpanel', 'PagesController@adminpanel');

Route::patch('/adminpanel/countreset', 'ParticipantsController@countreset');

Route::patch('/adminpanel/variableedit', 'ParticipantsController@variableedit');