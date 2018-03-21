<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = ['user_id','course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
