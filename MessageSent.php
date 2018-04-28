<?php include('connect.php'); ?>
<?php include('sendmail.php'); ?>
<?php include('sendsms.php'); ?>
<?php include('awssnsconnect.php'); ?>

<?php

$employee_id = $_GET['id'];
$sent_value = "1";

$sql = "SELECT warningMessage FROM 414jackal.employee_log ORDER BY `lastUpdated` DESC LIMIT 1";
$sel = $pdo->prepare($sql);
$sel->execute();
$result = $sel->fetchAll();
$result = $result[0];
$output = $result['warningMessage'];

sendmail($mail, 'Warning from teamJackal', 'Test Warn', $output, 'herm8888@hawaii.edu');
sendsms($output, $params);

$sql = "UPDATE `employee_log` SET `sent` = 1 WHERE `employee_id` = '".$employee_id."' ORDER BY `lastUpdated` DESC LIMIT 1 ";
$sel = $pdo->prepare($sql);
$sel->execute();
echo "<script type='text/javascript'>  window.location='index.html'; </script>";

?>
