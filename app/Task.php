<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function project(){
    	return $this->belongsTo('App\Project');
    }
    public function users(){
    	return $this->belongsTo('App\User');
    }
    //to get a particular user task
    
}
