<?php include('connect.php'); ?>

<?php

if(isset($_POST['Submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login_test WHERE username = '".$username."' AND password = '".$password."' LIMIT 1";

    $sel = $pdo->prepare($sql);
    $sel->execute();
    //$result = $sel->fetchAll();
    while($res = $sel->fetch(PDO::FETCH_ASSOC)){
        $id = $res['employee_id'];
        //echo "<script type='text/javascript'>  window.location='MainCategoryTest.php?id=".$id."'; </script>";
        $sql2 = "DELETE FROM `employee_log` WHERE `category` is NULL OR `sub_category` is NULL or `warningType` is NULL or `environmentType` is NULL or `warningMessage` is NULL or `lastUpdated` is NULL or `employee_id` is NULL or `sent` = 0";
        $sel2 = $pdo->prepare($sql2);
        $sel2->execute();

        $sql3 = "INSERT INTO `employee_log` (`employee_id`) VALUES ('".$id."')";
        $sel3 = $pdo->prepare($sql3);
        $sel3->execute();
        echo "<script type='text/javascript'>  window.location='MainCategoryTest.php?id=".$id."'; </script>";
    }

    //$sql2 = "DELETE FROM `employee_log` WHERE `category` is NULL OR `sub_category` is NULL or `warningType` is NULL or `environmentType` is NULL or `warningMessage` is NULL or `lastUpdated` is NULL or `employee_id` is NULL or `sent` = 0";
    //$sel2 = $pdo->prepare($sql2);
    //$sel2->execute();
    //echo "<script type='text/javascript'>  window.location='MainCategoryTest.php?id=".$id."'; </script>";
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

<div class="container">
  <h1 class="text-center">Test System Login</h1>
</div>

<div id="body" class="container center">
  <div class="thumbnail text-center">
    <form action="login-test.php" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="email" id="username" name="username" class="form-control" placeholder="Enter email">
      </div>
      <div class="form-group">
       <label for="exampleInputPassword1">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
      </div>
      <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Login</button>
      <!--This button below will be temporary>-->
      <!--<button type="button" onclick="window.location.href='MainCategoryTest.html'" class="btn btn-primary">Login</button>-->
    </form>
  </div>
</div>

</body>
</html>
