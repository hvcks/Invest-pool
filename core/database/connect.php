<?php
global $dbCon;

$servername = "localhost";
$username = "root";
$password = "";
$db = "invpool";

// Create connection
$dbCon = new mysqli($servername, $username, $password, $db);

// Check connection
if ($dbCon->connect_error) {
    die("Connection failed: " . $dbCon->connect_error);
} 
?>