<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'exercise', 'image', 'level_id', 'lesson_id'
    ];

    public function level(){
        return $this->belongsTo('App\Level');
    }

    public function lesson(){
        return $this->belongsTo('App\Lesson');
    }

    public function answers(){
        return $this->hasMany('App\Answer');
    }

    public function corrections(){
        return $this->hasMany('App\Correction');
    }

    public function examExercise(){
        return $this->hasMany('App\ExamExercise');
    }
}
