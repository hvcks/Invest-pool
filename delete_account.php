<?php
include 'core/init.php';
access();
include 'includes/head.php';


if(empty($_POST) === false) {
	   $email= $_POST['password'];
	   $password= $_POST['passconfirm'];

	if (md5($_POST['password']) ===  $user_data['password']) {
		if (trim($_POST['password']) !== trim($_POST['passconfirm'])) {
		$errors[] = 'Your new passwords do not match';
	}
	}else {

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
                    	<h1 class="page-header" style="font-family: Open Sans; font-size: 20px;">De-activate Account</h1>
                    </div>
                </div>
                <div class="col-lg-10">
                <div class="panel panel-default">
				  	<div class="panel-heading" style="font-family: Open Sans; font-weight: bold;">De-activate Account</div>
				 	<div class="panel-body">
				 	<?php
				 		global $dbCon;
				 		global $session_user_id;
				 		if (empty($_POST) === false && empty($errors) === true){
							$query = mysqli_query($dbCon, "UPDATE `user` SET `active` = 0 WHERE `user_id` = $session_user_id");
							echo "<script> window.location.reload(); </script>";

							}	else if (empty($errors) === false) {
								echo output_err($errors);
							}


				 	?>
				 		<form role="form" class="form-horizontal" action="delete_account.php" method="post" style="margin: 0px; text-indent: 0px;">
     						 <div class="form-group">
          						<label for="password" class="col-sm-2 control-label" style="font-family: Open Sans; font-weight: bold;">
              					Password: </label>
                				<div class="col-sm-6">
                      			<input type="password" maxlength="32" class="form-control" placeholder="Enter Password" name="password"  />
                  				</div>
                  			</div>
      						<div class="form-group">
          						<label for="passconfirm" class="col-sm-2 control-label" style="font-family: Open Sans; font-weight: bold;">
              					Confirm Password: </label>
          						<div class="col-sm-6">
              					<input type="password" class="form-control" id="email" placeholder="Re-enter Password" maxlength="32" name="passconfirm" />
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
						  
	</div>
</div>
</div>