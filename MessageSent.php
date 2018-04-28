
<!-- <?php include('sendmail.php'); ?> -->

<?php
  include 'sendsms.php';

?>
<?

$employee_id = $_GET['id'];
$sent_value = "1";

$sql = "UPDATE `employee_log` SET `sent` = '".$sent_value."' WHERE `employee_id` = '".$employee_id."' ORDER BY `lastUpdated` ASC LIMIT 1 ";
$sel = $pdo->prepare($sql);
$sel->execute();

?>
