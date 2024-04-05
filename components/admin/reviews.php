<div class="">
    <div class="table-responsive rounded-3 p-3 shadow-sm">
        
        <table class="table caption-top">
            <label class="fw-bold">List of Reviews</label>
            <hr>
            <thead>
                <tr>
                    <th scope="col">Review ID</th>
                    <th scope="col">Package ID</th>
                    <th scope="col">Rate</th>
                    <th scope="col">Review</th>
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
                    <td>5 Stars</td>
                    <td>Good experience</td>
                    <td>March 12, 2024</td>
                    <td>Brusko</td>
                    <td>Done</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modal-reply-reviews">
                            <i class="ti ti-corner-up-left"></i> Reply
                        </button>
                        <button class="btn btn-sm btn-danger"><i class="ti ti-trash"></i> Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

</div>

<!-- Reply Reviews -->
<div class="modal fade" id="modal-reply-reviews" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Reply Reviews</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-dark" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-sm btn-success">Save changes</button>
      </div>
    </div>
  </div>
</div>