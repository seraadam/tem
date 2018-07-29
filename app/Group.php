<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'group', 'is_active', 'desc', 'logo'
    ];

    public function books(){
        return $this->hasMany('App\Book')->latest();
    }
}
