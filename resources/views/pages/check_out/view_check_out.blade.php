@extends('layout')
@section('content')	
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->	
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							<form action="{{URL::to('/order')}}" method="post">
							@csrf	
								<input type="text" name="fullName" placeholder="Full Name">
								<input type="text" name="numberPhone" placeholder="Number Phone">
								<input type="text" name="address" placeholder="Address">		
						</div>
					</div>
					<!-- <div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form>
									<input type="text" placeholder="Company Name">
									<input type="text" placeholder="Email*">
									<input type="text" placeholder="Title">
									<input type="text" placeholder="First Name *">
									<input type="text" placeholder="Middle Name">
									<input type="text" placeholder="Last Name *">
									<input type="text" placeholder="Address 1 *">
									<input type="text" placeholder="Address 2">
								</form>
							</div>
							<div class="form-two">
								<form>
									<input type="text" placeholder="Zip / Postal Code *">
									<select>
										<option>-- Country --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<select>
										<option>-- State / Province / Region --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<input type="password" placeholder="Confirm password">
									<input type="text" placeholder="Phone *">
									<input type="text" placeholder="Mobile Phone">
									<input type="text" placeholder="Fax">
								</form>
							</div>
						</div>
					</div> -->
					<!-- <div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>		 -->			
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<p style="background-color: orange; text-align: center; font-size: 20px;"><?php if(!empty($cart)) {echo "Thông tin chi tiết giỏ hàng!";} else{echo"Hiện tại bạn chưa có sản phẩm nào!";} ?></p>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Product ID</td>
							<td class="image">Image</td>
							<td class="description">Product Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$cart=Session::get('cart');
							$total=0;
						 ?>
						 <?php if ($cart): ?>
							 	<?php foreach ($cart as $key => $value): ?>
								<tr>
									<td class="cart_price" style="text-align: center;">
										<p>{{$value['productID']}}</p>
									</td>
									<td>
										<img src="public/uploads/product/{{$value['image']}}" width="100" alt="">
									</td>
									<td class="cart_description">
										<h4>{{$value['productName']}}</h4>
										<p>Web ID: 1089772</p>
									</td>
									<td class="cart_price">
										<p>{{$value['price']}}</p>
									</td>
									<td class="cart_quantity">
										<div class="cart_quantity_button">
											<input class="cart_quantity_input" type="number" name="quantity" value="{{$value['quantity']}}" autocomplete="off" size="2">
										</div>
									</td>
									<td class="cart_total">
										<p class="cart_total_price">{{number_format($value['quantity']*$value['price'])}} VNĐ</p>
									</td>
									<td class="cart_delete">
										<a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$value['productID'])}}"><i class="fa fa-times" style="margin-top: 30px;"></i></a>
									</td>
								</tr>
								<?php  
									$total+=($value['price']*$value['quantity']);
								?>
							<?php endforeach ?>
						 <?php endif ?>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>{{number_format($total)}} VNĐ</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<button type="submit" class="btn btn-primary" style="float:right;margin-bottom: 10px;">Order</button>
			</form>
			<!-- <div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
			</div> -->
		</div>
	</section> <!--/#cart_items-->
@endsection
