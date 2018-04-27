<?php include('connect.php'); ?>

<?php

$employee_id = $_GET['id'];

$sql = "SELECT * FROM `employee_log` WHERE `employee_id` = '".$employee_id."' AND `lastUpdated` < (NOW() - INTERVAL 30 MINUTE) AND `sent` = 1";
echo $sql;
$sel = $pdo->prepare($sql);
$sel->execute();
$result = $sel->fetchAll();

?>

<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ALERT SYSTEM</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="stylesheets/login.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body style="background: #95C19B;">


<div id="header" class="container-fluid" style="background-color: #233C15 !important;">
  <div class="container-fluid text-center">
    <img class="img-responsive fluid" src="images/Header.png">
    <div id="header-text">HAWAII EMERGENCY ALERT SYSTEM</div>
  </div>
  <button id="back-button" onclick="window.location.href='index.html'" type="button" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> BACK
  </button>
</div>

<div class="container-fluid">
	<div id="live_data"></div>
	<?
	echo
	"<table border='0' cellpadding='0' cellspacing='0' line-height='22 px' align='center'>
	<tr>
		<th class='building'>Building</th>
		<th class='floor'>Floor</th>
		<th class='lastCheck'>lastCheck</th>
		<th>Notes</th>
		<th class='delete'>Delete</th>
	</tr>"
	;
	foreach($result as $row) {
		echo "<tr>";
		echo "<td id='building'><a href='update.php?id=".$row['id']."&name=".$row['building']."'>" . $row['building'] . "</a></td>";
		$row_id = $row["id"];
		echo "<td class='floor' onBlur=\"saveToDatabase(this,'floor', $row_id)\" contenteditable='true'>" . $row['floor'] . "</td>";
		echo "<td class='lastCheck'>" . $row['lastCheck'] . "</td>";
		$row_id = $row["id"];
		echo "<td class='notes' onBlur=\"saveToDatabase(this,'notes', $row_id)\" contenteditable='true'>" . $row['notes'] . "</td>";
		echo "<td class='alnright'><a href='delete.php?id=".$row['id']."&name=".$row['building']."'>" . "x" . "</a></td>";
		echo "</tr>";
	}
	?>
</div>

</html>
