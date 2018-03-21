<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    protected $fillable = ['exam_id','subject'];

    function answers(){
        return $this->hasMany(Answer::class,'question_id');
    }

}
