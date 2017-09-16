<?php
require_once "vendor/autoload.php";

session_start();


// Make sure we have a config.php, otherwise, give an error

if(!file_exists('config.php')) {
    $response = <<<HEREDOC
    <?xml version="1.0" encoding="UTF-8"?>
    <Response>
      <Say>You are missing the config dot p h p file.
      Copy the template and adjust the settings, then try your call again
      </Say>
    </Response>
HEREDOC;

    error_log('config.php file missing.  Copy config-template.php to config.php and adjust as needed.');
    exit();

}


require "config.php";
