<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name', 'cover', 'desc', 'pages', 'price', 'subscription_price', 'book_price',
        'group_id', 'language_id', 'organization_id', 'is_active', ''
    ];

    public function language(){
        return $this->belongsTo('App\Language');
    }

    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function organization(){
        return $this->belongsTo('App\Organization');
    }

    public function categories(){
        return $this->hasMany('App\Category');
    }

    public function phrases(){
        return $this->hasMany('App\Phrase');
    }
}
