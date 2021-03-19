@extends('layout')
@section('content')
<section>
	<div class="container">
		<div class="row">	
			<div class="col-sm-12 padding-right">
				<div class="product-details"><!--product-details-->
					<div class="col-sm-4">
						<div class="view-product">
							<img src="../public/uploads/product/{{$product_details->image}}" alt="" />
						</div>
					</div>
					<div class="col-sm-8">
						<div class="product-information"><!--/product-information-->
							<h2>{{$product_details->productName}}</h2>
							<p>Web ID: 1089772</p>
							<span>
								<span>{{number_format($product_details->price)}} VNĐ</span><br>
								<label>Quantity:</label>
								<form action="{{URL::to('/add-cart')}}" method="post">
									{{@csrf_field()}}
									<input type="hidden" name="productID" value="{{$product_details->productID}}">
									<input type="text" name="quantity" value="1"  />
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</form>
							</span>
							<p><b>Description: </b>{{$product_details->description}}</p>
							<p><b>Condition:</b> New</p>
							<p><b>Brand:</b> E-SHOPPER</p>
							<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
						</div><!--/product-information-->
					</div>
				</div><!--/product-details-->
			</div>
		</div>
	</div>
</section>
@endsection