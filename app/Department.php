<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable =
    [
        'name'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function tasks()
    {
        //return $this->hasMany('App\Task');
        return $this->belongsTo('App\Task','department_task','department_id','task_id');
    }

}
