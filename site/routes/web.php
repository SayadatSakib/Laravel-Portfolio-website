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

Route::get('/', 'HomeController@HomeIndex');
Route::post('/contactsend', 'HomeController@contactSend');


Route::get('/courses', 'coursesController@coursesPage');
Route::get('/policy', 'privecyController@privecyPage');
Route::get('/projects', 'projectsController@projectPage');
Route::get('/terms', 'termsController@termsPage');
Route::get('/contact', 'contactController@contactOage');
