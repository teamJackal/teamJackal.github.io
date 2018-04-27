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
<?

$myFields = array("Category" => $row['category'],
                  "Sub Category"  => $row['sub_category']);
  echo '<table><tr>';

  foreach($myFields as $field_title => $field_value)
     echo '<td>', $field_title, '</td>
           <td>', $field_value, '</td>';

  echo '</tr></table>';
?>
</div>

</html>
