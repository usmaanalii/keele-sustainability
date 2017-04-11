<?php
include_once 'includes/dbconn.php';
include_once 'includes/functions.php';
session_start();

if (isset($_GET['type']) && !isset($_GET['year'])) {
$type = $_GET['type'];
	if ($stmt = $conn->prepare("SELECT log_id, weight, recorded, username
								FROM $type, members
								WHERE $type.user_id = members.id
								ORDER BY recorded
								LIMIT 25")) {
		if($stmt->execute()) {
			$stmt->store_result();
			if ($stmt->num_rows > 0){
				$stmt->bind_result($lid, $weight, $rdate, $uid);
				echo "<table id='{$type}tab'><tr><td><button>Prev 25</button></td><td><button>Next 25</button></td><td><button class='yearly'>Yearly View</button></td></tr>
						<tr><th>LogNum</th><th>Weight(kg)</th><th>date</th><th>User</th></tr>";
				while ($stmt->fetch()) {
                    $nweight = $weight/1000;
                    $nweight = round($nweight, 2);
					echo "<tr id='row{$lid}'><td>$lid</td><td class='recweight'>$nweight</td><td>$rdate</td><td>$uid</td><td><button class='recedit' value='$lid'>Edit</button></td></tr>";
				}
				echo "</table><div id='edithere'></div>";
			}
		}
	}
}

if (isset($_GET['type'], $_GET['year'])) {
	$type = $_GET['type'];
	$year = $_GET['year'];
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
	echo "<table id='{$type}tab'><td><button id='monthly'>Record View</button></td></tr>
	<tr><th>Month</th><th>Weight</th></tr>";
	foreach($prevmonths as $prevmonth){
		$prevdate = date('m', strtotime($prevmonth));
		$b = graphget($conn, $type, $prevdate, $prevyear);
		if ($b != "no data"){
			echo "<tr><td>$prevmonth</td><td>$b</td></tr>";
		} else {echo "<tr><td>$prevmonth</td><td>0</td></tr>";}
	}
	foreach($months as $month){
		$date = date('m', strtotime($month));
		$a = graphget($conn, $type, $date, $year);
		if ($a != "no data"){
			echo "<tr><td>$month</td><td>$a</td></tr>";
		} else {echo "<tr><td>$month</td><td>0</td></tr>";}
	}
}

if (isset($_POST['rep'], $_POST['id'], $_POST['rectype'])) {
	$value = $_POST['rep'];
	$id = $_POST['id'];
	$type = $_POST['rectype'];
	if ($stmt = $conn->prepare("UPDATE $type
								SET weight = ?, user_id =?
								WHERE log_id = ?")) {
		$stmt->bind_param('iii', $value, $_SESSION['user_id'], $id);
		if ( $stmt->execute()) {
			echo "success";
		} else {
			echo $stmt->error;
		}
	} else {
		var_dump($stmt->error);
	}
}

?>
