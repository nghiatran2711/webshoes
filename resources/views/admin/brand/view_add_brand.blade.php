@extends('admin_layout')
@section('admin_content')
<section class="panel">
    <header class="panel-heading">
        Add brand
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
	        <form role="form" method="POST" action="{{URL::to('brand')}}">
	        	{{@csrf_field()}}
	            <div class="form-group">
	                <label for="exampleInputEmail1">Brand Name</label>
	                <input type="text" name="brandName" class="form-control" id="exampleInputEmail1" placeholder="Enter brand name">
	            </div>
	            <button type="submit" class="btn btn-info">Add brand</button>
	        </form>
        </div>

    </div>
</section>
@endsection