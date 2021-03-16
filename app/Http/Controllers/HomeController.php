<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Brand;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    //
    public function index(){
    	$category=Category::select()->get();
    	$brand=Brand::select()->get();
    	$product=Product::select()->get();
    	return view('pages.home')->with('category',$category)->with('brand',$brand)->with('product',$product);
    }
}
