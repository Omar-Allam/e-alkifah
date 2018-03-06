<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name'
        , 'last_name'
        , 'mobile'
        , 'email'
        , 'password'
        , 'gender'
        , 'type'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static $ADMIN_TYPE=1;
    static $TEACHER_TYPE=2;
    static $TRAINER_TYPE=3;


    function isAdmin(){
        return $this->type == self::$ADMIN_TYPE;
    }

    function isTeacher(){
        return $this->type == self::$TEACHER_TYPE;
    }

    function isTrainer(){
        return $this->type == self::$TRAINER_TYPE;
    }

    function courses(){
        return $this->belongsToMany(Course::class,'teacher_courses','teacher_id','course_id');
    }

    function hasRegistered(){
        return $this->courses->pluck('id')->toArray();
    }
}
