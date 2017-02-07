<?php
include 'core/init.php';
access();
include 'includes/head.php';

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
                    <div class="col-md-8">
                    	<h1 class="page-header" style="font-family: Open Sans; font-size: 20px;"> Contact </h1>
                    </div>
                </div>
             <div class="col-lg-10">
           	 <div class="panel panel-default">
			  	<div class="panel-heading" style="font-family: Open Sans; font-weight: bold;">Contact</div>
			 	<div class="panel-body">
			 	<form role="form" class="form-horizontal" action="" method="post" style="margin: 0px; text-indent: 0px;">
     						 <div class="form-group">
          						<label for="mphone" class="col-sm-2 control-label" style="font-family: Open Sans; font-weight: bold;">
              					Mobile Phone: </label>
                				<div class="col-sm-6">
                      			<input type="text" maxlength="32" class="form-control" placeholder="Enter mobile phone" name="mn"/>
                  				</div>
                  			</div>
      						<div class="form-group">
          						<label for="hphone" class="col-sm-2 control-label" style="font-family: Open Sans; font-weight: bold;">
              					Home Phone: </label>
          						<div class="col-sm-6">
              					<input type="text" class="form-control" id="email" placeholder="Enter home phone" maxlength="32" name="hn" />
					          </div>
					      </div>
						  <div class="form-group">
						      <label for="cphone" class="col-sm-2 control-label" style="font-family: Open Sans; font-weight: bold;">
						          Cell Phone:</label>
						      <div class="col-sm-6">
						          <input type="email" class="form-control" id="mobile" placeholder="Enter cell phone.." name="cn">
						      </div>
						  </div>
						  <div class="row">
						      <div class="col-sm-2">
						      </div>
						      <div class="col-sm-10">
						          <button type="#" class="btn btn-primary btn-sm">
						              Submit </button>
						          
						      </div>
						  </div>
						  </form>
						  
				 	</div>
				</div>
				</div>
				