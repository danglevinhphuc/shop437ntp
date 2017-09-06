<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    //
    protected $table = "events";
    public function products(){
    	return $this->hasMany('App\Products','id_event','id');	
    }
}
