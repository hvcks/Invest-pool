<?php
include 'core/init.php';
access_redirect();
include 'includes/head.php';
include 'includes/nav.php';


?>

<div class="container" style="margin-top: 30px;">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title"> Invest Pool </h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="">
						<div class="form-group">
							<label for="error" class="cols-sm-2 control-label"></label>
							<small class="error">
							<?php
								if (isset($_GET['success']) === true && empty($_GET['success']) === false){
									echo "Thanks, we've emailed you";
								}
								else{
								$mode_allowed = array('username', 'password');

								if (isset($_GET['mode']) === true && in_array($_GET['mode'], $mode_allowed) === true) {
									if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
										if (email_exists($_POST['email']) === true) {
											recover($_GET['mode'], $_POST['email']);
										}else
										{
											echo '<p> Invalid Email </p>';
										}
									}
								


							?>
							</small>
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

				<div class="form-group ">
					<button type="submit" class="btn btn-primary btn-md btn-block login-button">Recover</button>
				</div>
				</form>
				<?php
					} else{
					header('locaation: index.php');
					exit();
					} 
				}
				 ?>
			</div>
		</div>
