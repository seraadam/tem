<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['category_id', 'exam'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function examExercises(){
        return $this->hasMany('App\ExamExercise');
    }

    public function exercises(){
        return $this->hasManyThrough('App\Exercise', 'App\ExamExercise');
    }
}
