<?php include('sendmail.php'); ?>

<?php
  include 'sendsms.php';

  echo sendsms("hello from messageSent", $params);

?>
