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

// Route::get('/', function () {
//     return view('welcome');
// });

// use Illuminate\Routing\Route;

Route::get('/','Index\IndexController@index');
Route::get('/login','Index\LoginController@login');
Route::get('/reg','Index\LoginController@reg');
Route::post('/regdo','Index\LoginController@regdo');
Route::any('/putcode','Index\LoginController@putcode');
Route::post('/logindo','Index\LoginController@logindo');
Route::get('/logout','Index\LoginController@logout');
Route::get('/particulars/{id}','Index\PartController@particulars');
Route::get('/getattrprice','Index\PartController@getattrprice');






