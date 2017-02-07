<?php
include 'core/init.php';
access();
include 'includes/head.php';





 if (empty($_POST) === false) {
 	$required = array('firstname', 'lastname', 'email', 'relationship', 'birthplace');
	foreach ($_POST as $key => $value) {
		if (empty($value) && in_array($key, $required) === true) {
		    $errors[] = 'You need to fill out all forms';
		    break 1;
		}
	}

	if (empty($errors) === true) {
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errors[] = 'A valid email address is required';
		} else if (email_exists($_POST['email']) === true && $user_data['email'] !== $_POST['email']) {
			$errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already in use ';
		}
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
  <!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
            <div class="content-header">
                <div class="row">
                    <div class="col-lg-12">
                    	<h1 class="page-header" style="font-family: Open Sans; font-size: 20px;">Basic Information</h1>
                    </div>
                </div>
                <div class="col-lg-10">
                <div class="panel panel-default">
				  	<div class="panel-heading" style="font-family: Open Sans; font-weight: bold;">Basic Information</div>
				 	<div class="panel-body">
				 			<?php
								if (isset($_GET['success']) && empty($_GET['success'])) {
									echo "Update Successful";
								}
								else{
								if (empty($_POST) === false && empty($errors) === true) {
									$update_data = array(
							        	'firstname' => $_POST['firstname'],
							        	'lastname'  => $_POST['lastname'],
							        	'email' 	=> $_POST['email'],
							        	'belief' 	=> $_POST['belief'],
							        	'birthplace' 	=> $_POST['birthplace']
							        
							        );

							        update_user($session_user_id, $update_data);
							        echo "<script type='text/javascript'>alert('Update Successful!')</script>";
							        header('location: info_basic.php?success');
							        exit();

							}

							else if(empty($errors) === false){
								echo output_err($errors);
							}
}
							?> 
				 		<form role="form" class="form-horizontal" action="info_basic.php" method="post" style="margin: 0px; text-indent: 0px;">
     						 <div class="form-group">
          						<label for="fname" class="col-sm-2 control-label" style="font-family: Open Sans; font-weight: bold;">
              					First Name: </label>
                				<div class="col-sm-6">
                      			<input type="text" maxlength="32" class="form-control" placeholder="Name" name="firstname" value="<?php echo $user_data['firstname']; ?>" />
                  				</div>
                  			</div>
      						<div class="form-group">
          						<label for="lname" class="col-sm-2 control-label" style="font-family: Open Sans; font-weight: bold;">
              					Last Name: </label>
          						<div class="col-sm-6">
              					<input type="text" class="form-control" id="email" placeholder="Surname" maxlength="32" name="lastname" value="<?php echo $user_data['lastname']; ?>" />
					          </div>
					      </div>
						  <div class="form-group">
						      <label for="email" class="col-sm-2 control-label" style="font-family: Open Sans; font-weight: bold;">
						          Email:</label>
						      <div class="col-sm-6">
						          <input type="email" class="form-control" id="mobile" placeholder="Email" name="email" value="<?php echo $user_data['email']; ?>" />
						      </div>
						  </div>
						  <div class="form-group">
						      <label for="email" class="col-sm-2 control-label" style="font-family: Open Sans; font-weight: bold;">
						      Relationship:</label>
						      <div class="col-sm-6">
						          <input type="text" class="form-control" id="mobile" placeholder="Enter relationship status..." name="belief" />
						      </div>
						  </div>
						  <div class="form-group">
						      <label for="email" class="col-sm-2 control-label" style="font-family: Open Sans; font-weight: bold;">
						          Birthplace:</label>
						      <div class="col-sm-6">
						          <input type="text" class="form-control" id="mobile" placeholder="Enter Birth city..." name="birthplace" />
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

