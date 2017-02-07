<?php
include 'core/init.php';
include 'includes/head.php';



if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
	$username = $_GET['username'];

	if (user_exists($username) === true) {
	
		$user_id = user_id_from_username($username);
		$profile_data = user_data($user_id, 'firstname', 'lastname', 'email');

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
                   <div class="col-sm-4">
                      <a href="profile.php?username=<?php echo $user_data['username']; ?>">
                        <img src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" class="img-circle" alt="Profile Picture" width="200" height="200">
                      </a><hr/>
                      <div class="about">
                      		<p style="font-family: Open Sans;;"> About <a href="info_basic.php"><i class="fa fa-pencil-square " aria-hidden="true"></i></a> </p>
                      		<hr>
                      		<p><p style="margin-top: -10px; font-family: Open Sans; font-weight: bold;"></p>Name: <?php echo $profile_data['firstname']; echo $profile_data['lastname']; ?></p>
                      		<p><p style="margin-top: -8px; font-family: Open Sans; font-weight: bold;"></p>Email: <?php echo $profile_data['email'];?> </p>
                      </div>
                                         	


                   </div>
                   <div class="col-sm-7" >
                      <h1 class="page-header" style="font-family: Open Sans;"> Account Information </h1>
                   </div>
                   <div class="col-sm-7" >
                     <div class="row" style="margin-top: 20px">
                  <div class="panel panel-info">
                      <div class="panel-heading">
                          <h3> Account details </h3>
                      </div>
                    <div class="panel-footer" style="font-family: Open Sans; font-size: 13px; font-weight: bold;">Funds Received <?php echo "<p style='float:right'>"."$0.00"."</p>"; ?></div>
                <div class="panel-footer" style="font-family: Open Sans; font-size: 13px; font-weight: bold;">Amount Payed <?php echo "<p style='float:right'>"."$0.00"."</p>"; ?></div>
            <div class="panel-footer" style="font-family: Open Sans; font-size: 13px; font-weight: bold;">Balance <?php echo "<p style='float:right'>"."$0.00"."</p>"; ?></div>
        </div>
  
  </div>

                   </div>

                 </div>
            </div>
</div>


<?php
	}else{
		echo 'Sorry, that user doesn\'t exists!';
	}	

} else{

	('location:index.php?x=2');
	exit();
}

?>



