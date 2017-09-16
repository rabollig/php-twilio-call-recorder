<?php
require "bootstrap.php";

session_regenerate_id(); // Create a new session for this call


// If caller not on authorized list... abort
if (!in_array($_POST['Caller'], $authorizedCallerID)) {
    say('Sorry.  You are not on the guest list.');
    exit();
}
$_SESSION['authorized'] = true;
$_SESSION['caller']     = $_POST['Caller'];


$response = <<<HEREDOC
<?xml version="1.0" encoding="UTF-8"?>
<Response>
    <Gather timeout="15" action="start_call.php" method="post" numDigits="10">
        <Say>Enter the number you wish to call.</Say>
    </Gather>
</Response>


HEREDOC;

echo trim($response);

$data = json_encode($_POST, JSON_PRETTY_PRINT);

file_put_contents('/tmp/twilio.txt', $data);



function say($prompt) {

    $response = <<<HEREDOC
<?xml version="1.0" encoding="UTF-8"?>
    <Response>
    <Say>
    {$prompt}
    </Say>
    </Response>
HEREDOC;


    echo $response."\n";

}