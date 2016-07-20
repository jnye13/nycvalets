<?php

// configure
$from = 'contact@qa.com';
$sendTo = 'josh@smrtsystems.com';
$subject = 'New NYC Valets Pet Service Request';
$fields = array('building_name'=> 'Building Name', 'psf-date-select' => 'Date', 'psf_name' => 'First Name', 'psf_lastname' => 'Last Name', 'psf_apt_num' => 'Apartment #', 'psf_phone' => 'Phone', 'psf_email' => 'Email', 'psf_signature' => 'Signed Waiver', 'psf_message' => 'Instructions'); // array variable name => Text to appear in email
$okMessage = 'Contact form successfully submitted. Thank you, we will get back to you soon!';
$errorMessage = 'There was an error while submitting the form. Please try again later';

// let's do the sending

try
{
    $emailText = "You have a new Pet Service Request.\n=============================\n";

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
