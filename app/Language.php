<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'language', 'is_active'
    ];

    public function books(){
        return $this->hasMany('App\Book');
    }
}
