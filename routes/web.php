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
Route::get('/course','CourseController@show')->name('course.show');
Route::get('/about-us', 'HomeController@about')->name('about.index');
Route::get('/announce', 'CourseController@announce')->name('announce');
Route::get('/add-rate', 'CourseController@addRate')->name('rate.add');
Route::get('/create-course', 'CourseController@create')->name('course.create');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reports', 'ReportController@index')->name('report.index');

