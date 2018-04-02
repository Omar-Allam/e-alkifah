<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Certification;
use App\Course;
use App\Exam;
use App\ExamQuestion;
use App\Question;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    function create()
    {
        return view('course.exam.create');
    }


    function getCertified(Course $course){

        return view('course.exam.certification',compact('course'));
    }

    function cantCertified(){
        return view('course.exam.notcertified');
    }
}
