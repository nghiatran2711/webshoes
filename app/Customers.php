<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table='customers';
    protected $primaryKey='customerID';
    protected $fillable=[
    	'fullName','email','password','identityCard','address','numberPhone'
    ];
}
