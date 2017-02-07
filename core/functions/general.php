<?php
function email($to, $subject, $body){
	mail($to, $subject, $body, 'from:info@clvth.com');
	
}

function access(){
	if (loggedIN() === false) {
		header('location: login.php');
		exit();
	}

}

function admin_protect(){
	global $user_data;
	if (is_admin($user_data['user_id']) === false) {
		header('location:index.php');
		exit();
}
}

function access_redirect(){
	if (loggedIN() === true) {
		header('location: dashboard.php');
		exit();
	}

}

function admin_redirect(){
	global $session_user_id;
	if (loggedIN() === true) {
		 if (is_admin($session_user_id) === true) {
		header('location: admin_panel.php');
		exit();
	}
}

}



function array_sanitize(&$item){
	global $dbCon;
	$item = htmlentities(strip_tags(mysqli_real_escape_string($dbCon, $item)));

}

function sanitize($data)
{
    global $dbCon;
    return htmlentities(strip_tags(mysqli_real_escape_string($dbCon,$data)));
}

function output_err($errors){
	$output = array();
	foreach($errors as $error){
		$output[] = '<li>' . $error . '</li>';
	}
	return '<ul>' . implode('', $output) . '</ul>';

}
?>