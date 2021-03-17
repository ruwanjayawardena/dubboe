<?php
require './API/sendgrid/vendor/autoload.php'; 
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("info@dubboe.com", "dubboe.com");
$email->setSubject("Sample Test Email");
$email->addTo("ruwan.jayawardena.freelancer@gmail.com", "Ruwan");
//$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}