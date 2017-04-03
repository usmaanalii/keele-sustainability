<?php
include_once 'includes/dbconn.php';
include_once 'includes/functions.php';
 
session_start();
 
if (login_check($conn) == True) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <!--<link rel="stylesheet" href="styles/main.css" />-->
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo "<p class='error'>Error Logging In!</p>";
        }
        if (isset($_GET['reg'])){		
		echo "<h4>Account succesffuly created, please login below!</h4>";
  } 
        ?> 
        <form action="includes/login.php" method="post" name="login_form">                      
            Email: <input type="text" name="email" /><br>
            Password: <input type="password" 
                             name="p" 
                             id="password"/><br>
            <input type="submit" 
                   value="Login" /> 
        </form>
 
<?php
        if (login_check($conn) == True) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                }
?>      
    </body>
</html>
