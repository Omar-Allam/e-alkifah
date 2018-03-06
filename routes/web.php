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

Route::group(['middleware'=>'auth'],function (){
    Route::get('/course/{course}','CourseController@show')->name('course.show');
    Route::post('/course','CourseController@store')->name('course.store');
    Route::get('/about-us', 'HomeController@about')->name('about.index');
    Route::get('/announce', 'CourseController@announce')->name('announce');
    Route::post('/announce', 'CourseController@announceCourse')->name('course.announce');
    Route::get('/add-rate', 'CourseController@addRate')->name('rate.add');
    Route::get('/create-course', 'CourseController@create')->name('course.create');
    Route::get('/reports', 'ReportController@index')->name('report.index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::get('register/{course}','CourseController@registerToCourse')->name('course.register');
    Route::get('get-video','CourseController@loadvideo');
});

Auth::routes();

