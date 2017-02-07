<?php

// accessing user information with userid
function user_data($user_id){
    global $dbCon;

    $data = array();
    $user_id = (int)$user_id;

    $func_num_args = func_num_args();
    $func_get_args = func_get_args();

    if ($func_num_args > 1){
        unset($func_get_args[0]);
        $fields = '`' . implode('`, `', $func_get_args) . '`';
        $query = "SELECT $fields from `user` WHERE `user_id` = $user_id";
        $result = mysqli_query($dbCon, $query);
        $data =   mysqli_fetch_assoc($result);

    
        return $data;

    }

}

function recover($mode, $email){

    $mode = sanitize($mode);
    $email = sanitize($email);

    $user_data = user_data(user_id_from_email($email), 'user_id', 'firstname', 'username');
    if ($mode == 'password') {
        $generated_password = substr(md5(rand(999, 999999)), 0, 8);
        change_password($user_data['user_id'], $generated_password);
        update_user($user_data['user_id'], array('password_Recover' => '1'));

        email($email, 'PASSWORD RECOVERY', "Hello " . $user_data['firstname'] . ",\n\nYour new password is: ". $generated_password . "\n\n-Invest Pool");
    }
}

function is_admin($user_id){
    global $dbCon;
    $user_id = (int) $user_id;
    $query = mysqli_query($dbCon,"SELECT COUNT(`user_id`) FROM `user` WHERE `user_id` = '$user_id' AND `admin` = 1");
    return (mysqli_result($query, 0) == 1) ? true : false;

}

function total_users(){
    global $dbCon;
    $query = mysqli_query($dbCon,"SELECT COUNT(`user_id`)FROM `user` WHERE `active` = 1");
    return(mysqli_result($query, 0));

}

function activate($email, $email_activate){
    global $dbCon;
    $email = sanitize($email);
    $email_activate = sanitize($email_activate);
    $query = mysqli_query($dbCon,"SELECT COUNT(`user_id`)FROM `user` WHERE `email` = '$email' AND `email_activate` = '$email_activate' AND `active` = 0 ");

    if (mysqli_result($query, 0) == 1) {

                mysqli_query($dbCon, "UPDATE `user` SET `active` = 1 WHERE `email` = '$email'"); 
                 return true;

                } else{

                return false;

    }
}

// function to change password
function  change_password($user_id, $password){
    global $dbCon;
    $user_id = (int)$user_id;
    $password = md5($password);

    mysqli_query($dbCon, "UPDATE `user` SET `password` = '$password', `password_recover` = 0 WHERE `user_id` = $user_id ");

}

// registering the user
function register_user($register_data){
    global $dbCon;
    array_walk($register_data, 'array_sanitize');
    $register_data['password'] = md5($register_data['password']);

    $fields = '`' . implode('`, `',  array_keys($register_data)) . '`';
    $data = '\'' . implode('\',\'',  $register_data) . '\'';

    mysqli_query($dbCon, "INSERT INTO `user` ($fields) VALUES ($data)");
    email($register_data['email'], 'ACTIVATE YOUR ACCOUNT', "Hello " . $register_data['firstname'] . ",\n\nYou need to activate your account so use the link below:\n\nhttp://www.clvth.com/activate.php?email=" . $register_data['email'] . "&email_activate=" . $register_data['email_activate'] . "\n\n-Invest Pool");

}

//updating user account info
function update_user($user_id, $update_data){
    global $dbCon;
    $update = array();
    array_walk($update_data, 'array_sanitize');
    
    foreach ($update_data as $field => $data) {
        $update[] = '`' . $field . '` = \'' . $data . '\'';
        
    }

    mysqli_query($dbCon, "UPDATE `user` SET " . implode(', ', $update) . " WHERE `user_id` = $user_id" );

}

// checking if user is logged in
function loggedIN(){
    return (isset($_SESSION['user_id'])) ? true : false; 
}

// For some reason my (mysqli_result) php function seems to be misbehaving, but this function right here makes it good to go
function mysqli_result($result, $row, $field = 0) {
    // Adjust the result pointer to that specific row
    $result->data_seek($row);
    // Fetch result array
    $data = $result->fetch_array();

    return $data[$field];
}

// check if user exists in database
function user_exists($username)
{
   global $dbCon;
    $username = sanitize($username);
    $query = mysqli_query($dbCon,"SELECT COUNT(`user_id`)FROM `user` WHERE `username` = '$username'");
    return(mysqli_result($query, 0) == 1) ? True: false;
}

// logging in the user 
function user_id_from_email($email){
    global $dbCon;
    $email = sanitize($email);
    $query = mysqli_query($dbCon,"SELECT `user_id` FROM `user` WHERE `email` = '$email'");
    return mysqli_result($query, 0, 'user_id');

}

function user_id_from_username($username){
    global $dbCon;
    $username = sanitize($username);
    $query = mysqli_query($dbCon,"SELECT `user_id` FROM `user` WHERE `username` = '$username'");
    return mysqli_result($query, 0, 'user_id');

}


// function to log the user in
function login($email, $password){
     global $dbCon;
     $user_id = user_id_from_email($email);
     $email = sanitize($email);
     $password = md5($password);
     $query = mysqli_query($dbCon,"SELECT COUNT(`user_id`) FROM `user` WHERE `email` = '$email' AND `password` = '$password'");
     return (mysqli_result($query, 0) == 1) ? $user_id : false;

}

//check if the user email exists
function email_exists($email)
{
   global $dbCon;
    $email = sanitize($email);
    $query = mysqli_query($dbCon,"SELECT COUNT(`user_id`)FROM `user` WHERE `email` = '$email'");
    return(mysqli_result($query, 0) == 1) ? True: false;
}

// check for user that has activated their account
function user_active($username)
{
   global $dbCon;
    $username = sanitize($username);
    $query = mysqli_query($dbCon,"SELECT COUNT(`user_id`)FROM `user` WHERE `username` = '$username' AND `active` = 1");
    return(mysqli_result($query, 0) == 1) ? true : false;
}

function email_active($email)
{
   global $dbCon;
    $email = sanitize($email);
    $query = mysqli_query($dbCon,"SELECT COUNT(`user_id`)FROM `user` WHERE `email` = '$email' AND `active` = 1");
    return(mysqli_result($query, 0) == 1) ? true : false;
}

?>