<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\Brand;
use App\Product;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check_login(){
        if (Auth::check()) {
            return view('admin.dashboard');
        }else{
            return redirect::to('/admin_login')->send();
        }
    }
    public function index()
    {
        //
        $this->check_login();
        $list_product=Product::paginate(5);
        return view('admin.product.list_product')->with('list_product',$list_product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->check_login();
        $list_category=Category::select()->get();
        $list_brand=Brand::select()->get();
        return view('admin.product.view_add_product')->with('list_category',$list_category)->with('list_brand',$list_brand);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->check_login();
        $product=new Product();
        $product->productName=$request->input('productName');
        $product->description=$request->input('description');
        
        $product->categoryID=$request->input('categoryID');
        $product->brandID=$request->input('brandID');
        $product->price=$request->input('price');

        $image=$request->file('image');
        if ($image) {
            $get_name_image = $image->getClientOriginalName();
            $name_image=current(explode('.', $get_name_image));
            $new_image =  $name_image.'.'.$image->getClientOriginalExtension();
            $image->move('public/uploads/product',$new_image);
            $product->image=$new_image;
            $product->save();
            session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('/product/create');
        }
        $product->image='';
        $product->save();
        session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('/product/create');     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $this->check_login();
        $list_category=Category::select()->get();
        $list_brand=Brand::select()->get();
        $edit_product=Product::where('productID',$id)->first();
        return view('admin.product.edit_product')->with('edit_product',$edit_product)->with('list_category',$list_category)->with('list_brand',$list_brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->check_login();
        $product=Product::find($id);
        $product->productName=$request->input('productName');
        $product->description=$request->input('description');
        $product->categoryID=$request->input('categoryID');
        $product->brandID=$request->input('brandID');
        $product->price=$request->input('price');
        $image=$request->file('image');
        if ($image) {
            $get_name_image=$image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.'.'.$image->getClientOriginalExtension();
            $image->move('public/uploads/product',$new_image);
            $product->image=$new_image;
            $product->save();
            session::put('message','Sửa sản phẩm thành công');
            return Redirect::to('product');
        }
        $product->save();
        session::put('message','Sửa sản phẩm thành công');
        return Redirect::to('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->check_login();
        Product::where('productID',$id)->delete();
        session::put('message','Xoá sản phẩm thành công');
        return Redirect::to('product');
    }
    public function productDetails($id){
        $product_details=Product::find($id);
        return view('pages.product.product_details')->with('product_details',$product_details);

    }
}
