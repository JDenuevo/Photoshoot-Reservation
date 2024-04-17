<div class="">
    <div class="table-responsive rounded-3 p-3 shadow-sm">
        
        <table class="table caption-top tblRooms">
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
                    <th scope="col">Action</th>        
                </tr>
            </thead>
            <tbody id="roomData">
              
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
              <input type="text" class="form-control rounded-4" id="name" placeholder="Name" required>
              <label for="" class="form-label">Name</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="capacity" placeholder="Capacity" required>
              <label for="" class="form-label">Capacity</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="btnAddRoom"><i class="ti ti-device-floppy"></i> Add new room</button>
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
              <input type="text" class="form-control rounded-4" id="updateName" placeholder="Name" required>
              <label for="" class="form-label">Name</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="updateCapacity" placeholder="Capacity" required>
              <label for="" class="form-label">Capacity</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="btnUpdate">Update new changes</button>
      </div>
    </div>
  </div>
</div>
<script src="../src/jquery/rooms.js"></script>