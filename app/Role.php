<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users ()
    {
    	//return $this->belongsToMany('App\User', 'user_roles', 'user_id', 'role_id','id');
        return $this->hasMany('App\User');
    }
}
