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

<div class="text-center">
  <hr>

  <h4 class="fw-bold">Account Profile</h4>
  <p class="text-muted">You can change your <span class="text-primary fw-semibold">Daydream</span> Profile here.</p>

  <div class="d-flex align-items-center">
    <div class="me-2">
      <img id="profileImage" src="../assets/images/baby.jpg" class="img-fluid rounded-circle" width="150px">
    </div>

    <div class="">
      <label for="image" class="btn btn-dark rounded-pill cursor-pointer">Edit Profile</label>
      <input class="btn btn-dark rounded-pill" type="file" name="image" id="image" accept=".jpg, .jpeg, .png" onchange="uploadImage()" required style="display: none;">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-6">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="">
        <label for="floatingInput">First name</label>
      </div>
    </div>
    <div class="col-6">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="">
        <label for="floatingInput">Last name</label>
      </div>
    </div>
    <div class="col-12">
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="">
        <label for="floatingInput">Email</label>
      </div>
    </div>
    <div class="col-6">
      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="">
        <label for="floatingInput">Password</label>
      </div>
    </div>
    <div class="col-6">
      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="">
        <label for="floatingInput">Confirm Password</label>
      </div>
    </div>
  </div>

</div>
