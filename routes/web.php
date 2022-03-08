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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/eventpage','EventController');
Route::get('/eventpage','EventController@index')->name('event.index');
// Route::get('/eventpage','EventController@display')->name('EventController.store');
Route::post('addeventurl/store','EventController@store')->name('addevent.store');
Route::get('editeventurl','EventController@comingeditpage')->name('editevent.comingeditpage');
Route::get('deleteeventurl','EventController@comingeditpage');

Route::post('editeventurl/update/{id}','EventController@update')->name('editform_update');
Route::get('deleteeventurl/{id}','EventController@destroy');
