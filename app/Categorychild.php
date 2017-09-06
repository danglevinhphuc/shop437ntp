<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorychild extends Model
{
    //
    protected $table = "categorychild";
    public function category(){
    	return $this->belongsTo('App\Category','id_category','id');
    }
}
