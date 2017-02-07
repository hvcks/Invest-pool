<?php
include 'core/init.php';
access_redirect();
include 'includes/head.php';
include 'includes/ilogo.php';
include 'includes/loginform.php';




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


		
?>
    	
<?php

    
    echo "<hr/>";
?>