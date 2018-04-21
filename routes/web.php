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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/datatables', 'DatatablesController@getIndex')->name('datatables');
Route::get('/any-data', 'DatatablesController@anyData')->name('datatables.data');
Route::get('/users', 'DatatablesController@allUsers');

Route::get('/foo', function() {
    //echo date_format('10/10/2018', 'd-m-Y');
    //$date = Carbon\Carbon::createFromFormat('dd/mm/YY', '20/10/2018');
    $date = Carbon\Carbon::createFromFormat('d/m/Y', '19/06/1990');
    dd($date);
});
