<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table = "products";
    public function category(){
    	return $this->belongsTo('App\Category','id_category','id');
    }
    public function hinhproduct(){
    	return $this->hasMany('App\Hinhproduct','id_product','id');	
    }
    public function categorychild(){
    	return $this->belongsTo('App\Categorychild','id_categorychild','id');	
    }
    public function events(){
        return $this->belongsTo('App\Events','id_event','id');
    }   
}
