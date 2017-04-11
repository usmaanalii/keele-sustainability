<?php
include_once 'includes/dbconn.php';
include_once 'includes/functions.php';
 
session_start();

if (isset($_GET['login'])&&!isset($_GET['name'])) {
	if (login_check($conn) == True) {
    echo "success";
	} 
	else {
    echo "failed";
	}
}

if (isset($_GET['login'])&&isset($_GET['name'])) {
	if (login_check($conn) == True) {
    echo htmlentities($_SESSION['username']);
	} 
	else {
    echo "Who are you?";
	}
}

?>
