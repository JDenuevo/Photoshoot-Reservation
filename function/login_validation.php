<?php
include('../inc/config.php');
session_start();
require_once '../vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('1005147137971-i84gpnju98tb1ma3lqhk2k65qk8joknh.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/Photoshoot-Reservation/pages/');
$client->addScope('email');

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);


    if (!isset($token['error'])) {
      $google_oauth = new Google_Service_Oauth2($client);
      $google_account_info = $google_oauth->userinfo->get();
      $email = $google_account_info->getEmail();
      

      $full_name = $google_account_info->getName();

      $name_parts = explode(" ", $full_name);
      $first_name = $name_parts[0];
      $last_name = end($name_parts);

      if (checkIfEmailExist($email)){
        if(getUserType($email) == 2){
          header('location: admin.php');
        }else{
         header('location: user.php');
        }
       
      }else{
        if(insertFromGoogleAccounts($email, $first_name, $last_name)){
          header('location: user.php');
        }else{
          header('location: index.php');
        }
      }
    } else {
        echo "Error: " . $token['error_description'];
    }
}

function getUserType($email){
    global $conn; 
    $email = mysqli_real_escape_string($conn, $email);
  
    $sql = "SELECT * FROM accounts WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);
  
  
        foreach ($result as $row){
          $usertype = $row['UserType'];
          if($usertype == 2){
            return 2;
          }else{
            return 1;
          }
        }
    
  }
  function checkIfEmailExist($email) {
    global $conn; 
    
    // Prevent SQL Injection
    $email = mysqli_real_escape_string($conn, $email);
  
    $sql = "SELECT * FROM accounts WHERE Email = '$email'";
  
    $result = mysqli_query($conn, $sql);
  
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the result row
        $row = mysqli_fetch_assoc($result);
        
        // Store user ID in session
        $_SESSION['userid'] = $row['ID'];
        
        return true;
    } else {
        return false;
    }
}

  function insertFromGoogleAccounts($email, $fname,$lname) {
    global $conn; // Assuming $conn is your database connection object

    // Escape variables for security
    $email = mysqli_real_escape_string($conn, $email);
    $fname = mysqli_real_escape_string($conn, $fname);
    $lname = mysqli_real_escape_string($conn, $lname);

    $sql = "INSERT INTO accounts (Email, FirstName,LastName) VALUES ('$email', '$fname', '$lname')";

    if (mysqli_query($conn, $sql)) {
      
       return true;
    } else {
      return false;
    }
}
?>