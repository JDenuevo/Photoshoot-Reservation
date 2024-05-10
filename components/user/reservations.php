
<?php session_start(); ?>
<style>
  .form-check-input[type="radio"] {
    width: 1.5em; 
    height: 1.5em;
  }
</style>

<div class="container text-center">

  <hr>

  <h4 class="fw-bold">Reservation</h4>
  <p class="text-muted">Please fill out to input fields to reserve a slot</p>
  <input type="text" class="form-control" id="userid" value="<?php echo $_SESSION['userid']; ?>" hidden>
  <div class="row">
    <div class="col-6">
      <div class="form-floating mb-3">
        <input type="date" class="form-control" id="reservationDate" required>
        <label for="reservationDate">Date of Reservation</label>
      </div>
    </div>
    <div class="col-6">
      <div class="form-floating">
        <select class="form-select" id="time" aria-label="Floating label select example">
          <option selected disabled>Open this select menu</option>
          <option value="11:00:00">11:00 AM</option>
          <option value="11:30:00">11:30 AM</option>
          <option value="12:00:00">12:00 PM</option>
          <option value="12:30:00">12:30 PM</option>
          <option value="13:00:00">1:00 PM</option>
          <option value="13:30:00">1:30 PM</option>
          <option value="14:00:00">2:00 PM</option>
          <option value="14:30:00">2:30 PM</option>
          <option value="15:00:00">3:00 PM</option>
          <option value="15:30:00">3:30 PM</option>
          <option value="16:00:00">4:00 PM</option>
          <option value="16:30:00">4:30 PM</option>
          <option value="17:00:00">5:00 PM</option>
          <option value="17:30:00">5:30 PM</option>
          <option value="18:00:00">6:00 PM</option>
          <option value="18:30:00">6:30 PM</option>
          <option value="19:00:00">7:00 PM</option>
          <option value="19:30:00">7:30 PM</option>
          <option value="20:00:00">8:00 PM</option>
          <option value="20:30:00">8:30 PM</option>
        </select>
        <label for="floatingSelect">Select Time</label>
      </div>
    </div>

    <div class="col-12">
      <div class="form-floating">
        <select class="form-select" id="packages" aria-label="Floating label select example" required>
          <!-- <option selected disabled>--SELECT PACKAGE--</option> -->
        </select>
        <label for="floatingSelect">Select Main Package</label>
      </div>
    </div>

  </div>

  <div class="table-responsive pt-4">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col" hidden>Package ID</th>
          <th scope="col">Package</th>
          <th scope="col">Capacity</th>
          <th scope="col">Time Limit</th>
          <th scope="col">Files</th>
          <th scope="col">Cost</th>
        </tr>
      </thead>
      <tbody id="packagesData">
        
      </tbody>
    </table>
  </div>



  <button class="btn btn-primary btn-lg rounded-pill fw-semibold mt-5 w-50" type="button" id="reserveBtn">Request Appointment</button>

</div>
<script src="../src/jquery/userReservation.js"></script>
