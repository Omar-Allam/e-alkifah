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
use RealRashid\SweetAlert\Facades\Alert;

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
            if($question){
                Question::create([
                    'content' => $question,
                    'course_id' => $request['course_id']
                ]);
            }
        }
        alert('التقييم', 'تم إضافة التقييم', 'success')->showCloseButton();
        return redirect()->back();
    }

    function getCertified(Course $course)
    {
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
                alert('خطأ في إنشاء الدورة', 'يرجى إكمال البيانات الخاصة بالدورة', 'error')->showCloseButton();
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

        alert('إضافة دورة', 'تم إضافة الدورة بنجاح', 'success')->showCloseButton();
        return redirect()->route('course.show', $course);
    }

    function announceCourse(Request $request)
    {
        if(!$request['description']){
            alert('خطأ في الإعلان', 'يرجى تعبئة وصف الدورة', 'error')->showCloseButton();
            return redirect()->back();
        }
        Mail::to(User::all()->pluck('email'))
            ->send(new AnnounceToNewCourse());
        $courses = \App\Course::all();

        alert('الإعلان عن دورة', 'تم الإعلان عن الدورة بنجاح', 'success')->showCloseButton();
        return view('welcome', compact('courses'));
    }


    function registerToCourse(Course $course)
    {
        $user = Auth::user();
        $user->courses()->syncWithoutDetaching($course->id);

        alert('التسجيل', 'تم التسجيل في الدورة', 'success')->showCloseButton();

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

            alert('إضافة محتوى', 'تم إضافة المحتوى بنجاح', 'success')->showCloseButton();
            return view('course.show', compact('course'));
        }
    }

    function myCourses()
    {
        $courses = Auth::user()->courses;
        return view('welcome', compact('courses'));
    }

    function certifiedBefore()
    {
        alert('التسجيل', 'تم مشاهدة الدورة من قبل واستخراج شهادة', 'error')->showCloseButton();
        return redirect()->back();
    }


    function getCertification(Request $request)
    {
        $certifiedBefore = Certification::where('course_id', $request->get('id'))->where('user_id',Auth::id())->exists();

        if ($certifiedBefore) {
            return 0;
        } else {
            Certification::create(['user_id' => Auth::id(), 'course_id' => $request->get('id')]);
            $course = Course::find($request->get('id'));
            return response()->json($course);
        }


    }
}
