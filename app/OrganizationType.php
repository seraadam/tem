<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationType extends Model
{
    protected $fillable = [
        'type', 'is_active'
    ];

    public function organizations(){
        return $this->hasMany('App\Organization');
    }
}
