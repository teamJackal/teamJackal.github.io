<?php

// Import the Postmark Client Class:
require_once('./vendor/autoload.php');
use Postmark\PostmarkClient;

$client = new PostmarkClient("f4b930b8-1b85-4f1a-a781-ca7b3d7cc844");

// Send an email:
$sendResult = $client->sendEmail(
  "sender@example.org",
  "jleong8@hawaii.edu",
  "Hello from Postmark!",
  "This is just a friendly 'hello' from your friends at Postmark."
);

?>
