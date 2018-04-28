<?php include('connect.php'); ?>
<?php include('sendmail.php'); ?>
<?php include('sendsms.php'); ?>
<?php include('awssnsconnect.php'); ?>

<?php

$column_id = $_GET['id'];
$unsent = "2";
$username = $_POST['username'];
$password = $_POST['password'];
$an_id = $_POST['url_id'];

$sql = "SELECT * FROM login_test WHERE username = '".$username."' AND password = '".$password."' LIMIT 1";

$sel = $pdo->prepare($sql);
$sel->execute();
$result = $sel->fetchAll();

if($result) {

  $sql = "UPDATE `employee_log` SET `sent` = '".$unsent."' WHERE `id` = '".$an_id."' LIMIT 1 ";
  echo $sql;
  $sel = $pdo->prepare($sql);
  $sel->execute();
  //sendmail($mail, 'FALSE ALARM', 'False Alarm', 'The last warning, was a false alarm. Please disregard the previous warning.' , 'herm8888@hawaii.edu');
  //sendsms('The last warning, was a false alarm. Please disregard the previous warning.', $params);
  //echo "<script type='text/javascript'>  window.location='index.html'; </script>";
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
<div id="body" class="container center">
  <div class="thumbnail text-center">
    <form action="delete.php" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="email" id="username" name="username" class="form-control" placeholder="Enter email">
      </div>
      <div class="form-group">
       <label for="exampleInputPassword1">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
      </div>
      <input type="hidden" name="url_id" value=<?php echo $column_id ?>>
      <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Login</button>
      <!--This button below will be temporary>-->
      <!--<button type="button" onclick="window.location.href='MainCategoryTest.html'" class="btn btn-primary">Login</button>-->
    </form>
  </div>
</div>

</body>
</html>
