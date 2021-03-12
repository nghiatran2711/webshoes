@extends('admin_layout')
@section('admin_content')
<section class="panel">
    <header class="panel-heading">
        Edit category
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
        	@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
	        <form role="form" method="POST" action="{{URL::to('/category/'.$edit_category->categoryID)}}">
	        	{{@csrf_field()}}
	        	<div class="form-group">
	                <label for="exampleInputEmail1">Category ID</label>
	                <input type="text" name="categoryID" value="{{$edit_category->categoryID}}" class="form-control" id="exampleInputEmail1" readonly="">
	            </div>
	            <div class="form-group">
	                <label for="exampleInputEmail1">Category Name</label>
	                <input type="text" name="categoryName" value="{{$edit_category->categoryName}}" class="form-control" id="exampleInputEmail1" placeholder="Enter category name">
	            </div>
	            <button type="submit" class="btn btn-info">Update category</button>
	        </form>
        </div>

    </div>
</section>
@endsection