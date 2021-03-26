@extends('layout')
@section('content')
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Login</li>
				</ol>
			</div><!--/breadcrums-->	
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
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
							<input type="password" name="password" placeholder="Password" />
							<?php
							if ($errors->any()) {  
								foreach ($errors->get('password') as $message) {
								    echo "<p>$message</p>";
								}
							}
							?>
							<span>
								<input type="checkbox" class="checkbox"> 
								Remember me
							</span>
									<button type="submit" class="btn btn-default">Login</button>
									<u><a href="{{URL::to('/forgot-password')}}">Forgot password</a></u>
							<?php 
								$message_login=Session::get('message_login');
								if ($message_login) {
									echo "<p>$message_login</p>";
								}
							 ?>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{URL::to('/register')}}" method="POST">
							{{@csrf_field()}}
							<input type="text" name="fullName" placeholder="Full Name"/>
							<?php  
							if ($errors->any()) {
								foreach ($errors->get('fullName') as $message) {
								    echo "<p>$message</p>";
								}
							}
							?>
							<input type="email" name="email" placeholder="Email Address"/>
							<?php
							if ($errors->any()) {
								foreach ($errors->get('email') as $message) {
								    echo "<p>$message</p>";
								}
							} 
							?>
							<input type="password" name="password" placeholder="Password"/>
							<?php
							if ($errors->any()) {  
								foreach ($errors->get('password') as $message) {
								    echo "<p>$message</p>";
								}
							}
							?>
							<input type="text" name="identityCard" placeholder="Identity Card">
							<?php
							if ($errors->any()) {  
								foreach ($errors->get('identityCard') as $message) {
								    echo "<p>$message</p>";
								}
							}
							?>
							<input type="text" name="address" placeholder="Address">
							<?php
							if ($errors->any()) {  
								foreach ($errors->get('address') as $message) {
								    echo "<p>$message</p>";
								}
							}
							?>
							<input type="text" name="numberPhone" placeholder="Number Phone">
							<?php  
							if ($errors->any()) {
								foreach ($errors->get('numberPhone') as $message) {
								    echo "<p>$message</p>";
								}
							}
							?>
							
							<button type="submit" class="btn btn-default">Signup</button>
							<?php 
								$message=Session::get('message');
								if ($message) {
									echo "<p>$message</p>";
								}
							 ?>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
@endsection