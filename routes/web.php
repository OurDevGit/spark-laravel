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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/team', 'TeamController@index')->name('team');
Route::get('/myteam', 'TeamController@showmyteams')->name('myteam');
Route::get('/team/{id}', 'TeamController@display')->name('display');
Route::post('/team-create', 'TeamController@createTeam');

Route::post('/team/addmembers', 'TeamController@addMembers');