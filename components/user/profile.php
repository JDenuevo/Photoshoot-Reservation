<script>
  function uploadImage() {
    var inputFile = document.getElementById('image');
    var profileImage = document.getElementById('profileImage');

    // Check if a file is selected
    if (inputFile.files && inputFile.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        profileImage.src = e.target.result; // Update the src attribute of the image
      }

      reader.readAsDataURL(inputFile.files[0]); // Read the selected file as a data URL
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    var editProfileBtn = document.querySelector('.btn-dark.cursor-pointer');
    var inputFile = document.getElementById('image');

    editProfileBtn.addEventListener('click', function() {
      inputFile.click();
    });
  });
</script>
<?php session_start(); ?>
<div class="text-center">
  <hr>
  <input type="text" class="form-control" id="userid" value="<?php echo $_SESSION['userid']; ?>" hidden>
  <h4 class="fw-bold">Account Profile</h4>
  <p class="text-muted">You can change your <span class="text-primary fw-semibold">Daydream</span> Profile here.</p>

  <div class="d-flex align-items-center">
    <div class="me-2">
      <!-- <img id="profileImage" src="../assets/images/person.jpg" class="img-fluid rounded-circle" width="150px"> -->
    </div>

    <div class="">
      <!-- <label for="image" class="btn btn-dark rounded-pill cursor-pointer fw-semibold">Edit Profile</label> -->
      <!-- <input class="btn btn-dark rounded-pill" type="file" name="image" id="image" accept=".jpg, .jpeg, .png" onchange="uploadImage()" required style="display: none;"> -->
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-6">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="firstname">
        <label for="floatingInput">First name</label>
      </div>
    </div>
    <div class="col-6">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="lastname">
        <label for="floatingInput">Last name</label>
      </div>
    </div>
    <div class="col-12">
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="email" disabled>
        <label for="floatingInput">Email</label>
      </div>
    </div>

  </div>

  <button class="btn btn-primary btn-lg rounded-pill fw-semibold mt-5 w-50" type="button" id="saveBtn" >Save Changes</button>


</div>
<script src="../src/jquery/userProfile.js"></script>