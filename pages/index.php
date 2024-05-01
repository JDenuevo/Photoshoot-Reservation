<?php require '../function/login_validation.php';?>

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
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<!-- Main Template CSS Files -->
<link href="../assets/css/swiper-bundle.min.css" rel="stylesheet">
<link href="../assets/css/bootstrap.css" rel="stylesheet">
<link href="../assets/css/main.css" rel="stylesheet">

<!-- Vendor JS Files -->
<script src="../assets/js/swiper-bundle.min.js"></script>
<script src="../assets/js/jquery-3.7.1.min.js"></script> 
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
<div class="custom-body py-4">
  <div class="container">
    <nav class="navbar navbar-expand-lg p-0 justify-content-between" id="navbar">
      <a href="#" onclick="refreshPage()" class="navbar-brand fw-bold text-white">
        <img src="../assets/images/logo.png" class="img-fluid">
      </a>
      <div class="navbar-nav ms-auto">
        <a type="button" class="text-white fs-1" id="login_label" onclick="dispContent('login')"><i class="ti ti-login"></i></a>
      </div>
    </nav>
  </div>
</div>

<div id="content">
  <?php include('../components/public/home_content.php');?>
</div>

<div class="text-center" id="content">
  <?php include('footer.php');?>
</div>

<!-- Preloader -->
<div class="text-center" id="preloader">
  <img src="../assets/images/preloader.gif" />
</div>

<!-- JavaScript for AJAX and Swiper Slider -->
<script type="text/javascript">
  function refreshPage() {
    location.reload();
  }
  
  window.token="asd";
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

  var swiper = new Swiper(".slide-content",{
    slidesPerView: 3,
    spaceBetween: 10,
    loop: true,
    centeredSlides: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
      delay: 2000,
    },
    speed: 800,
    breakpoints:{
      0: {
        slidesPerView: 1,
      },
      640: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 3,
      },
    },
  });
</script>


</body>
</html>
