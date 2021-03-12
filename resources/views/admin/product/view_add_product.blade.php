@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add products
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                        ?>
                        <form action="{{URL::to('/product')}}" role="form" enctype="multipart/form-data" method="POST">
                            {{@csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" name="productName" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" name="image" id="exampleInputFile">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Category ID</label>
                                <select class="form-control m-bot15" name="categoryID">
                                    <?php foreach ($list_category as $key => $value): ?>
                                        <option value="{{$value->categoryID}}">{{$value->categoryName}}</option>
                                    <?php endforeach ?>
                                    
                                </select>
                            </div>

                           <div class="form-group">
                                <label for="exampleInputPassword1">Brand ID</label>
                                <select class="form-control m-bot15" name="brandID">
                                    <?php foreach ($list_brand as $key => $value): ?>
                                        <option value="{{$value->brandID}}">{{$value->brandName}}</option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Price</label>
                                <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-info">ADD PRODUCT</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</div>
@endsection
