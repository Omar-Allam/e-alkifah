<?php

namespace App\Mail;

use App\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AnnounceToNewCourse extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $request = request()->all();
        $course = Course::find($request['course_name']);
        return $this->view('mail.announce',compact('course','request'))->subject('Kifah New Course');
    }
}
