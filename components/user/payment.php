
<div class="container text-center">
  <hr>

  <h4 class="fw-bold">Payment Details</h4>
  <p class="text-muted">Please double check the details before paying a reservation slot</p>

  <div class="row">
    <div class="col-6">
      <div class="form-floating mb-3">
        <input type="date" class="form-control" id="" disabled>
        <label for="floatingInput">Date of Reservation</label>
      </div>
    </div>
    <div class="col-6">
      <div class="form-floating mb-3">
        <input type="time" class="form-control" id="" disabled>
        <label for="floatingInput">Time of Reservation</label>
      </div>
    </div>
    <div class="col-6">
      <div class="form-floating mb-3">
        <select class="form-select" id="" aria-label="Floating label select example" disabled>
          <option selected disabled>Open this select menu</option>
          <option value="">Digital Package</option>
          <option value="">Digital and Print Package</option>
        </select>
        <label for="floatingSelect">Select Main Package</label>
      </div>
    </div>
    <div class="col-6">
      <div class="form-floating mb-3">
        <select class="form-select" id="" aria-label="Floating label select example" disabled>
          <option selected disabled>Open this select menu</option>
          <option value="">Package A</option>
          <option value="">Package B</option>
          <option value="">Package C</option>
          <option value="">Package D</option>
        </select>
        <label for="floatingSelect">Select type of Package</label>
      </div>
    </div>
  </div>

  <div class="text-start my-2">
    <label>Please select a method of payment:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
      <label class="form-check-label" for="flexRadioDefault2">
        <img src="../assets/images/paypal.png" class="img-fluid">
      </label>
    </div>
  </div>

  <button class="btn btn-primary btn-lg rounded-pill fw-semibold mt-5 w-50" type="submit">Pay Reservation Slot</button>

</div>
