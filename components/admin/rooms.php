<div class="">
    <div class="table-responsive rounded-3 p-3 shadow-sm">
        
        <table class="table caption-top">
            <div class="d-flex justify-content-between">
                <label class="fw-bold">List of Rooms</label>
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal-new ">
                <i class="ti ti-square-plus"></i> Add New Room
                </button>
            </div>
            <hr>
            <thead>
                <tr>
                    <th scope="col">Room ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>        
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Vanilla</td>
                    <td>10</td>
                    <td>
                      <select class="form-select rounded-4" id="floatingSelect">
                        <option value="1">Available</option>
                        <option value="2">Occupied</option>
                        <option value="3">Reserved</option>
                      </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modal-update-rooms">
                            <i class="ti ti-edit"></i> Update
                        </button>
                        <button class="btn btn-sm btn-danger"><i class="ti ti-trash"></i> Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

</div>


<!-- New room Modal -->
<div class="modal fade" id="modal-new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add a new Room</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-2">
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="Room ID" required>
              <label for="" class="form-label">Room ID</label>
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
              <input type="number" class="form-control rounded-4" id="" placeholder="Capacity" required>
              <label for="" class="form-label">Capacity</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary"><i class="ti ti-device-floppy"></i> Add new room</button>
      </div>
    </div>
  </div>
</div>



<!-- Update room Package -->
<div class="modal fade" id="modal-update-rooms" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update a new Room</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-2">
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="Room ID" required>
              <label for="" class="form-label">Room ID</label>
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
              <input type="number" class="form-control rounded-4" id="" placeholder="Capacity" required>
              <label for="" class="form-label">Capacity</label>
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