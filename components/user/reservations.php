<div class="">
    <div class="table-responsive rounded-3 p-3 shadow-sm">
        
        <table class="table caption-top">
            <div class="d-flex justify-content-between">
                <h5 class="fw-bold">List of Reservation</h5>
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal-reservations">
                    <i class="ti ti-square-plus"></i> Add New Reservations
                </button>
            </div>
            <hr>
            <thead>
                <tr>
                    <th scope="col">Reservation ID</th>
                    <th scope="col">Reserved_by</th>
                    <th scope="col">Package ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Balance</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Approved_by</th> 
                    <th scope="col">Status</th> 
                    <th scope="col">Action</th>            
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Gmar</td>
                    <td>100101</td>
                    <td>April 15, 2024</td>
                    <td>10:00:00 AM</td>
                    <td>PHP 499.00</td>
                    <td>March 12, 2024</td>
                    <td>Admin Julie</td>
                    <td>
                      <select class="form-select rounded-4" id="floatingSelect">
                        <option value="1">Reserved</option>
                        <option value="2">Available</option>
                      </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modal-update-reservations">
                            <i class="ti ti-edit"></i> Update
                        </button>
                        <button class="btn btn-sm btn-danger"><i class="ti ti-trash"></i> Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

</div>

<!-- Add room Package -->
<div class="modal fade" id="modal-reservations" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add a new Reservation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-2">
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="Reservation ID" required>
              <label for="" class="form-label">Reservation ID</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="Reserved by" required>
              <label for="" class="form-label">Reserved by</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="" placeholder="Package ID" required>
              <label for="" class="form-label">Package ID</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="date" class="form-control rounded-4" id="" placeholder="Date" required>
              <label for="" class="form-label">Date</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="time" class="form-control rounded-4" id="" placeholder="Time" required>
              <label for="" class="form-label">Time</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="Balance" required>
              <label for="" class="form-label">Balance</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="date" class="form-control rounded-4" id="" placeholder="Created at" required>
              <label for="" class="form-label">Created at</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="" placeholder="Created by" required>
              <label for="" class="form-label">Approved by</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating">
              <select class="form-select rounded-4" id="floatingSelect">
                <option value="1">Reserved</option>
                <option value="2">Available</option>
              </select>
              <label for="floatingSelect">Status</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary"><i class="ti ti-arrow-autofit-right"></i> Reserve slot</button>
      </div>
    </div>
  </div>
</div>

<!-- Update room Package -->
<div class="modal fade" id="modal-update-reservations" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Reservation</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-2">
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="Reservation ID" required>
              <label for="" class="form-label">Reservation ID</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="Reserved by" required>
              <label for="" class="form-label">Reserved by</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="" placeholder="Package ID" required>
              <label for="" class="form-label">Package ID</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="date" class="form-control rounded-4" id="" placeholder="Date" required>
              <label for="" class="form-label">Date</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="time" class="form-control rounded-4" id="" placeholder="Time" required>
              <label for="" class="form-label">Time</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="Balance" required>
              <label for="" class="form-label">Balance</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="date" class="form-control rounded-4" id="" placeholder="Created at" required>
              <label for="" class="form-label">Created at</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="" placeholder="Created by" required>
              <label for="" class="form-label">Approved by</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary">Update new changes</button>
      </div>
    </div>
  </div>
</div>