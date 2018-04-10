<?php
   include "./awssesconnect.php";

   use PHPMailer\PHPMailer\PHPMailer;                                                                                      use PHPMailer\PHPMailer\Exception;                                                                                                                                                                                                             

   $mail = new PHPMailer();
   sendmail($mail, 'Warning Test', 'Test', 'Test Message');
?>
