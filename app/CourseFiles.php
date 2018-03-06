<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseFiles extends Model
{
    protected $table = 'course_files';
    protected $fillable = ['course_id','type','path','video_title'];
}
