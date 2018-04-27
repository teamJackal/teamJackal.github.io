<?php include('connect.php'); ?>

<style>

  table {
    border-collapse: collapse;
    border-style: solid;
    border-top-color: black;
    border-top-width: 3px;
    width: 75%;
    font-family: "Franklin ITC", sans-serif;
    font-weight: Bold;
    font-size: 14px;
    line-height: 22px;
    padding: 40px;
  }
  #tablecontainer {
    margin-top: 50px;
  }
</style>

<?php

$employee_id = $_GET['id'];

$sql = "SELECT * FROM `employee_log` WHERE `employee_id` = '".$employee_id."' AND `lastUpdated` < (NOW() - INTERVAL 30 MINUTE) AND `sent` = 1";
//echo $sql;
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

<div class="container-fluid" name="tablecontainer">
	<div id="live_data"></div>
	<?php
	echo
	"<table border='0' cellpadding='0' cellspacing='0' line-height='22 px' align='center'>
	<tr>
		<th class='category'>Category</th>
		<th class='sub_category'>Sub Category</th>
		<th class='warningType'>Warning Type</th>
		<th class='environmentType'>Environment Type</th>
    <th class='warningMessage'>Warning Message</th>
		<th class='delete'>Delete</th>
	</tr>"
	;
	foreach($result as $row) {
		echo "<tr>";
		echo "<td id='building'><a href='update.php?id=".$row['id']."&name=".$row['building']."'>" . $row['building'] . "</a></td>";
		echo "<td class='floor' onBlur=\"saveToDatabase(this,'floor', $row_id)\" contenteditable='true'>" . $row['floor'] . "</td>";
		echo "<td class='lastCheck'>" . $row['lastCheck'] . "</td>";
		echo "<td class='notes' onBlur=\"saveToDatabase(this,'notes', $row_id)\" contenteditable='true'>" . $row['notes'] . "</td>";
		echo "<td class='alnright'><a href='delete.php?id=".$row['id']."&name=".$row['building']."'>" . "x" . "</a></td>";
		echo "</tr>";
	}
	?>
</div>

</html>
