<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Exam extends Model
{
    protected $fillable = ['name','course_id'];

    function questions(){
        return $this->hasMany(ExamQuestion::class,'exam_id');
    }

    function getAnsweredAttribute(){
       return TeacherAnswer::where('teacher_id',Auth::id())
            ->where('exam_id',$this->id)->exists();
    }
}
