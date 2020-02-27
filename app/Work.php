<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

    protected $fillable =
    [
    	'id',
    	'type'
    ];

    public function tasks ()
    {
    	return $this->hasMany('App\Work');
    }
}
