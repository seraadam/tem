<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $fillable =[
        'title', 'attachment', 'lesson_id'
    ];
    public function lesson(){
        return $this->belongsTo('App\Lesson');
    }
}
