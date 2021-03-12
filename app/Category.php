<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $primaryKey='categoryID';
    protected $fillable=[
    	'categoryName','created_at','updated_at',
	];
	public function product(){
		return $this->hasMany('App\Product','categoryID','categoryID');
	}
}
