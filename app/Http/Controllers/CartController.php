<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
    	$productID=$request->productID;
    	$quantity=$request->quantity;
    	$productById=Product::find($productID);
        $cart=Session::get('cart');
        if (!isset($cart[$productID])) {
            $cart[$productID]=[
                'productID'=>$productById->productID,
                'productName'=>$productById->productName,
                'image'=>$productById->image,
                'quantity'=>$quantity,
                'price'=>$productById->price
            ];
            Session::put('cart',$cart);
            return Redirect::to('/view-cart');
        }
        if (isset($cart[$productID])) {
            $cart[$productID]['quantity']+=$quantity;
            Session::put('cart',$cart);
            return Redirect::to('/view-cart');
        }
    }
    public function view(){
        return view('pages.Cart.view_cart');
    }

    public function update(Request $request){
        $quantity=$request->quantity;
        $cart=Session::get('cart');
        foreach ($quantity as $key => $value) {
            if (($value)==0 && is_numeric($value)) {
                unset($cart[$key]);
                Session::put('cart',$cart);
            }elseif (($value)>0 && is_numeric($value)) {
                $cart[$key]['quantity']=$value;  
                Session::put('cart',$cart);              
            }
        }
        return redirect::to('view-cart');

    }
    public function delete($id){
        $cart=Session::get('cart');
        unset($cart[$id]);
        Session::put('cart',$cart);
        return Redirect::to('/view-cart');
    }
    public function remove(){
        Session::remove('cart');
        return Redirect::to('/view-cart');
    }
}