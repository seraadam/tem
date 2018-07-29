<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
      'role', 'can_insert', 'can_delete', 'can_update', 'can_show', 'is_admin'
    ];

    public function users(){
        return $this->hasMany('App\User');
    }
}
