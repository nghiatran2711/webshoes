<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderDetails extends Model
{
    protected $table='order_details';
    protected $primaryKey='orderDetailID';
    protected $fillable=[
    	'orderID','productID','quantity','amount'
	];
	public function order(){
		return $this->belongsTo('App\Order','orderID','orderID');
	}
	public function product(){
		return $this->belongsTo('App\Product','productID','productID');
	}}
