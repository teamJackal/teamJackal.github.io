<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    function sendmail($warningType, $message) {
      $mail = new PHPMailer;

      $mail->isSMTP();

      $mail->setFrom('jleong8@hawaii.edu', 'Warning');
      $mail->addAddress('herm8888@hawaii.edu', 'Herman');

      $mail->Username = 'AKIAJKMXLA2V5ULPPF5Q';
      $mail->Password = 'AhIrRhRPbXGahocLaZ9PrRUqEhZPyaudl8ZITBJsRGSr';
      $mail->Host = 'email-smtp.us-west-2.amazonaws.com';

      $mail->Subject = $warningType;
      $mail->Body = $message;

      $mail->SMTPAuth = true;

      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;
      $mail->isHTML(true);

      if(!$mail->send()) {
          echo "Email not sent. " , $mail->ErrorInfo , PHP_EOL;
      } else {
          echo "Email sent!" , PHP_EOL;
      }
    }
?>
