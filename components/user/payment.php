
<?php session_start(); ?>
<div class="container text-center">
  <hr>
  <input type="text" class="form-control" id="userid" value="<?php echo $_SESSION['userid']; ?>" hidden>
  <h4 class="fw-bold">Payment Details</h4>
  <p class="text-muted">Please double check the details before paying your Requested Appointment.</p>

  <div class="row row-cols-3" id="reservationCards">
    <!-- <div class="col-4"> -->
      <!-- <div class="card bg-light border border-dark">
        <div class="card-header">
          <h5 class="card-title my-auto">PACKAGE A</h5>
        </div>
        <div class="card-body d-flex flex-column">
          <ul class="card-text fs-6">
            <li>1-2 Persons</li>
            <li>15 Minutes Shoot</li>
            <li>All soft copies</li>
            <li class="fw-bold mt-5 fs-5">PHP 449</li>
          </ul>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">
            Confirm Reservation Slot
          </button>
        </div>
      </div>
    </div> -->
</div>

<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content" id="paymentModal">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 id="totalAmount"></h3>
        <div class="text-start my-2">
        <label class="fw-semibold fs-5">Payment Options</label>
        <div class="form-check my-3" id="downpayment">
          <input class="form-check-input" type="radio" name="paymentOption" id="downpaymentOption" value="downpayment">
          <label class="form-check-label fs-6" for="downpaymentOption">
            Pay a Downpayment
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="paymentOption" id="fullPaymentOption" value="fullpayment">
          <label class="form-check-label fs-6" for="fullPaymentOption">
            Pay a Full payment
          </label>
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

        <a class="btn btn-primary btn-lg rounded-pill fw-semibold mt-5 w-100" type="button" id="paymentBtn">Pay Reservation Slot</a>

      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="paymentModalanother" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">PACKAGE B</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th scope="row">Reservation holder Name</th>
                <td>Jhemar Acosta Denuevo</td>
              </tr>
              <tr>
                <th scope="row">Maximum Capacity</th>
                <td>3-4 Persons</td>
              </tr>
              <tr>
                <th scope="row">Time Limit</th>
                <td>20 Minutes</td>
              </tr>
              <tr>
                <th scope="row">Files</th>
                <td>All soft copies</td>
              </tr>
              <tr>
                <th scope="row">Cost</th>
                <td class="fw-bold">PHP 649</td>
              </tr>
            </tbody>
          </table>
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

        <button class="btn btn-primary btn-lg rounded-pill fw-semibold mt-5 w-100" type="submit">Pay Reservation Slot</button>

      </div>
    </div>
  </div>
</div>
<script src="../src/jquery/payment.js"></script>