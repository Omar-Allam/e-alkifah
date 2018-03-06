<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Course extends Model
{
    protected $fillable = ['name', 'description', 'category_id', 'trainer_id','image_logo_url'];

    function getLogoAttribute(){
        return url($this->image_logo_url);
    }

    function getVideoAttribute(){
       $video = $this->videos->first();
        return $video ? url($video->path) :'' ;
    }
    function videos(){
        return $this->hasMany(CourseFiles::class,'course_id');
    }


}
