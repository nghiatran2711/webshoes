@extends('layout')
@section('content')

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<form action="{{URL::to('/update-cart')}}" method="POST">
				{{@csrf_field()}}
				<div class="table-responsive cart_info">
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<td class="image">ID product</td>
								<td>Image</td>
								<td class="description">ProductName</td>
								<td class="price">Price</td>
								<td class="quantity">Quantity</td>
								<td class="total">Total</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							<?php  
							 	$cart= Session::get('cart');
							 	$total=0;
							?>
							<?php if ($cart): ?>
								<?php foreach ($cart as $key => $value): ?>
						 			<tr>
						 				<td class="cart_price">
											<p style="text-align: center;">{{$value['productID']}}</p>
										</td>
										<td>
											<img src="public/uploads/product/{{$value['image']}}" alt="" width="100px">
										</td>
										<td class="cart_description">
											<h4><a href="">{{$value['productName']}}</a></h4>
											<!-- <p>Web ID: 1089772</p> -->
										</td>
										<td class="cart_price">
											<p>{{number_format($value['price'])}} VNĐ</p>
										</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button">
												<input class="cart_quantity_input" type="number" name="quantity[{{$value['productID']}}]" value="{{$value['quantity']}}" autocomplete="off" size="2" style="width: 70px;">
											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price">{{number_format($value['price']*$value['quantity'])}} VNĐ</p>
										</td>
										<td class="cart_delete">
											<a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$value['productID'])}}"><i class="fa fa-times" style="margin-top: 30px;"></i></a>
										</td>
									</tr>
									<?php  
										$total+=($value['price']*$value['quantity']);
									?>
								<?php endforeach ?>
							<?php else: ?>
								<?php echo "<h4>Không có sản phẩm nào</h4>" ?>
							<?php endif ?>
						</tbody>
					</table>
				</div>
			</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<!-- <div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
 -->				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{number_format($total)}} VNĐ</span></li>
						</ul>
							<button type="submit" class="btn btn-default update">Update</button>
							<a class="btn btn-default check_out" href="">Check Out</a>
							<a class="btn btn-default check_out" href="{{URL::to('/destroy-cart')}}">Remove Cart</a>
					</div>
				</div>
			</form>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection