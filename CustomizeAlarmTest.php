<?php include('connect.php'); ?>
<?php

function removeNull($array) {
    if($array[0] != ' '){
        $new_array = array($array[0]);
        foreach(array_slice($array,1) as $element){
            if($element != ''){
                array_push($new_array, $element);
                echo "Done";
            }
        }
        return $new_array;
    }
}

function checkLocType($category){
    $state = TRUE;
    if($category == 'Tsunami' || $category == 'Missile'){
        $state = FALSE;
    }
    return $state;
}

function checkEndType($category){
    if($category == 'Flash Flood'){
        return TRUE;
    }
    return FALSE;
}

function checkTypes($types){
    foreach($types as $type){
        if($type == 'siren'){
            return FALSE;
        }
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

if($needLoc){
echo "<p>Need Location for $category";
}
if($needEnd){
echo "<p>Need End Time for $category";
}
if($needMessage){
echo "<p>Need Message<p>";
}

/*if(isset($_POST['confirmButton'])) {

    $employee_id = $_POST['url_id'];
    $warningMessage = $_POST['warningMessage'];

    $sql = "UPDATE `employee_log` SET `warningMessage` = '".$warningMessage."' WHERE `employee_id` = '".$employee_id."' ORDER BY `lastUpdated` DESC LIMIT 1 ";
    //echo $sql;
    $sel = $pdo->prepare($sql);
    $sel->execute();

    echo "<script type='text/javascript'>  window.location='checklogintest.php?id=".$employee_id."'; </script>";
}*/

if(isset($_POST['back-button-customTest']) || isset($_POST['cancelButton'])) {
  $id = $_POST['url_id'];
  echo "<script type='text/javascript'>  window.location='warningSystemsTest.php?id=$id'; </script>";
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
  <form action="CustomizeAlarmTest.php" method="POST">
  <input type="hidden" name="url_id" value=<?php echo $employee_id ?>>
  <button id="back-button" name="back-button-customTest" type="submit" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> BACK
  </button>
  </form>
</div>

<div id="body" class="container center">
<div class="thumbnail text-center">
<form action="CustomizeAlarmTest.php" method="POST">
<input type="hidden" name="url_id" value=<?php echo $employee_id ?>>

<?php
if($needMessage){
    if($needLoc){
        echo "<div id='messagelocation'>
                  <h3>LOCATION:</h3>
                  <h2>
                      <textarea style='resize: none; border-radius: 5px;' name='location' id='location' rows='1' cols='50'></textarea>
                  </h2>
              </div>";
    }
    if($needEnd){
        echo "<div id='messagelocation'>
                  <h3>END TIME:</h3>
                  <h2>
                      <textarea style='resize: none;' name='endTime' id='endTime' rows='1' cols='50'></textarea>
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
