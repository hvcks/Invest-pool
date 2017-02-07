<?php
include 'core/init.php';

?>

<?php 

  if(isset($_SESSION['user_id'])){
   		header('location: dashboard.php');	
  if (is_admin($session_user_id) === true) {
  		header('location: admin_panel.php');
}
}
  else{
   include 'includes/overall/header.php';
   
  }

?>

