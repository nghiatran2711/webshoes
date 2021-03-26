<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Order;
use App\orderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function store(Request $request){

		$total=0;

		$customer=Session::get('customer');
		//get customer ID
		$result=DB::select('select customerID from customers where email = ?', [$customer]);
		foreach ($result as $key => $value) {
			$customerID=$value->customerID;	
		}
		$cart=Session::get('cart');
		foreach ($cart as $key => $value) {
			//caculate total money for order
			$total+=($value['price']*$value['quantity']);
		}
		$validator = Validator::make($request->all(), [
            'fullName' => 'required|max:255',
            'numberPhone' => 'required|numeric',
			'address'=>'required|string'
        ]);

        if ($validator->fails()) {
            return redirect('/check-out')
                        ->withErrors($validator)
                        ->withInput();
        }
    	$fullName=$request->fullName;
    	$numberPhone=$request->numberPhone;
    	$address=$request->address;

		DB::beginTransaction();
        
		try{
			//insert data in table orders
			$orders=new Order;
			$orders->customerID=$customerID;
			$orders->fullName=$fullName;
			$orders->numberPhone=$numberPhone;
			$orders->address=$address;
			$orders->date_order=date('Y-m-d H:i:s');
			$orders->date_ship=null;
			$orders->total_order=$total;
			$orders->status=0;
			$orders->save();
			$lastInsertID=$orders->orderID;

			$amount=0;
			//insert data in orderDetails
			foreach ($cart as $key => $value) {
				// caculate amount
				$amount=$value['price']*$value['quantity'];
				$orderDetails= new orderDetails;
				$orderDetails->orderID=$lastInsertID;
				$orderDetails->productID=$value['productID'];
				$orderDetails->quantity=$value['quantity'];
				$orderDetails->amount=$amount;
				$orderDetails->save();
				Session::remove('cart');
			}
			DB::commit();
            return view('pages.order.order_success')->with('success', 'Đơn hàng của bạn đã đặt thành công!!!');
		}catch (\Exception $ex) {
			DB::rollBack();
            return view('pages.order.order_success')->with('error', $ex->getMessage());
		}
		
		
		

    }
}
