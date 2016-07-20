<?php

// configure
$from = 'contact@qa.com';
$sendTo = 'josh@smrtsystems.com';
$subject = 'New NYC Valets Upholstery Cleaning Request';
$fields = array('building_name'=> 'Building Name','uf-date-select' => 'Date', 'uf_name' => 'First Name', 'uf_lastname' => 'Last Name', 'uf_apt_num' => 'Apartment #', 'uf_phone' => 'Phone', 'uf_email' => 'Email', 'uf_signature' => 'Signed Waiver', 'uf_message' => 'Comments'); // array variable name => Text to appear in email
$okMessage = 'Contact form successfully submitted. Thank you, we will get back to you soon!';
$errorMessage = 'There was an error while submitting the form. Please try again later';

// let's do the sending

try
{
    $emailText = "You have a new Upholstery Cleaning Request\n=============================\n";

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
