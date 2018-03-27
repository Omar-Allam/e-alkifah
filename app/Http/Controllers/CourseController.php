<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Certification;
use App\Course;
use App\CourseFiles;
use App\Mail\AnnounceToAll;
use App\Mail\AnnounceToNewCourse;
use App\Question;
use App\Rate;
use App\TeacherAnswer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use League\Flysystem\File;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        return view('course.show', compact('course'));
    }

    public function announce()
    {
        return view('course.announce');
    }

    public function addRate()
    {
        return view('course.course_rate');
    }

    public function create()
    {
        return view('course.create');
    }

    function addQuestion(Request $request)
    {
        foreach ($request['question'] as $question) {
            Question::create([
                'content' => $question,
                'course_id' => $request['course_id']
            ]);
        }
        return redirect()->back();
    }

    function getCertified(Course $course){
        Certification::create(['user_id' => Auth::id(), 'course_id' => $course->id]);
        return redirect()->route('exam.certified', ['course' => $course]);
    }
    public function rateCourse(Request $request, Course $course)
    {
        foreach ($request['rate'] as $key => $rate) {
            Rate::create([
                'user_id' => Auth::user()->id,
                'question_id' => $key,
                'rate' => $rate,
                'course_id' => $course->id,
            ]);
        }
        return redirect()->back();
    }

    public function store(Request $request)
    {
        if (!$request['name'] || $request['category_id'] == 0 || !$request->videos || !$request->file('logo')) {
            return redirect()->back();
        }

        $logo = $request->file('logo');
        $path = public_path() . '/logos/';
        $filename = time() . '.' . $logo->getClientOriginalExtension();

        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'trainer_id' => Auth::id() ?? 1,
            'image_logo_url' => '/logos/' . $filename
        ]);
        $logo->move($path, $filename);

        $videos = $request->videos;

        foreach ($videos as $video) {
            // Test ... video1
            $videoPath = public_path() . '/videos/';
            $filename = $course->name . basename($video->getClientOriginalName(), '.mp4') . '.' . $video->getClientOriginalExtension();
            $video->move($videoPath, $filename);

            $course->videos()->create([
                'course_id' => $course->id,
                'type' => 1,
                'path' => '/videos/' . $filename,
                'video_title' => $video->getClientOriginalName()
            ]);
        }


        return redirect()->route('course.show', $course);
    }

    function announceCourse(Request $request)
    {
        Mail::to(User::all()->pluck('email'))
            ->send(new AnnounceToNewCourse());
        $courses = \App\Course::all();
        return view('welcome', compact('courses'));
    }


    function registerToCourse(Course $course)
    {
        $user = Auth::user();
        $user->courses()->syncWithoutDetaching($course->id);
        return redirect()->route('course.show', compact('course'));
    }

    function loadvideo()
    {
        $id = \request()->get('id');
        $video = CourseFiles::where('id', $id)->first();
        return response()->json($video);
    }

    function search(Request $request)
    {
        $courses = Course::where('name', 'like', $request->course_name . '%')->get();
        return view('welcome', compact('courses'));
    }

    function addMoreVideos(Request $request, Course $course)
    {
        $videos = $request->videos;
        foreach ($videos as $video) {
            // Test ... video1
            $videoPath = public_path() . '/videos/';
            $filename = $course->name . basename($video->getClientOriginalName(), '.mp4') . '.' . $video->getClientOriginalExtension();
            $video->move($videoPath, $filename);

            $course->videos()->create([
                'course_id' => $course->id,
                'type' => 1,
                'path' => '/videos/' . $filename,
                'video_title' => $video->getClientOriginalName()
            ]);

            return view('course.show', compact('course'));
        }
    }

    function myCourses()
    {
        $courses = Auth::user()->courses;
        return view('welcome', compact('courses'));
    }


    function solveExam(Course $course, Request $request)
    {
        if ($request['question'] && count($request['question'])) {
            $count = count($request['question']);
            $total_degree = 100;
            $answer_degree = $total_degree / $count;//10
            $exam_degree = 0;
            foreach ($request['question'] as $key => $answer) {
                TeacherAnswer::create([
                    'teacher_id' => Auth::id(),
                    'course_id' => $course->id,
                    'exam_id' => $course->exam->id,
                    'question_id' => $key,
                    'answer_id' => $answer
                ]);
                $answer = Answer::find($answer);
                $is_solution = $answer->isSolution;

                if ($is_solution) {
                    $exam_degree += $answer_degree;
                }

                if ($exam_degree >= 50) {
                    Certification::create(['user_id' => Auth::id(), 'course_id' => $course->id]);
                    return redirect()->route('exam.certified', ['course' => $course]);
                } else {
                    return redirect()->route('exam.notcertified');
                }
            }


        }
        return redirect()->back();
    }

    function getCertification(Request $request){
        $certifiesBefore = Certification::where('course_id',$request->get('id'))->first();
        if(!$certifiesBefore){
            Certification::create(['user_id' => Auth::id(), 'course_id' => $request->get('id')]);
            $course  = Course::find($request->get('id'));
            return redirect()->route('exam.certified', ['course' => $course]);
        }


    }
}
