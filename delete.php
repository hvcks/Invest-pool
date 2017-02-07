<?php
 include 'core/init.php';
 access();
 admin_protect();



 
 ?>

 <?php
global $dbCon;

$delete_id=$_GET['del'];  
$delete_query="delete from `user` WHERE `user_id` ='$delete_id'";//delete query  
$run=mysqli_query($dbCon,$delete_query);  
if($run)  
{  
//javascript function to open in the same window   
    echo "<script>window.open('admin_panel.php?deleted=user has been deleted','_self')</script>";
    
} 




 ?>