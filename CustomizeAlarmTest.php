<?php include('connect.php'); ?>
<?php
$employee_id = $_GET['id'];

$sql = "SELECT sub_category, warningType FROM 414jackal.employee_log ORDER BY `lastUpdated` DESC LIMIT 1";
$sel = $pdo->prepare($sql);
$sel->execute();
$result = $sel->fetchAll();
$result = $result[0];
$category = $result['sub_category'];

$types = explode(',', $result['warningType'])
foreach($type in $types) {
    echo $type;
}


if(isset($_POST['confirmButton'])) {
    
    $employee_id = $_POST['url_id'];
    $warningMessage = $_POST['warningMessage'];
    
    $sql = "UPDATE `employee_log` SET `warningMessage` = '".$warningMessage."' WHERE `employee_id` = '".$employee_id."' ORDER BY `lastUpdated` DESC LIMIT 1 ";
    //echo $sql;
    $sel = $pdo->prepare($sql);
    $sel->execute();

    echo "<script type='text/javascript'>  window.location='checklogintest.php?id=".$employee_id."'; </script>";
}

if(isset($_POST['back-button'])) {
  $employee_id = $_POST['url_id'];
  echo "<script type='text/javascript'>  window.location='MainCategoryTest.php?id=$employee_id'; </script>";
}

?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ALERT SYSTEM</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheets/warningSystems.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body style="background: #95C19B;">

<div id="header" style="background-color: #233C15 !important;" class="container-fluid">
  <div class="container-fluid text-center">
    <img class="img-responsive fluid" src="images/Header.png">
    <div id="header-text">HAWAII EMERGENCY ALERT SYSTEM</div>
  </div>
  <form action="warningSystemsReal.php" method="POST">
  <input type="hidden" name="url_id" value=<?php echo $employee_id ?>>
  <button id="back-button" onclick="window.location.href='MainCategoryTest.php'" type="button" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> BACK
  </button>
  </form>
</div>

</body>
</html>