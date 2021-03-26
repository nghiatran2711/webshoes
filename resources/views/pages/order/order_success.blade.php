@extends('layout')
@section('content')	
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Success order</li>
				</ol>
			</div><!--/breadcrums-->	
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<h4>Kết quả đặt hàng</h4>
                            <h5>Đặt hàng thành công</h5>
                            
							@if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif
                            @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif	
						</div>
					</div>			
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection
