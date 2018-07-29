<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'organization', 'desc', 'avatar', 'mobile', 'instagram', 'email', 'twitter', 'snapchat', 'facebook', 'website', 'organization_type_id'
    ];

    public function organizationType(){
        return $this->belongsTo('App\OrganizationType');
    }

    public function books(){
        return $this->hasMany('App\Book');
    }
}
