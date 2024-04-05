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
