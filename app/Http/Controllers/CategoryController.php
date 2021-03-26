<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\Brand;
use App\Product;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
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
        $list_category=category::paginate(2);
        return view('admin.category.list_category')->with('list_category',$list_category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->check_login();
        return view('admin.category.view_add_category');
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
            'categoryName' => 'required|max:255',
        ]);    
        $category=new category();
        $category->categoryName=$validated['categoryName'];
        $category->created_at=new \DateTime();
        $category->updated_at=null;
        $category->save();
        Session::put('message','Thêm loại sản phẩm thành công');
        return Redirect::to('/category/create');
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
        $this->check_login();
        $edit_category=category::where('categoryID',$id)->first();
        return view('admin.category.edit_category')->with('edit_category',$edit_category);
        //
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

        $validated = $request->validate([
            'categoryName' => 'required|max:255',
        ]);
        category::where('categoryID',$id)->update(['categoryName'=>$validated['categoryName']]);
        session::put('message','Sửa loại sản phẩm thành công');
        return redirect('/category');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {      
        $this->check_login();
        category::where('categoryID',$id)->delete();
        session::put('message','Xoá loại sản phẩm thành công');
        return redirect('/category');
        //
    }
    public function getProductByCategory($id){
        $category=Category::select()->get();
        $brand=Brand::select()->get();
        $category_name=Category::find($id);
        $product_category=Product::join('categories','products.categoryID','=','categories.categoryID')->where('categories.categoryID',$id)->get() ;
        return view('pages.category.product_category')->with('category',$category)->with('brand',$brand)->with('product',$product_category)->with('category_name',$category_name);
    }
}
