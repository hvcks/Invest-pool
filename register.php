<?php
include 'core/init.php';
access_redirect();
include 'includes/head.php';
include 'includes/nav.php';

if (empty($_POST) === false) {
	$required = array('firstname', 'lastname', 'username', 'email', 'password', 'confirm');
	foreach ($_POST as $key => $value) {
		if (empty($value) && in_array($key, $required) === true) {
		    $errors[] = 'You need to fill out all forms';
		    break 1;
		}
	}
	
	if (empty($errors) === true) {
	if (user_exists($_POST['username']) === true) {
		$errors[] = 'Sorry, the username \'' . htmlentities($_POST['username']) . '\' is already taken.'; 
		}
	if (preg_match("/\\s/", $_POST['username']) == true) {
		$errors[] = 'Your username must ot contain any spaces';
		
		}	
	if  (strlen($_POST['password']) < 6){
		$errors[] = 'Your password must be at least 6 characters';

	}
	if (trim($_POST['password']) !== trim($_POST['confirm'])) {
		$errors[] = 'Your passwords do not match';
	}
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors[] = 'A valid email address is required';
	}

	if (email_exists($_POST['email']) === true) {
		$errors[] = 'Sorry, the email \'' . htmlentities($_POST['email']) . '\' is in use.';
	}

     
	}
}

?>

<?php
include 'includes/regform.php';
?>
