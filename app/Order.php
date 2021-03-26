<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $primaryKey='orderID';
    protected $fillable=[
    	'fullName','numberPhone','address','date_order','date_ship','total_order','status'
	];
	public function order_detail(){
		return $this->hasMany('App\orderDetails','orderID','orderID');
	}
	public function customer(){
		return $this->belongsTo('App\Customer','customerID','customerID');
	}
}
