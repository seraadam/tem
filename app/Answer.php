<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'answer', 'is_correct', 'is_selected', 'exercise_id'
    ];

    public function exercise(){
        return $this->belongsTo('App\Exercise');
    }
}
