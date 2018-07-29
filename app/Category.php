<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category', 'logo', 'is_active' , 'book_id', 'desc'
    ];

    public function lessons(){
        return $this->hasMany('App\Lesson');
    }

    public function book(){
        return $this->belongsTo('App\Book');
    }
    
    public function exercies(){
    	return $this->hasManyThrough('App\Exercise', 'App\Lesson');
    }
}
