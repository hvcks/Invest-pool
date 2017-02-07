<?php
include 'core/init.php';
include 'includes/head.php';
include 'includes/nav.php';


?>
<body>


<?php


	if (isset($_GET['success']) === true && empty($_GET['success']) === true) {


	echo "<div class='alert alert-success' style='margin-top:90px; text-align:center;'><strong>Account Activated !</strong> You may proceed to the <a href='login.php' class='alert-link'>Log in page</a></div>";

	
	}


	else if (isset($_GET['email'], $_GET['email_activate']) === true) {
	
	$email  = trim($_GET['email']);
	$email_activate = trim($_GET['email_activate']);

	if (email_exists($email) === false) {
		$errors[] = 'Oops, Something went wrong, and we couldn\'t find that email address!';
	}else if (activate($email, $email_activate) === false) {
		$errors[] = 'Sorry, we ran into problem activating your account';
	}


	if (empty($errors) === false) {

		echo "<h2>Oops...</h2>";

		
		echo output_err($errors);
	} else{

		header('location: activate.php?success');
		exit();
	}

	}else {

		//header('location: index.php');
		exit();
	}

?></body>