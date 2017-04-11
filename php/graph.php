<?php
require_once 'includes/dbconn.php';
require_once 'includes/functions.php';

if (isset($_GET['type'])) {
	$type = $_GET['type'];
	if (isset($_GET['y'])) {
		$stmt = $conn->prepare("SELECT DISTINCT YEAR (recorded)
				FROM $type
				WHERE MONTH (recorded) < 09
				ORDER BY YEAR (recorded) DESC");
		$stmt->execute();
				$stmt->store_result();
			if ($stmt->num_rows > 0){
				$stmt->bind_result($years);
				$yeararr =[];
				while ($stmt->fetch()) {
					array_push($yeararr, $years);
			}
		}
		print (json_encode($yeararr));
	}

	if (isset($_GET['i'])) {
		$year = $_GET['i'];
		$prevyear = $year - 1;
		$months = array(
			'January',
			'February',
			'March',
			'April',
			'May',
			'June',
			'July ',
			'August'
		);
		$prevmonths = array(
			'September',
			'October',
			'November',
			'December'
		);
		$data = [];
		foreach($prevmonths as $prevmonth){
			$prevdate = date('m', strtotime($prevmonth));
			$b = graphget($conn, $type, $prevdate, $prevyear);
			if ($b != "no data"){
				array_push($data, $b);
			} else {array_push($data, 0);}
		}
		foreach($months as $month){
			$date = date('m', strtotime($month));
			$a = graphget($conn, $type, $date, $year);
			if ($a != "no data"){
				array_push($data, $a);
			} else {array_push($data, 0);}
		}
		print (json_encode($data));
	}
}
?>
