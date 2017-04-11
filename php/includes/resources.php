<?php
include_once 'dbconn.php';
include_once 'functions.php';

session_start();

$resource = array("paper", "metal", "compost", "glass", "plastic", "general");

foreach($resource as $res) {
	if (isset($_POST['i'])){
		if ($_POST['i'] == $res) {
			$type = $_POST['i'];
			dataget($type, $conn);
		}
	}
	if (isset($_POST[$res])){
    datasend($res, $conn);
	}
}
?>
