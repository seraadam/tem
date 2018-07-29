<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    protected $fillable = [
        'phrase', 'percentage', 'image', 'book_id'
    ];

    public function book(){
        return $this->belongsTo('App\Book');
    }
}
