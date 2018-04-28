<?php include('connect.php'); ?>

<?php
function toTypes($types){
    $output = ' ';
    foreach($types as $type){
        if($type == 'tv'){ $output += 'TV '; }
        if($type == 'textMessage'){ $output += 'SMS '; }
        if($type == 'radio'){ $output += 'RADIO '; }
        if($type == 'warningSirens'{ $output += 'SIRENS'; }
    }
}

$employee_id = $_GET['id'];

$sql = "SELECT * FROM sub_category, warningType, warningMessage WHERE username = '".$username."' AND password = '".$password."' LIMIT 1";
$sel = $pdo->prepare($sql);
$sel->execute();
$outputs = $sel->fetchAll();
$outputs = $outputs[0];
$category = $outputs['sub_category'];
$types = toTypes(explode(',', $outputs['warningType']));
$message = $outputs['warningMessage'];

if(isset($_POST['submit'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $employee_id = $_POST['url_id'];
    
    $sql = "SELECT * FROM login_test WHERE username = '".$username."' AND password = '".$password."' LIMIT 1";
    //echo $sql;
    $sel = $pdo->prepare($sql);
    $sel->execute();
    //echo $result;
    while($res = $sel->fetch(PDO::FETCH_ASSOC)){
        
        $id = $res['employee_id'];
        //change redirect
        echo "<script type='text/javascript'>  window.location='secondloginreal.php?id=".$id."'; </script>";
    }
}

if(isset($_POST['back-button']) || isset($_POST['cancelButton'])) {
  $id = $_POST['url_id'];
  echo "<script type='text/javascript'>  window.location='CustomizeAlarmReal.php?id=$id'; </script>";
}
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
  
<body style="background: #EAABAB;">

<div id="header" class="container-fluid" style="background-color: #C6401B !important;">
  <div class="container-fluid text-center">
    <img class="img-responsive fluid" src="images/HeaderBad.png">
    <div id="header-text">HAWAII EMERGENCY ALERT SYSTEM</div>
  </div>
  <form action="checkloginreal.php" method="POST">
  <input type="hidden" name="url_id" value=<?php echo $employee_id ?>>
  <button id="back-button" name="back-button" type="submit" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> BACK
  </button>
  </form>
</div>

<h1 class="text-center">Message to be sent:</h1>

<div id="message" class="container center">
  <div class="thumbnail text-center">
  <?php
    echo "<h1>TEST MESSAGE FOR $category</h1>";
    echo "<h2>USING $types</h2>";
    echo "<h2>$message</h2>";
  ?>
  </div>
</div>

<div id="body" class="container center">
  <div class="thumbnail text-center">
    <form action="checkloginreal.php" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="email" id="username" name="username" class="form-control" placeholder="Enter email">
      </div>
      <div class="form-group">
          <input type="hidden" name="url_id" value=<?php echo $employee_id ?>>	
       <label for="exampleInputPassword1">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
      </div>
      <!--<button type="submit" class="btn btn-primary">Login</button>-->
      <!--This button below will be temporary>-->
      <button type="submit" name="cancelButton" class="btn btn-primary">Cancel</button>
      <button type="submit" name="submit" id="submit" style="display: inline-block;" class="btn btn-primary">Confirm</button>
    </form>
  </div>
</div>

</body>
</html>
