<?php

session_start();
//error_reporting(1);

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';

$current_file = explode('/', $_SERVER['SCRIPT_NAME']);
$current_file = end($current_file);


if(loggedIN() === true){
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'firstname', 'lastname', 'username', 'email', 'password', 'admin', 'belief', 'birthplace', 'active', 'password_recover');

	if (email_active($user_data['email']) === false) {
		session_destroy();
		header('location: index.php');
		exit();
	}

	if ($current_file !== 'change_password.php' && $current_file !== 'logout.php' && $user_data['password_recover'] == 1) {
		header('location: change_password.php?force');
	}
}
 
 $errors = array();


?>	