<?php
include 'core/init.php';
access();
include 'includes/head.php';


if (empty($_POST) === false) {
	$require_fields = array('currentpass', 'newpass', 'confirmpass');
	foreach ($_POST as $key => $value) {
		if (empty($value) && in_array($key, $required) === true) {
		    $errors[] = 'You need to fill out all forms';
		    break 1;
		}
	}

	if (md5($_POST['currentpass']) ===  $user_data['password']) {
		if (trim($_POST['newpass']) !== trim($_POST['confirmpass'])) {
			$errors[] = 'Your new passwords do not match';
		}else if (strlen($_POST['newpass']) < 6) {
			$errors[] = 'Your password must be at least 6 characters';
		}
	}
	else {

		$errors[] = 'Your current password is incorrect';
	}
}

?>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php

 if (is_admin($session_user_id) === true) {

		   include 'includes/admin_header.php';
		   include 'includes/admin_nav.php';
		} else
		{
		   include 'includes/header.php';
		   include 'includes/sidenav.php';			
		}
 ?>

<div class="content-wrapper">
            <div class="content-header">
                <div class="row">
                    <div class="col-lg-12">
                    	<h1 class="page-header" style="font-family: Open Sans; font-size: 20px;">Change Password</h1>
                    </div>
                </div>
                <div class="col-lg-10">
                <div class="panel panel-default">
				  	<div class="panel-heading" style="font-family: Open Sans; font-weight: bold;">Change Password</div>
				 	<div class="panel-body">
						<?php  if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
							echo "You've been registered succesfully";
							}
							else {
								if (isset($_GET['force']) === true && empty($_GET['force']) === true) {
								?>
								<p> For security purpose, Please change your password </p>
								<?php
							}
							if (empty($_POST) === false && empty($errors) === true){
							change_password($session_user_id, $_POST['newpass']);
							header('location: change_password.php?success');
							exit();

							}else if (empty($errors) === false) {
							echo output_err($errors);
							}
						?>

				 		<form role="form" class="form-horizontal" action="change_password.php" method="post" style="margin: 0px; text-indent: 0px;">
     						 <div class="form-group">
          						<label for="password" class="col-sm-2 control-label" style="font-family: Open Sans; font-weight: bold;">
              					Password: </label>
                				<div class="col-sm-6">
                      			<input type="password" maxlength="32" class="form-control" placeholder="Enter Password" name="currentpass" />
                  				</div>
                  			</div>
      						<div class="form-group">
          						<label for="password-new" class="col-sm-2 control-label" style="font-family: Open Sans; font-weight: bold;">
              					New-Password: </label>
          						<div class="col-sm-6">
              					<input type="password" class="form-control" id="email" placeholder="New Password" maxlength="32" name="newpass" />
					          </div>
					      </div>
						  <div class="form-group">
						      <label for="password-confirm" class="col-sm-2 control-label" style="font-family: Open Sans; font-weight: bold;">
						          Confirm Password:</label>
						      <div class="col-sm-6">
						          <input type="password" class="form-control" id="mobile" placeholder="Re-type password.." name="confirmpass">
						      </div>
						  </div>
						  <div class="row">
						      <div class="col-sm-2">
						      </div>
						      <div class="col-sm-10">
						          <button type="submit" class="btn btn-primary btn-sm">
						              Submit </button>
						          
						      </div>
						  </div>
						  </form>
						  <?php } ?>
				 	</div>
				</div>
				</div>