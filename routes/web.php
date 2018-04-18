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
Route::get('/home', function () {
    $myEmps=DB::table('employee')->get();
    return view('home')->with('emps', $myEmps);
 });


Route::get('/emps/create',"EmpolyeeController@create");

Route::post('emps/create',"EmpolyeeController@store");

Route::get('delete/{emp}',"EmpolyeeController@destroy");


Route::get('/edit/{emp}',"EmpolyeeController@edit");
Route::post('/edit/{emp}',"EmpolyeeController@update")->name('edit');

Route::get('/emps/show',"EmpolyeeController@show");



Route::get('/user3ady', function () {
    return view('User3ady');
});
Route::get('/map', function () {
    return view('map');
});

Route::post('create/{emp}');