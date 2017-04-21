<?php
include_once 'dbconn.php';

function dataget($type, $conn){
    if ($stmt = $conn->prepare("SELECT weight
				FROM $type
                WHERE MONTH (recorded) = MONTH (NOW())
                AND YEAR (recorded) = YEAR (NOW())
                ORDER BY recorded DESC")) {
        if($stmt->execute()) {
            $stmt->store_result();
            if ($stmt->num_rows > 0){
                $stmt->bind_result($weight);
                $tweight=0;
                while ($stmt->fetch()) {
                    $tweight = $tweight + $weight;
                }
                $tweight = $tweight/1000;
                $tweight = round($tweight, 2);
                echo "<h2 class='material-measurement'>$tweight <span class='metric'>kg</span></h2>";
            } else {echo "<h3 class='material-error'>No data recorded for this month...yet!</h3>";}
        }
    } else {echo "<h3 class='material-error'>Something broke!</h3>";}
}

function datasend($type, $conn){
    $record = $_POST[$type];
    if ($record > 0) {
		if ($stmt = $conn->prepare("INSERT INTO $type (weight, user_id, recorded)
									VALUES (?, ?, NOW())")) {
			$stmt->bind_param('ii', $record, $_SESSION['user_id']);
			if($stmt->execute()) {
				echo "$record grams of $type was added to the database";
			} else {echo $stmt->error;}
		} else {echo $type;}
	} else {echo "Please enter a value";}
}



function graphget($conn, $type, $month, $year){
    $stmt = $conn->prepare("SELECT weight
            FROM $type
            WHERE MONTH (recorded) = $month
            AND YEAR (recorded) = $year");
    if($stmt->execute()) {
        $stmt->store_result();
        if ($stmt->num_rows > 0){
            $stmt->bind_result($weight);
            $tweight=0;
            while ($stmt->fetch()) {
                $tweight = $tweight + $weight;
            }
            $tweight = $tweight/1000;
            $tweight = round($tweight, 2);
            Return $tweight;
        } else {Return "no data";}
    } else {Return False;}
}


function login($email, $password, $conn) {
    // Using prepared statements means that SQL injection is not possible.
    if ($stmt = $conn->prepare("SELECT id, username, password
        FROM members
       WHERE email = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();

        // get variables from result.
        $stmt->bind_result($user_id, $username, $db_password);
        $stmt->fetch();
        if ($stmt->num_rows == 1) {
            if ($password == $db_password) {
                $user_browser = $_SERVER['HTTP_USER_AGENT'];
                $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                $_SESSION['user_id'] = $user_id;
                $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
                $_SESSION['username'] = $username;
                $_SESSION['login_string'] = hash('sha512', $db_password . $user_browser);
                    // Login successful.
                    return true;
                } else {
                    echo "wrong";
                    return false;
                }
            }
        } else {
            echo"No user exist";
            return false;
        }
}


if(!function_exists('hash_equals')) {
    function hash_equals($known_string, $user_string) {
        $ret = 0;
        if (strlen($known_string) !== strlen($user_string)) {
            $user_string = $known_string;
            $ret = 1;
        }
        $res = $known_string ^ $user_string;

        for ($i = strlen($res) - 1; $i >= 0; --$i) {
            $ret |= ord($res[$i]);
        }
        return !$ret;
    }
}

function login_check($conn) {
    // Check if all session variables are set
    if (isset($_SESSION['user_id'],
                        $_SESSION['username'],
                        $_SESSION['login_string'])) {

        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];

        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];

        if ($stmt = $conn->prepare("SELECT password
                                      FROM members
                                      WHERE id = ? LIMIT 1")) {
            // Bind "$user_id" to parameter.
            $stmt->bind_param('i', $user_id);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);

                if (hash_equals($login_check, $login_string) ){
                    // Logged In!!!!
                    return True;
                } else {
                    // Not logged in
                    return False;
                }
            } else {
                // Not logged in
                return False;
            }
        } else {
            // Not logged in
            return False;
        }
    } else {
        // Not logged in
        return False;
    }
}

function esc_url($url) {

    if ('' == $url) {
        return $url;
    }

    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);

    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;

    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }

    $url = str_replace(';//', '://', $url);

    $url = htmlentities($url);

    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);

    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

?>
