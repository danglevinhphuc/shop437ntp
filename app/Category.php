<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "category";
    public function categorychild(){
    	return $this->hasMany('App\Categorychild','id_category','id');	
    }
    public function products(){
    	return $this->hasMany('App\Products','id_category','id');	
    }
}
