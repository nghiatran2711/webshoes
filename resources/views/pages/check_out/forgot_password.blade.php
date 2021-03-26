@extends('layout')
@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Có phải bạn đã quên mật khẩu?</h2>
						<p>Điền thông tin email bạn đã đăng ký để đổi lại mật khẩu</p>
						<form action="{{URL::to('/login-checkout')}}" method="POST">
							{{@csrf_field()}}
							<input type="email" name="email" placeholder="Email Address" />
							<?php
							if ($errors->any()) {
								foreach ($errors->get('email') as $message) {
								    echo "<p>$message</p>";
								}
							} 
							?>
							<button type="submit" class="btn btn-default">Confirm</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection