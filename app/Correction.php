<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correction extends Model
{
    protected $fillable = [
        'correction', 'exercise_id', 'image', 'video'
    ];

    public function exercise(){
        return $this->belongsTo('App\Exercise');
    }

}
