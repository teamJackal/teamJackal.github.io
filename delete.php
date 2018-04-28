<?php include('connect.php'); ?>
<?php

$column_id = $_GET['id'];
$unsent = '2';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM login_test WHERE username = '".$username."' AND password = '".$password."' LIMIT 1";

$sel = $pdo->prepare($sql);
$sel->execute();
$result = $sel->fetchAll();

if($result) {
  $sql = "UPDATE `employee_log` SET `sent` = '".$unsent."' WHERE `id` = '".$column_id."' LIMIT 1 ";
  $sel = $pdo->prepare($sql);
  $sel->execute();
  echo "<script type='text/javascript'>  window.location='index.html'; </script>";
}
?>

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
      <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Login</button>
      <!--This button below will be temporary>-->
      <!--<button type="button" onclick="window.location.href='MainCategoryTest.html'" class="btn btn-primary">Login</button>-->
    </form>
  </div>
</div>
