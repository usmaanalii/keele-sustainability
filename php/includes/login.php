<?php
include_once 'dbconn.php';
include_once 'functions.php';

session_start();
 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // The hashed password.
 
    if (login($email, $password, $conn) == true) {
        // Login success 
        header('Location: ../index.html');
    } else {
        // Login failed 
        //header('Location: ../login_form.php?error=1');
        echo "fail";
    }
} else {
    // The correct POST variables were not sent to this page. 
    //header('Location: ../login_form.php?error=1');
    echo "what";
}
?> 
