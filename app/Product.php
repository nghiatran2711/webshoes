<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $primaryKey='productID';
    protected $fillable=['productName','description','image','categoryID','brandID','price','created_at','updated_at'
	];
	public function category(){
		return $this->belongsTo('App\Category','categoryID','categoryID');
	}
	public function brand(){
		return $this->belongsTo('App\Brand','brandID','brandID');
	}
}
