<div class="container">
	<div class="row main">
		<div class="panel-heading">
			<div class="panel-title text-center">
				<h1 class="title"> Invest Pool </h1>
					<hr />
			</div>
		</div> 

			<div class="main-login main-center"> 
				<form class="form-horizontal" method="post" action="register.php">

				<div class="form-group">
							<label for="error" class="cols-sm-2 control-label"></label>
							<small class="error">
								<?php if (isset($_GET['success']) && empty($_GET['success'])) {
								echo "  <div class='alert alert-success alert-dismissable'>
    										<a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
    										<strong> Registration successful!</strong> You may proceed to your mail to continue your Registration Process.
 										 </div>";
							}
							else{
						   if (empty($_POST) === false && empty($errors) === true) {
						        $register_data = array(
						        	'firstname' => $_POST['firstname'],
						        	'lastname'  => $_POST['lastname'],
						        	'username'  => $_POST['username'],
						        	'email'     => $_POST['email'],
						        	'password'  => $_POST['password'],
						        	'email_activate'  => md5($_POST['username'] + microtime())
						        	);

						        register_user($register_data);
						        header('location: register.php?success');
						        exit();

						      }else if (empty($errors) === false) {

								echo output_err($errors);
							     } 
							 ?> 
								</small>
								<div class="cols-sm-10">
							</div>
				</div>

				<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">First Name</label>
						<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="firstname" id="name"  placeholder="First Name"/>
						</div>
					</div>
				</div>

				<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Last Name</label>
						<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="lastname" id="name"  placeholder="Last Name"/>
						</div>
					</div>
				</div>

				<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Your Email</label>
						<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
						</div>
					</div>
				</div>

				<div class="form-group">
						<label for="username" class="cols-sm-2 control-label">Username</label>
						<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
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

				<div class="form-group">
						<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
						<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
						</div>
					</div>
				</div>

				<div class="form-group ">
				<button type="submit" class="btn btn-primary btn-md btn-block login-button">Register</button>
				</div>
				<div class="login-register">
					<a href="login.php">Login</a>
				</div>
			</form>
<?php 
	}
?>
		</div>
		<hr />
	</div>
</div>
