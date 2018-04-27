<?php
   include "./awssesconnect.php";

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

   $mail = new PHPMailer();
   sendmail($mail, 'Warning Test', 'Test', 'Test Message', $_POST["email"]);
?>

<html>
   <form action="sendmail.php" method="post">
      E-mail: <input type="text" name="email"><br>
      <input type="submit">
   </form>
</html>
