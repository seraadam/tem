<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamExercise extends Model
{
    protected $fillable = ['exam_id', 'exercise_id'];

    public function exam(){
        return $this->belongsTo('App\Exam');
    }

    public function exercise(){
        return $this->belongsTo('App\Exercise');
    }
}
