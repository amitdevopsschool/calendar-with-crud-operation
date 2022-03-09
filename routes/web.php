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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/eventpage','EventController@index')->name('event.index');
Route::get('addeventurl','EventController@display')->name('events.store');

Route::get('/editeventurl','EventController@comingeditpage')->name('editevent.comingeditpage');

Route::post('addeventurl/store','EventController@store')->name('addevent.store');
Route::get('/editeventurl/{id}','EventController@edit')->name('editform_update');
Route::post('/editeventurl/update','EventController@update')->name('events.update');
Route::get('/event-delete/{id}','EventController@destroy')->name('events.delete');
Route::get('/event-show','EventController@show')->name('events.show');
