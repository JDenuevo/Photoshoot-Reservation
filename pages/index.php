<?php

// Include the database connection file
include('../inc/config.php');

// Start session
session_start();

// Include the Google API client library
require_once '../vendor/autoload.php';

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
        echo "Error: " . $token['error_description'];
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


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Daydream Studios PH</title>
<link href="../assets/images/logo.png" rel="icon">

<!-- Tabler Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


<!-- Main Template CSS Files -->
<link href="../assets/css/bootstrap.css" rel="stylesheet">
<link href="../assets/css/main.css" rel="stylesheet">

<!-- Vendor JS Files -->
<script type="text/javascript" src="../assets/js/jquery-3.7.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.js"></script>

<style>
  #preloader {
    display: none; /* Hide the preloader by default */
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999; /* Ensure it's on top of other content */
  }
</style>

</head>

<body>

<!-- Navbar Start -->
<div class="px-5 custom-nav">
  <nav class="navbar navbar-expand-lg p-0 justify-content-between" id="navbar">
    <a onclick="dispContent('home_content')" class="navbar-brand fw-bold text-white">
      <img src="../assets/images/logo.png" class="img-fluid w-50">
    </a>
    <!-- Mobile Toggle Button -->
    <button type="button" class="navbar-toggler bg-light my-2" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Mobile Menu -->
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav d-flex justify-content-end flex-fill">
        <a type="button" class="fs-6 fw-semibold nav-link" id="home_label" onclick="dispContent('home_content')">Home</a>
        <a type="button" class="fs-6 fw-semibold nav-link" id="packages_label" onclick="dispContent('packages')">Packages</a>
        <a type="button" class="fs-6 fw-semibold nav-link" id="ratings_label" onclick="dispContent('ratings')">Ratings</a>
        <a type="button" class="fs-6 fw-semibold nav-link" id="location_label" onclick="dispContent('location')">Location</a>
        <a type="button" class="fs-6 fw-semibold nav-link" id="login_label" onclick="dispContent('login')">Sign in</a>
      </div>
    </div>
  </nav>
</div>

<div class="custom-body vh-100" id="content">
  <!-- Initial content loaded from home_content.php -->
  <?php include('../components/public/home_content.php');?>
</div>

<div class="text-center" id="content">
  <?php include('footer.php');?>
</div>

<!-- Preloader -->
<div class="text-center" id="preloader">
  <img src="../assets/images/preloader.gif" />
</div>

<!-- JavaScript for AJAX -->
<script type="text/javascript">
  function dispContent(page) {
    var send_data = {};
    page += ".php";
    $.ajax({
      url: "../components/public/" + page, // Path to PHP file
      type: "POST",
      data: send_data,
      beforeSend: function () {
      
          $('#preloader').show(); // Show preloader
      },
      success: function (rs) {
        console.log(rs); // Log response to console for debugging
        $('#content').html(rs); // Update content with response
        $('#preloader').hide(); // Hide preloader
      },
      error: function (e) {
        console.log(e); // Log any errors to console
      },
      cache: false,
    });
  }
</script>


</body>
</html>
