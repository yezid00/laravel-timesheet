<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user(){
    	$this->belongsTo('App\User');
    }

    public function tasks(){
    	$this->hasMany('App\Task');
    }
}
