<?php include('awssnsconnect.php'); ?>

<?php
   function sendsms($message) {
     $args = array(
          "SenderID" => "TestMessage",
          "SMSType" => "Promotional",
          "Message" => $message,
          "PhoneNumber" => "+1 808 393 8206"
      );

      $result = $sns->publish($args);
   }
?>
