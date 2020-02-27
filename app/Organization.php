<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable =
    [
    	'id',
    	'name'
    ];

    public function tasks()
    {
    	return $this->hasMany('App\Task');
    }
}
