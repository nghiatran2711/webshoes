@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List Category
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
            <th>Category ID</th>
            <th>Category Name</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        	<?php foreach ($list_category as $key => $value): ?>
		        <tr>
		            <td>{{ $value->categoryID }}</td>
		            <td><span class="text-ellipsis">{{ $value->categoryName }}</span></td>
		            <td>
		              <a href="{{URL::to('/category/'.$value->categoryID.'/edit')}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o"></i>
		              	</a>
		              <a href="{{URL::to('/category/'.$value->categoryID)}}" class="active" ui-toggle-class=""><i class="fa  fa-trash-o"></i>
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
         	{{ $list_category->links() }}
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
