<?php include('connect.php'); ?>

<?php

$employee_id = $_GET['id'];

if(isset($_POST['action'])) {
    $category = $_POST['submit'];
    $employee_id = $_POST['url_id'];
    $environment_type = '0';

  //  $sql = "INSERT INTO `employee_log` (`category`, `employee_id`, `environmentType`) VALUES ('".$category."', '".$employee_id."', '".$environment_type."')";

    $sql = "UPDATE `employee_log` SET `category` = '".$category."', `environment_type` = '".$environment_type."' WHERE `employee_id` = '".$employee_id."' ORDER BY `lastUpdated` ASC LIMIT 1 ";
    //echo $sql;
    $sel = $pdo->prepare($sql);
    $sel->execute();
    if($category == "Natural Disaster") {
        echo "<script type='text/javascript'>  window.location='subCategoryTestNd.php?id=".$employee_id."'; </script>";
    } else {
        echo "<script type='text/javascript'>  window.location='subCategoryTestMm.php?id=".$employee_id."'; </script>";
    }

}

?>
<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ALERT SYSTEM</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="stylesheets/MainCategory.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body style="background: #95C19B;">

<div id="header" style="background-color: #233C15 !important;" class="container-fluid">
  <div class="container-fluid text-center">
    <img class="img-responsive fluid" src="images/Header.png">
    <div id="header-text">HAWAII EMERGENCY ALERT SYSTEM</div>
  </div>
  <button id="back-button" onclick="window.location.href='index.html'" type="button" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> BACK
  </button>
</div>

<div id="body" style="margin-bottom: -5%;" class="container-fluid">
  <div class="container">
    <h1 class="text-center">Test System</h1>
    <p class="text-center">Please select a category</p>
  </div>
  <form action="MainCategoryTest.php" method="POST">
      <input type="hidden" name="action" value="submit" />
      <input type="hidden" name="url_id" value=<?php echo $employee_id ?>>
  <button id="NaturalButton" type="submit" name="submit" value="Natural Disaster" class="btn btn-block btn-info">Natural Disaster</button>
  <button id="ManButton" type="submit" name="submit" value="Man-Made" class="btn btn-danger btn-block">Man-Made Disaster</button>
  </form>
</div>

</body>
</html>
