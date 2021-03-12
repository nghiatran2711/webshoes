@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List Product
    </div>
    <div class="table-responsive">
    	<?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                	Session::put('message',null);
                }
            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Category ID</th>
            <th>Brand ID</th>
            <th>Price</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        	<?php foreach ($list_product as $key => $value): ?>
		        <tr>
		            <td>{{ $value->productID }}</td>
		            <td><span class="text-ellipsis">{{ $value->productName }}</span></td>
                <td><span class="text-ellipsis">{{ $value->description }}</span></td>
                <td><img src="public/uploads/product/{{$value->image}}" alt="" width="120px"></td>
                <td><span class="text-ellipsis">{{ $value->categoryID }}</span></td>
                <td><span class="text-ellipsis">{{ $value->brandID }}</span></td>
                <td><span class="text-ellipsis">{{ $value->price }}</span></td>
		            <td>
		              <a href="{{URL::to('/product/'.$value->productID.'/edit')}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o"></i>
		              	</a>
		              <a href="{{URL::to('/product/'.$value->productID)}}" class="active" ui-toggle-class=""><i class="fa  fa-trash-o"></i>
		              </a>
		              	
		            </td>
		        </tr>
          	<?php endforeach ?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
         	{{ $list_product->links() }}
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
