<div class="">
    <div class="table-responsive rounded-3 p-3 shadow-sm">
        
        <table class="table caption-top">
            <div class="d-flex justify-content-between">
                <h5 class="fw-bold">List of Add Ons</h5>
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal-addons">
                    <i class="ti ti-square-plus"></i> Add Add Ons
                </button>
            </div>
            <hr>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created_by</th> 
                    <th scope="col">Action</th>            
                </tr>
            </thead>
            <tbody id="addonsData">
                
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
              <input type="text" class="form-control rounded-4" id="name" placeholder="Name" required>
              <label for="" class="form-label">Name</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="price" placeholder="Price" required>
              <label for="" class="form-label">Price</label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="description" placeholder="Description" required>
              <label for="" class="form-label">Description</label>
            </div>
          </div>
          
         
        
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="btnAddAddons"><i class="ti ti-device-floppy"></i> Add new Add Ons</button>
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
              <input type="text" class="form-control rounded-4" id="updatedName" placeholder="Name" required>
              <label for="" class="form-label">Name</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="updatedPrice" placeholder="Price" required>
              <label for="" class="form-label">Price</label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="updatedDescription" placeholder="Description" required>
              <label for="" class="form-label">Description</label>
            </div>
          </div>
        
       
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnUpdateAddons" class="btn btn-sm btn-primary">Update new changes</button>
      </div>
    </div>
  </div>
</div>
<script src="../src/jquery/addons.js"></script>