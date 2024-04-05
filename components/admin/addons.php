<div class="">
    <div class="table-responsive rounded-3 p-3 shadow-sm">
        
        <table class="table caption-top">
            <div class="d-flex justify-content-between">
                <label class="fw-bold">List of Add Ons</label>
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal-addons">
                    <i class="ti ti-square-plus"></i> Add Add Ons
                </button>
            </div>
            <hr>
            <thead>
                <tr>
                    <th scope="col">AddOns ID</th>
                    <th scope="col">Reservation ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Created_by</th> 
                    <th scope="col">Status</th> 
                    <th scope="col">Action</th>            
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>100101</td>
                    <td>Brusko</td>
                    <td>PHP 499.00</td>
                    <td>Self Photoshoot</td>
                    <td>March 12, 2024</td>
                    <td>Gmar</td>
                    <td>
                      <select class="form-select rounded-4" id="floatingSelect">
                        <option value="1">Available</option>
                        <option value="2">Not available</option>
                      </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modal-update-addons">
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
<div class="modal fade" id="modal-addons" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add a new Add Ons</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-2">
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="AddOns ID" required>
              <label for="" class="form-label">AddOns ID</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="Reservation ID" required>
              <label for="" class="form-label">Reservation ID</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="" placeholder="Name" required>
              <label for="" class="form-label">Name</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="Price" required>
              <label for="" class="form-label">Price</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="" placeholder="Description" required>
              <label for="" class="form-label">Description</label>
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
              <label for="" class="form-label">Created by</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating">
              <select class="form-select rounded-4 " id="floatingSelect">
                <option value="1">Available</option>
                <option value="2">Not Available</option>
              </select>
              <label for="floatingSelect">Status</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary"><i class="ti ti-device-floppy"></i> Add new Add Ons</button>
      </div>
    </div>
  </div>
</div>


<!-- Update room Package -->
<div class="modal fade" id="modal-update-addons" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Add Ons</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-2">
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="AddOns ID" required>
              <label for="" class="form-label">AddOns ID</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="Reservation ID" required>
              <label for="" class="form-label">Reservation ID</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="" placeholder="Name" required>
              <label for="" class="form-label">Name</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="Price" required>
              <label for="" class="form-label">Price</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="" placeholder="Description" required>
              <label for="" class="form-label">Description</label>
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
              <label for="" class="form-label">Created by</label>
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