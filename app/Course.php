<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class Course extends Model
{
    protected $fillable = ['name', 'description', 'category_id', 'trainer_id', 'image_logo_url'];

    function getLogoAttribute()
    {
        return url($this->image_logo_url);
    }

    function getVideoAttribute()
    {
        $video = $this->videos->first();
        return $video ? url($video->path) : '';
    }

    function getVideoIdAttribute()
    {
        $video = $this->videos->first();
        return $video->id;
    }

    function videos()
    {
        return $this->hasMany(CourseFiles::class, 'course_id');
    }

    function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id', 'id');
    }

    function questions()
    {
        return $this->hasMany(Question::class, 'course_id');
    }

    function hasRate()
    {
        return $this->hasMany(Rate::class, 'course_id');
    }

    function teachers()
    {
        return $this->belongsToMany(User::class, 'teacher_courses', 'course_id', 'teacher_id');
    }

    function exam()
    {
        return $this->hasOne(Exam::class, 'course_id');
    }

    function getRateAttribute()
    {
        $rates = Rate::where('course_id', $this->id)->get();//new Course
        if ($rates->count()) {
            $rate_count = $rates->count();//10
            $full_rate = $rate_count * 4;
            $total_rate = 0;
            foreach ($rates as $rate) {
                $total_rate += $rate->rate;
            }

            $final_rate = ($total_rate / $full_rate) * 100;

            return $final_rate;

        }
        return 0;
    }

}
