<section class="vh-100 bg-light pt-5">

  <div class="d-flex justify-content-center my-2">
    <label class="text-danger" id="msg">Error! Wrong Credentials</label>
  </div>

  <div class="container py-4">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="text-center" style="border-radius: 1rem;">

          <h5 class="fw-bold mb-3">Login to your <span class="text-primary">Daydream</span> Account</h5>

          <div class="form-floating mb-3 text-start">
            <input type="text" class="form-control rounded-4" id="email" placeholder="email" value="asd"required>
            <label for="email" class="form-label" ></label>
          </div>

          <div class="form-floating mb-3 text-start" style="position: relative;">
            <input type="password" class="form-control rounded-4"  id="password" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
            <span class="toggle-password mt-1" id="togglePassword"><i class="fa-regular fa-eye"></i></span>
          </div>

          <div class="my-3 d-flex justify-content-between">
            <label>
              <input type="checkbox" name="remember" id="remember"> Remember me

            </label>
            <a href="#" class="text-decoration-none text-secondary">Forgot password?</a>
          </div>

          <button type="button" id="btnSubmit" value="LOGIN" class="btn btn-primary btn-lg m-3 rounded-pill fw-bold w-50 mt-5">Sign in</button>

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
  
</section>
<script src="../src/getToken.js"></script>
<script type="text/javascript">

  $(document).ready(function(){

    $('#btnSubmit').click(function(){
      email=$('#email').val();
      userpass=$('#password').val();
      if(email==""){
        $('#msg').html('Please Enter email');
        return;
      }
      if(userpass==""){
         $('#msg').html('Please Enter Password');
        return;
      }
      
      Login_Account(email,userpass);
    });
  });


function Login_Account(email,password){
  token = "photoreserved";
  var send_data = {'token':token,'email': email,'password': password };
    $.ajax({
      url: "../api/accounts/login.php",
      type: "POST",
      data: send_data , 
      beforeSend: function () {
       // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
      },
      success: function (rs) {
        console.log(rs);
        if (rs.status === true) {
        $('#msg').html(rs.message);

        } else {
            $('#msg').html(rs.message);
        }
      },
      async: true,
      error: function (e) {
        $('#msg').html(rs.message);
      },
      cache: false,
    });
  }
</script>