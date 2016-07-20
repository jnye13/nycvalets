<?php

// configure
$from = 'contact@qa.com';
$sendTo = 'josh@smrtsystems.com';
$subject = 'New NYC Valets Apartment Sitting Request';
$fields = array('building_name'=> 'Building Name', 'af-date-start' => 'Start Date', 'af-date-end' => 'End Date', 'af_name' => 'First Name', 'af_lastname' => 'Last Name', 'af_apt_num' => 'Apartment #', 'af_phone' => 'Phone', 'af_email' => 'Email', 'af_signature' => 'Signed Waiver', 'af_message' => 'Instructions'); // array variable name => Text to appear in email
$okMessage = 'Contact form successfully submitted. Thank you, we will get back to you soon!';
$errorMessage = 'There was an error while submitting the form. Please try again later';

// let's do the sending

try
{
    $emailText = "You have Apartment Sitting Request.\n=============================\n";

    foreach ($_POST as $key => $value) {

        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    mail($sendTo, $subject, $emailText, "From: " . $from);

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
else {
    echo $responseArray['message'];
}
