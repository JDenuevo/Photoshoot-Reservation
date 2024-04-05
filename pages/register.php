<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Daydream Studios PH | Register</title>
<link href="../assets/images/logo.png" rel="icon">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<!-- Main Template CSS Files -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/main.css" rel="stylesheet">

<!-- Vendor JS Files -->
<script type="text/javascript" src="../assets/js/jquery-3.7.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.js"></script>

</head>

<body>

<div class="custom-body vh-100" id="content">
  <div class="container py-4">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="text-center" style="border-radius: 1rem;">

          <h5 class="fw-bold mb-3">Login to your <span class="text-primary">Daydream</span> Account</h5>

          <div class="form-floating mb-3 text-start">
            <input type="text" class="form-control rounded-4" id="username" placeholder="Username" required>
            <label for="username" class="form-label">Username</label>
          </div>

          <div class="form-floating mb-3 text-start" style="position: relative;">
            <input type="password" class="form-control rounded-4" id="floatingPassword" id="password" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
            <span class="toggle-password mt-1" id="togglePassword"><i class="fa-regular fa-eye"></i></span>
          </div>

          <div class="my-3 d-flex justify-content-between">
            <label>
              <input type="checkbox" name="remember" id="remember"> Remember me

            </label>
            <a href="#" class="text-decoration-none text-secondary">Forgot password?</a>
          </div>

          <button type="button" id="btnSubmit" value="LOGIN" class="btn btn-primary btn-lg m-3 rounded-pill fw-bold w-50 mt-5">Log In</button>

          <h5 class="text-center">or</h5>

          <div class="d-flex justify-content-center">
            <button type="button" onclick="signIn()" class="btn btn-light btn-lg rounded-pill fw-bold" style="box-shadow: -4px 4px #BEB5B5;">
              <img src="../assets/images/google.png" alt="Google Logo" style="width: 30px; height: 30px; margin-right: 5px; "> Continue with Google
            </button>
          </div>

          <div class="d-flex justify-content-around mt-4">
            <a class="text-decoration-none text-dark">Don't have Account?</a>
            <a class="text-decoration-none text-primary" href="#">Create Account</a>
          </div>

          <br><br>

        </div>
      </div>
    </div>
  </div>
</div>

<div class="text-center" id="content">
  <?php include('footer.php');?>
</div>
  
<!-- JavaScript for AJAX -->
<script type="text/javascript">
  function dispContent(page) {
    var send_data = {};
    page += ".php";
    $.ajax({
      url: "../components/" + page, // Path to PHP file
      type: "POST",
      data: send_data,
      beforeSend: function () {
          $('#content').html('<img src="../assets/images/loading_circle.gif" /> <br/> Loading Page...');
      },
      success: function (rs) {
        console.log(rs); // Log response to console for debugging
        $('#content').html(rs); // Update content with response
      },
      error: function (e) {
        console.log(e); // Log any errors to console
      },
      cache: false,
    });
  }

  function registration(){
    
  }
</script>

</body>
</html>
