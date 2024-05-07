<?php
date_default_timezone_set('Asia/Manila'); 
$currentDate = date('l, F j, Y'); 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Daydream Studios PH | Admin</title>
<link href="../assets/images/logo.png" rel="icon">

<!-- Tabler Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<!-- Main Template CSS Files -->
<link href="../assets/css/bootstrap.css" rel="stylesheet">

<!-- Vendor JS Files -->
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<script src="../assets/js/jquery-3.7.1.min.js"></script> 
<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/navigation.js"></script>
<script src="../assets/js/index.global.js"></script>

<style>
  #preloader {
    display: none; /* Hide the preloader by default */
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999; /* Ensure it's on top of other content */
  }

  .btn-close {
    color: #000; /* Default color */
    transition: color 0.3s ease-in-out, transform 0.3s ease-in-out;
  }

  .btn-close:hover {
    color: #001F3F; /* Color on hover */
    transform: rotate(90deg); /* Rotate on hover */
  }

</style>

</head>

<body>

<?php include '../components/admin/navigation.php'; ?>

<!--  Main wrapper -->
<div class="body-wrapper">

  <!--  Header -->
  <?php include '../components/admin/header.php'; ?>

      <div class="container-fluid">
    
        <div class="vh-100" id="content">
          <!-- Initial content loaded from home_content.php -->
          <?php include('../components/admin/dashboard.php');?>
        </div>
        
        <!-- Preloader -->
        <div class="text-center" id="preloader">
          <img src="../assets/images/preloader.gif" />
        </div>
        
      </div>

  </div>
  <!-- End Header -->
</div>
<!-- End wrapper -->

<!-- JavaScript for AJAX -->
<script type="text/javascript">
  function dispContent(page) {
    var send_data = {};
    page += ".php";
    $.ajax({
      url: "../components/admin/" + page, // Path to PHP file
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