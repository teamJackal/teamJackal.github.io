<?php include('connect.php'); ?>
<?php
$employee_id = $_GET['id'];

$sql = "SELECT sub_category FROM 414jackal.employee_log ORDER BY `lastUpdated` DESC LIMIT 1";
$sel = $pdo->prepare($sql);
$sel->execute();
$result = $sel->fetchAll();
$result = $result[0];
$category = $result['sub_category'];

if(isset($_POST['confirmButton'])) {

    $employee_id = $_POST['url_id'];
    $warningSirens = $_POST['var_id'][0];
    $textMessage = $_POST['var_id'][1];
    $radio = $_POST['var_id'][2];
    $tv = $_POST['var_id'][3];

    $warning_types = $warningSirens . "," . $textMessage . "," . $radio . "," . $tv;

    $sql = "UPDATE `employee_log` SET `warningType` = '".$warning_types."' WHERE `employee_id` = '".$employee_id."' ORDER BY `lastUpdated` ASC LIMIT 1 ";
    //echo $sql;
    $sel = $pdo->prepare($sql);
    $sel->execute();

    echo "<script type='text/javascript'>  window.location='CustomizeAlarmTest.php?id=".$employee_id."'; </script>";
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
  <form action="warningSystemsTest.php" method="POST">
  <input type="hidden" name="url_id" value=<?php echo $employee_id ?>>
  <button id="back-button" name="back-button" type="submit" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> BACK
  </button>
  </form>
</div>


<div id="body" style="margin-bottom: -5%;" class="container-fluid">
  <div class="container">
    <h1 class="text-center">TEST SYSTEM</h1>
    <p class="text-center"> Select warning type:</p>
  </div>

  <form action="warningSystemsTest.php" method="POST">
    <input type="hidden" name="url_id" value=<?php echo $employee_id ?>>
  <?php if($category == 'Tsunami' || $category == 'Missile'){
  echo '<button data-toggle="buttons" id="hide" type="button" class="btn btn-block btn-info toggle">';
  echo '<input class="check" type="checkbox" name="var_id[]" autocomplete="off" value="warningSirens">';
  echo '<span><img class="icon glyphicon pull-left" src="images/siren.png"></span>';
  echo 'Warning Sirens';
  echo '</button>';
  } ?>
  <button data-toggle="buttons" type="button" class="btn btn-block btn-info toggle clicked">
    <input class="check" type="checkbox" name="var_id[]" autocomplete="off" value="textMessage">
    <span><img class="icon glyphicon pull-left" src="images/phone.png"></span>
    Text Message
  </button>
  <button data-toggle="buttons" type="button" class="btn btn-block btn-info toggle clicked">
    <input class="check" type="checkbox" name="var_id[]" autocomplete="off" value="radio">
    <span><img class="icon glyphicon pull-left" src="images/radio.png"></span>
    Audio Warning - Radio
  </button>
  <button data-toggle="buttons" type="button" class="btn btn-info btn-block toggle clicked">
    <input class="check" type="checkbox" name="var_id[]" autocomplete="off" value="tv">
    <span><img class="icon glyphicon pull-left" src="images/tv.png"></span>
    Audio & Visual Warning - TV
  </button>

  <div class="container text-center">
    <button id="confirmButton" name="confirmButton" type="submit" class="btn btn-default">Confirm</button>
    <button id="cancelButton" name="cancelButton" onclick="window.location.href='MainCategoryTest.html'" type="submit" class="btn btn-default">Cancel</button>
  </div>
  </form>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script>
         /* $(document).ready(function(){
              $("#message").hide();
              $(".clicked").click(function(){
                $("#message").show();
              });
              $("#hide").click(function(){
                  $("#message").hide();
                });
        });*/


     </script>

</body>
</html>
