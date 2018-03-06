<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseFiles;
use App\Mail\AnnounceToAll;
use App\Mail\AnnounceToNewCourse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use League\Flysystem\File;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        return view('course.show',compact('course'));
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

    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required']);

        $logo = $request->file('logo');
        $path = public_path() . '/logos/';
        $filename = time() . '.' . $logo->getClientOriginalExtension();

       $course =  Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'trainer_id' => Auth::id() ?? 1,
            'image_logo_url' => '/logos/' . $filename
        ]);
        $logo->move($path, $filename);

        $videos = $request->videos;

        foreach ($videos as $video){
            $videoPath = public_path() . '/videos/';
            $filename = $video->getClientOriginalName() . '.' . $video->getClientOriginalExtension();
            $video->move($videoPath, $filename);
            $course->videos()->create([
                'course_id'=>$course->id,
                'type'=>1,
                'path'=>'/videos/'.$filename,
                'video_title'=>$video->getClientOriginalName()
            ]);
        }


        return view('welcome');
    }

    function announceCourse(Request $request)
    {
        Mail::to(User::all()->pluck('email'))
            ->send(new AnnounceToNewCourse());
        return view('welcome');
    }


    function registerToCourse(Course $course){
        $user = Auth::user();
        $user->courses()->syncWithoutDetaching($course->id);
        return redirect()->route('course.show',compact('course'));
    }

    function loadvideo(){
        $id = \request()->get('id');
        $video = CourseFiles::where('id',$id)->first();
        return response()->json($video);
    }
}
