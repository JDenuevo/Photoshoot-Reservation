<div class="">
    <div class="table-responsive rounded-3 p-3 shadow-sm">
        
        <table class="table caption-top">
            <div class="d-flex justify-content-between">
                <label class="fw-bold">List of Accounts</label>
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal-accounts">
                    <i class="ti ti-square-plus"></i> Add Account
                </button>
            </div>
            <hr>
            <thead>
                <tr>
                    <th scope="col">Account ID</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">UserType</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>        
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Gmar</td>
                    <td>Cutie</td>
                    <td>gmarcutie</td>
                    <td>Admin</td>
                    <td>
                      <select class="form-select rounded-4" id="floatingSelect">
                        <option value="1">Active</option>
                        <option value="2">In-active</option>
                      </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modal-update-accounts">
                            <i class="ti ti-edit"></i> Update
                        </button>
                        <button class="btn btn-sm btn-danger"><i class="ti ti-trash"></i> Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

</div>

<!-- Add Account -->
<div class="modal fade" id="modal-accounts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add new Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-2">
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="AddOns ID" required>
              <label for="" class="form-label">Account ID</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="" placeholder="Firstname" required>
              <label for="" class="form-label">Firstname</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="" placeholder="Lastname" required>
              <label for="" class="form-label">Lastname</label>
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
              <input type="email" class="form-control rounded-4" id="" placeholder="Email	" required>
              <label for="" class="form-label">Email</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating">
              <select class="form-select rounded-4 " id="floatingSelect">
                <option value="1">Available</option>
                <option value="2">Not Available</option>
              </select>
              <label for="floatingSelect">UserType</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating">
              <select class="form-select rounded-4 " id="floatingSelect">
                <option value="1">Active</option>
                <option value="2">In-active</option>
              </select>
              <label for="floatingSelect">Status</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary"><i class="ti ti-device-floppy"></i> Add account</button>
      </div>
    </div>
  </div>
</div>


<!-- Update Account -->
<div class="modal fade" id="modal-update-accounts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-2">
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="number" class="form-control rounded-4" id="" placeholder="AddOns ID" required>
              <label for="" class="form-label">Account ID</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="" placeholder="Firstname" required>
              <label for="" class="form-label">Firstname</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-4" id="" placeholder="Lastname" required>
              <label for="" class="form-label">Lastname</label>
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
              <input type="email" class="form-control rounded-4" id="" placeholder="Email	" required>
              <label for="" class="form-label">Email</label>
            </div>
          </div>
          <div class="col-6">   
            <div class="form-floating">
              <select class="form-select rounded-4" id="floatingSelect">
                <option value="1">Admin</option>
                <option value="2">Staff</option>
                <option value="3">Customer</option>
              </select>
              <label for="floatingSelect">UserType</label>
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

