
<?php include('sendmail.php'); ?>

<?php
  include 'sendsms.php';

  echo sendsms("hello from messageSentsss", $params);

?>
