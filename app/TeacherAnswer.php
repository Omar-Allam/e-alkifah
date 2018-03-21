<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherAnswer extends Model
{
    protected $fillable = ['teacher_id','exam_id','question_id','answer_id'];
}
