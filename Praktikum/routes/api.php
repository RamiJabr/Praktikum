<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Routes for User
Route::get('users', 'UserController@index');
Route::get('users/{id}', 'UserController@show');
Route::post('users', 'UserController@create');
Route::put('users/{id}', 'UserController@update');
Route::delete('users/{id}', 'UserController@destroy');

//Routes for Job
Route::get('jobs', 'JobController@index');
Route::get('jobs/{id}', 'JobController@show');
Route::post('jobs', 'JobController@create');
Route::put('jobs/{id}', 'JobController@update');
Route::delete('jobs/{id}', 'JobController@destroy');

//Routes for Company
Route::get('companies', 'CompanyController@index');
Route::get('companies/{id}', 'CompanyController@show');
Route::post('companies', 'CompanyController@create');
Route::put('companies/{id}', 'CompanyController@update');
Route::delete('companies/{id}', 'CompanyController@destroy');
