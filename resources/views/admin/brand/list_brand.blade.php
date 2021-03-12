@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List Brand
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
            <th>Brand ID</th>
            <th>Brand Name</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        	<?php foreach ($list_brand as $key => $value): ?>
		        <tr>
		            <td>{{ $value->brandID }}</td>
		            <td><span class="text-ellipsis">{{ $value->brandName }}</span></td>
		            <td>
		              <a href="{{URL::to('/brand/'.$value->brandID.'/edit')}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o"></i>
		              	</a>
		              <a href="{{URL::to('/brand/'.$value->brandID)}}" class="active" ui-toggle-class=""><i class="fa  fa-trash-o"></i>
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
         	{{ $list_brand->links() }}
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
