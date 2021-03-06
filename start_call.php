<?php
require "bootstrap.php";

// If not authorized, hang up
if (!$_SESSION['authorized']) {
    exit();
}

// Save the destination for later
$_SESSION['caller']      = $_POST['Caller'];
$_SESSION['destination'] = $_POST['Digits'];

// If callerID not specified in config.  Use caller's callerID
if (strlen($callerId) < 10) {
    $callerId = $_POST['Caller'];
}

$response = <<<HEREDOC
<?xml version="1.0" encoding="UTF-8"?>
<Response>
    <Dial
      record="record-from-answer"
      recordingStatusCallback="end_call.php"
      method="post"
      callerId="{$callerId}"
    >
      {$_POST['Digits']}
    </Dial>
</Response>

HEREDOC;

echo $response;
