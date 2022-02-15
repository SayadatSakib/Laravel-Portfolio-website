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

Route::get('/', 'HomeController@HomeIndex')->middleware('loginCheck');

// Admin penal service management
Route::get('/visitor', 'VisitorController@VisitorIndex')->middleware('loginCheck');

// Admin penal service management
Route::get('/service', 'ServiceController@ServiceIndex')->middleware('loginCheck');
Route::get('/getServiceData', 'ServiceController@getServiceData')->middleware('loginCheck');
Route::post('/serviceDetails', 'ServiceController@getServiceDetails')->middleware('loginCheck');
Route::post('/serviceDelete', 'ServiceController@serviceDelete')->middleware('loginCheck');
Route::post('/serviceEdit', 'ServiceController@serviceUpdate')->middleware('loginCheck');
Route::post('/serviceAdd','ServiceController@serviceAdd')->middleware('loginCheck');

// Admin penal service management
Route::get('/course', 'CoursesController@CoursesIndex')->middleware('loginCheck');
Route::get('/getCourseData', 'CoursesController@getCourseData')->middleware('loginCheck');
Route::post('/courseDetails', 'CoursesController@getCourseDetails')->middleware('loginCheck');
Route::post('/courseAdd','CoursesController@courseAdd')->middleware('loginCheck');
Route::post('/courseDelete', 'CoursesController@courseDelete')->middleware('loginCheck');
Route::post('/courseEdit', 'CoursesController@courseUpdate')->middleware('loginCheck');

// Admin penal project management
Route::get('/project', 'ProjectController@ProjectIndex')->middleware('loginCheck');
Route::get('/getProjectData', 'ProjectController@getProjectData')->middleware('loginCheck');
Route::post('/projectDetails', 'ProjectController@getProjectDetails')->middleware('loginCheck');
Route::post('/projectDelete', 'ProjectController@projectDelete')->middleware('loginCheck');
Route::post('/projectEdit', 'ProjectController@projectUpdate')->middleware('loginCheck');
Route::post('/projectAdd','ProjectController@projectAdd')->middleware('loginCheck');

// Admin penal contact management
Route::get('/contact', 'ContactController@ContactIndex')->middleware('loginCheck');
Route::get('/getContactData', 'ContactController@getContactData')->middleware('loginCheck');
Route::post('/contactDelete', 'ContactController@contactDelete')->middleware('loginCheck');

// Admin penal review management
Route::get('/review', 'ReviewController@ReviewIndex')->middleware('loginCheck');
Route::get('/getReviewData', 'ReviewController@getReviewData')->middleware('loginCheck');
Route::post('/reviewDetails', 'ReviewController@getReviewDetails')->middleware('loginCheck');
Route::post('/reviewDelete', 'ReviewController@reviewDelete')->middleware('loginCheck');
Route::post('reviewEdit', 'ReviewController@reviewUpdate')->middleware('loginCheck');
Route::post('/reviewAdd','ReviewController@reviewAdd')->middleware('loginCheck');

// Admin penal gallery management
Route::get('/gallery', 'GalleryController@GalleryIndex')->middleware('loginCheck');
Route::post('/photoUpload','GalleryController@photoUpload')->middleware('loginCheck');
Route::get('/imgJson', 'GalleryController@imgJson')->middleware('loginCheck');
Route::get('/imgJsonByID/{id}', 'GalleryController@ingJsonByID')->middleware('loginCheck');



//Admin Login
Route::get('/login','LoginController@login');
Route::post('/onLogin','LoginController@onLogin');

//Admin Login
Route::get('/logout','LoginController@onLogout');



