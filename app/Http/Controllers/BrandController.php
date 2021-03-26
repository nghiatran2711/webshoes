<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
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
        $this->check_login();
        $list_brand=Brand::paginate(2);
        return view('admin.brand.list_brand')->with('list_brand',$list_brand);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->check_login();
        return view('admin.brand.view_add_brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->check_login();
        $validated = $request->validate([
            'brandName' => 'required|max:255',
        ]);    
        $brand=new Brand();
        $brand->brandName=$validated['brandName'];
        $brand->created_at=new \DateTime();
        $brand->updated_at=null;
        $brand->save();
        Session::put('message','Thêm loại sản phẩm thành công');
        return Redirect::to('/brand/create');
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
        $edit_brand=Brand::where('brandID',$id)->first();
        return view('admin.brand.edit_brand')->with('edit_brand',$edit_brand);
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
        //
        $this->check_login();

        $validated = $request->validate([
            'brandName' => 'required|max:255',
        ]);
        Brand::where('brandID',$id)->update(['brandName'=>$validated['brandName']]);
        session::put('message','Sửa hiệu sản phẩm thành công');
        return redirect('/brand');
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
        Brand::where('brandID',$id)->delete();
        session::put('message','Xoá hiệu sản phẩm thành công');
        return redirect('/brand');
    }
    public function getProductByBrand($id){
        $category=Category::select()->get();
        $brand=Brand::select()->get();
        $brand_name=Brand::find($id);
        $product_brand=Product::join('brands','products.brandID','=','brands.brandID')->where('brands.brandID',$id)->get() ;
        return view('pages.brand.product_brand')->with('category',$category)->with('brand',$brand)->with('product',$product_brand)->with('brand_name',$brand_name);
    }
}
