<?php include('awssnsconnect.php'); ?>

<?php
   function sendsms($message) {
     $args = array(
          "SenderID" => "TestMessage",
          "SMSType" => "Promotional",
          "Message" => $message,
          "PhoneNumber" => "+1 808 429 0352"
      );

      $result = $sms->publish($args);
   }

   sendsms("hello");
?>
