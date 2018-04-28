<?php
    //ini_set('display_errors', 'On');
    //error_reporting(E_ALL);
    include('connect.php');
    include('warningMessage.php');
?>

<?php

function removeNull($array) {
    if($array[0] != ' '){
        $new_array = array($array[0]);
        foreach(array_slice($array,1) as $element){
            if($element != ' '){
                array_push($new_array, $element);
                echo "Done";
            }
        }
        return $new_array;
    }
    return array();
}

function checkLocType($category){
    $state = TRUE;
    if($category == 'Tsunami' || $category == 'Missile'){
        $state = FALSE;
    }
    return $state;
}

function checkArrivalType($category){
    if($category == 'Tsunami'){
        return TRUE;
    }
    return FALSE;
}

function checkEndType($category){
    if($category == 'Flash Flood'){
        return TRUE;
    }
    return FALSE;
}

function checkTypes($types){
    if(count($types) == 1){
        if($types[0] == 'warningSirens'){
            return FALSE;
        }
    }
    if(count($types) == 0){
        echo "<script type='text/javascript'>  window.location='warningSystemsReal.php?id=$id'; </script>";
    }
    return TRUE;
}

$employee_id = $_GET['id'];

$sql = "SELECT sub_category, warningType FROM 414jackal.employee_log ORDER BY `lastUpdated` DESC LIMIT 1";
$sel = $pdo->prepare($sql);
$sel->execute();
$result = $sel->fetchAll();
$result = $result[0];
$category = $result['sub_category'];

$types = explode(',', $result['warningType']);
$types = removeNull($types);

$needLoc = checkLocType($category);
$needEnd = checkEndType($category);
$needMessage = checkTypes($types);
$needArrival = checkArrivalType($category);

/*if($needLoc){
echo "<p>Need Location for $category";
}
if($needEnd){
echo "<p>Need End Time for $category";
}
if($needMessage){
echo "<p>Need Message<p>";
}*/

if(!$needMessage){
    if($category == 'tsunami'){
        $warningMessage = 1;
    } else {
        $warningMessage = 2;
    }
    $sql = "UPDATE `employee_log` SET `warningMessage` = '".$warningMessage."' WHERE `employee_id` = '".$employee_id."' ORDER BY `lastUpdated` DESC LIMIT 1 ";
    //echo $sql;
    $sel = $pdo->prepare($sql);
    $sel->execute();
    echo $warningMessage;
    echo "<script type='text/javascript'>  window.location='checkloginreal.php?id=".$employee_id."'; </script>";
}

if(isset($_POST['confirmButton'])) {

    $employee_id = $_POST['url_id'];
    $category = $_POST['category'];
    $location = $_POST['location'];
    $arrivalTime = $_POST['arrivalTime'];
    $endTime = $_POST['endTime'];
    $customMessage = $_POST['customMessage'];

    $warningMessage =  getMessage($category, $location, $arrivalTime, $endTime, $customMessage);

    $sql = "UPDATE `employee_log` SET `warningMessage` = '".$warningMessage."' WHERE `employee_id` = '".$employee_id."' ORDER BY `lastUpdated` DESC LIMIT 1 ";
    //echo $sql;
    $sel = $pdo->prepare($sql);
    $sel->execute();
    echo $warningMessage;
    echo "<script type='text/javascript'>  window.location='checkloginreal.php?id=".$employee_id."'; </script>";
}

if(isset($_POST['back-button-customTest']) || isset($_POST['cancelButton'])) {
  $id = $_POST['url_id'];
  echo "<script type='text/javascript'>  window.location='warningSystemsReal.php?id=$id'; </script>";
}

?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ALERT SYSTEM</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheets/alarmCustom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body style="background: #EAABAB;">

<div id="header" style="background-color: #C6401B !important;" class="container-fluid">
  <div class="container-fluid text-center">
    <img class="img-responsive fluid" src="images/HeaderBad.png">
    <div id="header-text">HAWAII EMERGENCY ALERT SYSTEM</div>
  </div>
  <form action="CustomizeAlarmReal.php" method="POST">
  <input type="hidden" name="url_id" value=<?php echo $employee_id ?>>
  <button id="back-button" name="back-button-customTest" type="submit" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> BACK
  </button>
  </form>
</div>

<div id="body" class="container center">
<div class="thumbnail text-center">
<form action="CustomizeAlarmReal.php" method="POST">
<input type="hidden" name="url_id" value=<?php echo $employee_id ?>>
<input type="hidden" name="category" value=<?php echo $category ?>>

<?php
if($needMessage){
    if($needLoc){
        echo "<div id='messageLocation'>
                  <h3>LOCATION:</h3>
                  <h2>
                      <textarea name='location' id='location' rows='1' cols='50' placeholder='Location'></textarea>
                  </h2>
              </div>";
    }
    if($needArrival){
        echo "<div id='messageArrival'>
                  <h3>ARRIVAL TIME IN HOURS(S):</h3>
                  <h2>
                      <textarea name='arrivalTime' id='arrivalTime' rows='1' cols='50' placeholder='Time Until Arrival'></textarea>
                  </h2>
              </div>";
    }
    if($needEnd){
        echo "<div id='messageEnd'>
                  <h3>END TIME:</h3>
                  <h2>
                      <textarea name='endTime' id='endTime' rows='1' cols='50' placeholder='End Time'></textarea>
                  </h2>
              </div>";
    }
    if($category == 'Amber Alert'){
        echo "<div id='messageEnd'>
                  <h3>CUSTOM MESSAGE:</h3>
                  <h2>
                      <textarea name='customMessage' id='customMessage' rows='1' cols='50' placeholder='Message'></textarea>
                  </h2>
              </div>";
    }
    echo "<div class='container text-center'>
              <button id='confirmButton' name='confirmButton' type='submit' class='btn btn-default'>Confirm</button>
              <button id='cancelButton' name='cancelButton' type='submit' class='btn btn-default'>Cancel</button>
          </div>";
}
?>

</form>
</div>
</div>
</body>
</html>
