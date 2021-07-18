<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\R2O_Controller;

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
    return view('toppage');
});
Route::get('/info', 'App\Http\Controllers\R2O_Controller@info');
Route::get('/application_add', 'App\Http\Controllers\R2O_Controller@application_add');
Route::post('/application_add', 'App\Http\Controllers\R2O_Controller@application_create');
Route::get('/add', 'App\Http\Controllers\R2O_Controller@add');
Route::post('/add', 'App\Http\Controllers\R2O_Controller@create');
Route::get('/motorcycle_add', 'App\Http\Controllers\R2O_Controller@motorcycle_add');
Route::post('/motorcycle_add', 'App\Http\Controllers\R2O_Controller@motorcycle_create');
Route::get('/plan_add', 'App\Http\Controllers\R2O_Controller@plan_add');
Route::post('/plan_add', 'App\Http\Controllers\R2O_Controller@plan_create');
Route::get('/company_add', 'App\Http\Controllers\R2O_Controller@company_add');
Route::post('/company_add', 'App\Http\Controllers\R2O_Controller@company_create');
Route::get('/find', 'App\Http\Controllers\R2O_Controller@find');
Route::post('/find', 'App\Http\Controllers\R2O_Controller@search');


