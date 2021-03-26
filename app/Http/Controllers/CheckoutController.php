<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Customers;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function view(){
    	if (Session::get('customer')) {
    		if (Session::get('cart')) {
    			return view('pages.check_out.view_check_out');
    		}else{
    			return Redirect::to('/');
    		}
    		
    	}else{
    		return Redirect::to('/view-login');
    	}
    	
    }
    public function view_login(){
    	return view('pages.check_out.login_check_out');
    }
    public function register(Request $request){
    	 $rules = [
            'email' => 'required|email|max:255',
	        'password' => 'required|min:8',
	        'fullName'=>'required|max:255',
	        'identityCard'=>'required|numeric',
	        'address'=>'required|max:255',
	        'numberPhone'=>'required|numeric'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            'fullName.required'=>'Full Name là trường bắt buộc',
            'address.required'=>'Address là trường bắt buộc',
            'numberPhone.required'=>'Number Phone là trường bắt buộc',
            'numberPhone.numeric'=>'Number Phone không hợp lệ',
            'identityCard.required'=>'Identity Card là trường bắt buộc',
            'identityCard.numeric'=>'Identity Card không hợp lệ'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return Redirect::to('/view-login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ insert vào database
            $email = $request->input('email');
            $password = $request->input('password');
            $fullName=$request->input('fullName');
            $identityCard=$request->input('identityCard');
            $address=$request->input('address');
            $numberPhone=$request->input('numberPhone');

            $Customers= new Customers();
            $Customers->fullName=$fullName;
            $Customers->email=$email;
            $Customers->password=md5($password);
            $Customers->identityCard=$identityCard;
            $Customers->address=$address;
            $Customers->numberPhone=$numberPhone;
            $Customers->save();
            Session::put('message','Regiter success');
            return Redirect::to('/view-login');
        }   
    }
    public function login(Request $request){
    	$rules = [
            'email' => 'required|email|max:255',
	        'password' => 'required|min:8'    
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự'   
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return Redirect::to('/view-login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ insert vào database
            $email = $request->input('email');
            $password = $request->input('password');
            $Customers=Customers::where('email',$email)->first();
            if ($Customers) {
            	if ($Customers->password==md5($password)) {
            		if ($cart=Session::get('cart')) {
            			Session::put('customer',$email);
		            	return Redirect::to('/check-out');
		            }else{
                        Session::put('customer',$email);
		            	return Redirect::to('/');
		            }
            	}else{
            		Session::put('message_login','Password incorrect');
            		return Redirect::to('/view-login');

            	}
            }else{
                Session::put('message_login','Tài khoản Không tồn tại');
                    return Redirect::to('/view-login');
            }
            
        }   
    }
    public function forgot_password(){
        return view('pages.check_out.forgot_password');
    }
}
