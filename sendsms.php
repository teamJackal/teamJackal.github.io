<?php include('awssnsconnect.php'); ?>

<?php
   function sendsms($message, $params) {
     $sns = new \Aws\Sns\SnsClient($params);
     $args = array(
          "SenderID" => "TestMessage",
          "SMSType" => "Promotional",
          "Message" => $message,
          "PhoneNumber" => "+1 808 429 0352"
      );

      $result = $sns->publish($args);
   }

   sendsms("hello", $params);
?>
