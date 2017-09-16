<?php
require "bootstrap.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Sanitize inputs for use in the email response
$recordingURL = htmlentities($_POST['RecordingUrl']);
$caller       = htmlentities($_SESSION['caller']);
$destination  = htmlentities($_SESSION['destination']);
$datetime     = date("Y-m-d H:i:s");


// Create email body
$message = <<<HEREDOC
You recorded a call from {$caller} to {$destination} at {$datetime}

The URL to the recording is:
{$recordingURL}.mp3

HEREDOC;


// Send email
try {
    $mail = new PHPMailer(true);
    $mail->setFrom($email, 'Twilio Call Recorder');
    $mail->addAddress($email, $emailName);
    $mail->isHTML(false);                                  // Set email format to HTML
    $mail->Subject = 'Your call recording';
    $mail->Body    = $message;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
} catch (\Exception $e) {

    error_log($e->getMessage());

    $response = <<<HEREDOC
<?xml version="1.0" encoding="UTF-8"?>
<Response>
        <Say>
        An exception occurred when trying to send you email.
        Check your Twilio account for your recording.
        </Say>
</Response>

HEREDOC;
    echo $response;
}
