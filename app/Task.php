<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->department_id = 0;
            $model->user_id = 0;
            $model->is_active = 1;
        });
    }

    protected $fillable =
    [
    	'title','description','organization_id','contacts','priority_id','work_id','status_id','deadline','is_active'
	];


	public function organization()

	{
		return $this->belongsTo('App\Organization');
	}

	public function users()
	{
		//return $this->belongsTo('App\User');
		return $this->belongsToMany('App\User','task_user','task_id','user_id');
	}

    public function departments()
    {
        //return $this->belongsTo('App\Department');
        return $this->belongsToMany('App\Department','department_task','task_id','department_id');
    }

	public function work()
	{
		return $this->belongsTo('App\Work');
	}

	public function priority()
	{
		return $this->belongsTo('App\Priority');
	}

	public function status()
	{
		return $this->belongsTo('App\Status');
	}

	public function comments()
    {
		return $this->hasMany('App\Comment');
	}

}
