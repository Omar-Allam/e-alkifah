<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = ['user_id','question_id','rate','course_id'];
}
