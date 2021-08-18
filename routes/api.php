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

Route::post('store','StudentController@store');
Route::get('students','StudentController@index');
Route::get('edit/{id}','StudentController@edit');
Route::get('delete/{id}','StudentController@destroy');


Route::post('addEmployee','EmployeeController@addEmployee');
Route::get('showEmployee','EmployeeController@showEmployee');
Route::delete('deleteEmployee/{id}','EmployeeController@deleteEmployee');
Route::get('getEmployeeById/{id}','EmployeeController@getEmployeeById');
Route::put('updateEmployee/{id}','EmployeeController@updateEmployee');
