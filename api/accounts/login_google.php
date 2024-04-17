<?php

// Include the database connection file
include('../../inc/config.php');

// Start session
session_start();

// Include the Google API client library
require_once '../../vendor/autoload.php';

// Initialize the Google client
$client = new Google_Client();
$client->setClientId('1005147137971-i84gpnju98tb1ma3lqhk2k65qk8joknh.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/Photoshoot-Reservation/pages/');
$client->addScope('email');

// Check if code parameter is present (callback from Google)
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    // Verify the token
    if (!isset($token['error'])) {
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        // Get user's email and other info
        $email = $google_account_info->email;
        $fullname = $google_account_info->name;

        // Insert into database
        // Assuming you have a function to insert data into the database
        insertIntoAccounts($email, $fullname);
    } else {
        // Handle error
        // echo "Error: " . $token['error_description'];
    }
}

function insertIntoAccounts($email, $fullname) {
    global $conn; // Assuming $conn is your database connection object

    // Escape variables for security
    $email = mysqli_real_escape_string($conn, $email);
    $fullname = mysqli_real_escape_string($conn, $fullname);

    // Prepare the SQL query
    $sql = "INSERT INTO accounts (Email, FirstName) VALUES ('$email', '$fullname')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Insert successful
        echo "New record created successfully";
    } else {
        // Insert failed
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
