<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'level', 'percentage'
    ];


    public function exercises(){
        return $this->hasMany('App\Exercise');
    }
}
