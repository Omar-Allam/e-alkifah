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
    $courses = \App\Course::all();
    return view('welcome',compact('courses'));
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
    Route::get('my-courses','CourseController@myCourses')->name('course.mycourses');
    Route::post('add-content/{course}','CourseController@addMoreVideos')->name('course.addContent');
    Route::post('solve/{course}','CourseController@solveExam')->name('course.exam.solve');
    Route::post('/search','CourseController@search')->name('course.search');
    Route::post('/add-question','CourseController@addQuestion')->name('course.question');
    Route::post('/add-rate/{course}','CourseController@rateCourse')->name('course.rate');
    Route::get('/reports/courses','ReportController@courses')->name('report.courses');
    Route::get('/reports/teachers','ReportController@teachers')->name('report.teachers');
    Route::get('/reports/trainers','ReportController@trainers')->name('report.trainers');
    Route::get('/exam/create','ExamController@create')->name('exam.create');
    Route::post('/exam/store','ExamController@store')->name('exam.store');
    Route::get('cert/{course}','ExamController@getCertified')->name('exam.certified');
    Route::get('notcert/','ExamController@cantCertified')->name('exam.notcertified');
    Route::get('my_certifications/','ReportController@certifications')->name('user.certifications');
    Route::get('/pdf/{course}', function() {
        $course = \App\Course::find(13);
        $html = view('course.exam.certification',compact('course'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        return $pdf->stream();
    });
    Route::get('/pdf/view', function() {
        $html = view('course.exam.certification',compact('course'))->render();

        return PDF::load($html)->download();
    });
});

Auth::routes();

