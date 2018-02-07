<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show()
    {
        return view('course.show');
    }

    public function announce(){
        return view('course.announce');
    }

    public function addRate(){
        return view('course.course_rate');
    }

    public function create()
    {
        return view('course.create');
    }
}
