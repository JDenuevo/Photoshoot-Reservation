<style scoped>
  .form-floating {
    position: relative;
  }
  .toggle-password {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
  }
</style>

<section class="vh-100 bg-light pt-2">

  <div class="d-flex justify-content-center">
    <label class="text-success" id="msg">Error! Wrong Credentials</label>
    <label class="text-danger d-none" id="msg">Error! Wrong Credentials</label>
  </div>

  <div class="container py-4">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="text-center" style="border-radius: 1rem;">

          <h5 class="fw-bold mb-3">Register <span class="text-primary">Daydream</span> Account</h5>

          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="firstname" placeholder="Firstname" required>
            <label for="firstname" class="form-label">Firstname</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="lastname" placeholder="Lastname" required>
            <label for="lastname" class="form-label">Lastname</label>
          </div>

          <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-4" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>

          <div class="form-floating mb-3" style="position: relative;">
            <input type="password" class="form-control rounded-4" id="floatingPassword" name="password" placeholder="Password" value="<?php if(isset($_COOKIE['qbtuyqug'])) echo $_COOKIE['qbtuyqug']; ?>" required>
            <label for="floatingPassword">Password</label>
          </div>

          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4" id="confirmPassword" placeholder="Confirm Password" required>
            <label for="confirmPassword">Confirm Password</label>
          </div>

          <button type="button" id="" value="" class="btn btn-primary btn-lg m-3 rounded-pill fw-bold w-50 mt-3">Sign up Account</button>

          <div class="d-flex justify-content-around mt-4">
            <a class="text-decoration-none text-dark">Already have Daydream Account?</a>
            <a type="button" class="text-decoration-none text-primary" id="login_label" onclick="dispContent('login')">Login</a>
          </div>

          <br><br>

        </div>
      </div>
    </div>
  </div>
  
</section>
