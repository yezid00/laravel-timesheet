<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function project(){
    	$this->belongsTo('App\Project');
    }
    public function users(){
    	$this->belongsTo('App\User');
    }
}
