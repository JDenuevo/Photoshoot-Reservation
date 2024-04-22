<div class="">
    <div class="table-responsive rounded-3 p-3 shadow-sm">
        
        <table class="table caption-top">
            <div class="d-flex justify-content-between">
                <h5 class="fw-bold">List of Packages</h5>
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal-packages">
                    <i class="ti ti-square-plus"></i> Add New Package
                </button>
            </div>
            <hr>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Room ID</th>
                    <th scope="col">Package Name</th>
                    <th scope="col">Pax</th>
                    <th scope="col">Price</th>
                    <th scope="col">Time</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created by</th>
                    <th scope="col">Action</th>            
                </tr>
            </thead>
            <tbody id="packagesData">
                
            </tbody>
        </table>

    </div>

</div>

<!-- Add room Package -->
<div class="modal fade" id="modal-packages" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add a new Package</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-2">
          
          <div class="col-6">
            <div class="form-floating mb-3">
            <select class="form-control rounded-4" id="roomName" placeholder="Room Name" required>
            </select>

              <label for="" class="form-label">Room Name</label>
            </div>
          </div>

          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="packageName" placeholder="Package Name" required>
              <label for="" class="form-label">Package Name</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="maximumPax" placeholder="Pax" required>
              <label for="" class="form-label">Maximum Pax</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="price" placeholder="Price" required>
              <label for="" class="form-label">Price</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="time" placeholder="Time" required>
              <label for="" class="form-label">Time</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="description" placeholder="Description" required>
              <label for="" class="form-label">Description</label>
            </div>
          </div>
       
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="btnAddPackage"><i class="ti ti-device-floppy"></i> Add new Package</button>
      </div>
    </div>
  </div>
</div>


<!-- Update room Package -->
<div class="modal fade" id="modal-update-packages" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Package</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-2">
         
        <div class="col-6">
            <div class="form-floating mb-3">
            <select class="form-control rounded-4" id="updatedRoomName" placeholder="Room Name" required>
            </select>

              <label for="" class="form-label">Room Name</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="updatedPackageName" placeholder="Package Name" required>
              <label for="" class="form-label">Package Name</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="updatedPax" placeholder="Pax" required>
              <label for="" class="form-label">Pax</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="updatedPrice" placeholder="Price" required>
              <label for="" class="form-label">Price</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="updatedTimeLimit" placeholder="Time" required>
              <label for="" class="form-label">Time</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="UpdatedDescription" placeholder="Description" required>
              <label for="" class="form-label">Description</label>
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

<script src="../src/jquery/packages.js"></script>