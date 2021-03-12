<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table='brands';
    protected $primaryKey='BrandID';
    protected $fillable=[
    	'brandName','created_at','updated_at',
	];
	public function product(){
		return $this->hasMany('App\Product','brandID','brandID');
	}
}
