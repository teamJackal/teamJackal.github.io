<?php include('connect.php'); ?>

<?php

$employee_id = $_GET['id'];

if(isset($_POST['back-button'])) {
    $employee_id = $_POST['url_id'];
    echo "<script type='text/javascript'>  window.location='MainCategoryTest.php?id=$employee_id'; </script>";
}

if(isset($_POST['submit'])) {

    $employee_id = $_POST['url_id'];

    $warning_type = $_POST['submit'];

    $sql = "UPDATE `employee_log` SET `sub_category` = '".$warning_type."' WHERE `employee_id` = '".$employee_id."' ORDER BY `lastUpdated` DESC LIMIT 1 ";
    //echo $sql;
    $sel = $pdo->prepare($sql);
    $sel->execute();
    echo "<script type='text/javascript'>  window.location='warningSystemsTest.php?id=".$employee_id."'; </script>";
}

?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ALERT SYSTEM</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheets/subCategory.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body style="background: #95C19B;">

<div id="header" style="background-color: #233C15 !important;" class="container-fluid">
  <div class="container-fluid text-center">
    <img class="img-responsive fluid" src="images/Header.png">
    <div id="header-text">HAWAII EMERGENCY ALERT SYSTEM</div>
  </div>
  <form action="subCategoryTestNd.php" method="POST">
      <input type="hidden" name="url_id" value=<?php echo $employee_id ?>>
    <button id="back-button" name="back-button" type="submit" class="btn btn-default btn-lg">
      <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> BACK
    </button>
  </form>
</div>


<div id="body" style="margin-bottom: -5%;" class="container-fluid">
  <div class="container">
    <h1 class="text-center">TEST SYSTEM-Natural Disaster</h1>
    <p class="text-center"> Select a sub-category</p>
  </div>
  <div>
  <form action="subCategoryTestNd.php" method="POST">
      <input type="hidden" name="action" value="submit" />
      <input type="hidden" name="url_id" value=<?php echo $employee_id ?>>
      <button id="tsunamiButton" type="submit" name="submit" value="Tsunami" class="btn btn-block btn-info">Tsunami</button>
      <button id="tornadoButton" type="submit" name="submit" value="Tornado" class="btn btn-block btn-info">Hurricane</button>
      <button id="flashFloodButton" type="submit" name="submit" value="Flash Flood" class="btn btn-block btn-info ">Flash Flood</button>
      <button id="wildfireButton" type="submit" name="submit" value="Wildfire" class="btn btn-info btn-block">Wildfire</button>
  </form>
  </div>
</div>


</body>
</html>
