<!DOCTYPE html>
<html lang="en">
			<div class="container" style="margin-top: 30px;">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title"> Invest Pool </h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="login.php">
					
					<div class="form-group">
							<label for="error" class="cols-sm-2 control-label"></label>
							<small class="error">
								<?php
									if(empty($_POST) === false) {
									   	$email= $_POST['email'];
									   $password= $_POST['password'];

										if(empty($email) === true || empty($password) === true) {
									  		 $errors[]= 'You need to enter a valid Email and password';
											}	else if(email_exists($email) === false){
									   				$errors[]= 'Sorry, that Email is Invalid';
											}	else if(email_active($email) === false){
									 				 $errors[]= 'You haven\'t activated your account';
											} 	else {
										if(strlen($password) > 32){
									    	$errors[] = 'Password is too long';
									  		}

									  $login = login($email, $password);
									  	if($login === false){
									    	 $errors[] = 'The Email\password combination is incorrect';
									 	 	}	else{
									      $_SESSION['user_id'] = $login;
									    
									      header('location: index.php');
									      exit();
									  }
								}
								}
								if (empty($errors) === false){
										
									?>
									    	
									<?php

									    echo output_err($errors);
									    }
									
								?>
							</small>
							<div class="cols-sm-10">
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="username"  placeholder="Enter Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>
						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-md btn-block login-button">Login</button>
						</div>
						 <div class="login-register">
				            <a href="recover.php?mode=password"> Forgot Password? </a>
				         </div>
						<div class="login-register">
				            <a href="register.php"> Register </a>
				         </div>
				        

						</form>
				</div>
		</div>
	</div>
</html>					