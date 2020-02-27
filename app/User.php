<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
    [
        'name', 'email', 'password', 'username', 'user_type', 'role_id', 'department_id'
    ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden =
    [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts =
    [
        'email_verified_at' => 'datetime',
    ];


    public function tasks()
    {
        //return $this->hasMany('App\Task');
        return $this->belongsToMany('App\Task','task_user','user_id','task_id')->latest();
    }

    public function role()
    {
        //return $this->belongsTo('App\Role', 'user_roles', 'user_id', 'role_id','id');
        return $this->belongsTo('App\Role','role_id','id');
    }

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id', 'id');
    }


    public function isEmployee()
    {
        $roles = $this->roles->toArray();
        return !empty($roles);
    }

    public function hasRole($check)
    {
        return in_array($check, array_pluck($this->roles->toArray(), 'name'));
    }

    public function getIdInArray($array, $term)
    {
        foreach($array as $key => $value){
            if($value == $term){
                return $key + 1;
            }
        }

        return false;
    }

    public function makeEmployee($title)
    {
        $assigned_roles = array();
        $roles = array_fetch(Role::all()->toArray(), 'name');
        switch($title){
            case 'admin' :
            $assigned_roles[] = $this->getIdInArray($roles, 'admin');
            case 'manager':
            $assigned_roles[] = $this->getIdInArray($roles, 'manager');
            case 'specialist':
            $assigned_roles[] = $this->getIdInArray($roles, 'specialist');
                break;
        default:
        $assigned_roles[] = false;
    }
    $this->roles()->attach($assigned_roles);

    }

}