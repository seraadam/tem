<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title', 'image', 'video_title', 'video', 'desc', 'is_active', 'category_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function exercises(){
        return $this->hasMany('App\Exercise');
    }

    public function summaries(){
        return $this->hasMany('App\Summary');
    }
}
