<?php

namespace App\Http\Controllers;

use App\Answer;
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

    function store(Request $request)
    {
        $course = Course::find($request->course_id);

        $exam = Exam::create([
            'name' => $course->name,
            'course_id' => $course->id
        ]);//1

        foreach ($request['question'] as $question) {
            $newQuestion = ExamQuestion::create([
                'subject' => $question['subject'],
                'exam_id' => $exam->id//1
            ]);

            foreach ($question['answers'] as $key => $answer) {
                Answer::create([
                    'question_id' => $newQuestion->id,
                    'content' => $answer['content'],
                    'isSolution' => $question['right'] == $key+1 ? 1 : 0,
                ]);
            }

        }

        return view('course.exam.create');
    }

    function getCertified(Course $course){
        return view('course.exam.certification',compact('course'));
    }

    function cantCertified(){
        return view('course.exam.notcertified');
    }
}
