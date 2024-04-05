<div class="">
        
    <label class="fw-bold">Dashboard</label>

    <hr>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="card h-100">
                    <div class="d-flex justify-content-between">
                        <h5>Available Rooms:</h5>
                        <h5 class="fw-semibold text-warning">5</h5>
                    </div>
                    <a type="button" class="btn btn-sm btn-primary mt-2 border start-50" onclick="dispContent('rooms')">Check room availability <i class="ti ti-corner-down-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card h-100">
                    <div class="d-flex justify-content-between">
                        <h5>Reserved slot:</h5>
                        <h5 class="fw-semibold text-warning">2</h5>
                    </div>
                    <a type="button" class="btn btn-sm btn-primary mt-2 border" onclick="dispContent('reservations')">Check reservations <i class="ti ti-corner-down-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card h-100">
                    <div class="d-flex justify-content-between">
                        <h5>Walk in customers:</h5>
                        <h5 class="fw-semibold text-warning">1</h5>
                    </div>
                    <a type="button" class="btn btn-sm btn-primary mt-2 border" onclick="dispContent('packages')">Check packages <i class="ti ti-corner-down-right"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card h-100">
                    <div class="d-flex justify-content-between">
                        <h5>Accounts Registered:</h5>
                        <h5 class="fw-semibold text-warning">2</h5>
                    </div>
                    <a type="button" class="btn btn-sm btn-primary mt-2 border" onclick="dispContent('accounts')">Check accounts <i class="ti ti-corner-down-right"></i></a>
                </div>
            </div>
        </div>
    </div>

</div>

<style scoped>

.card {
  border-radius: 10px;
  filter: drop-shadow(0 5px 10px 0 #ffffff);
  width: 100%;
  background-color: #ffffff;
  padding: 20px;
  position: relative;
  z-index: 0;
  overflow: hidden;
  transition: 0.6s ease-in;
}

.card::before {
  content: "";
  position: absolute;
  z-index: -1;
  top: -15px;
  right: -15px;
  background: #001F3F;
  height: 220px;
  width: 25px;
  border-radius: 32px;
  transform: scale(1);
  transform-origin: 50% 50%;
  transition: transform 0.25s ease-out;
}

.card:hover::before{
    transition-delay:0.2s ;
    transform: scale(40);
}

.card:hover{
    color: #ffffff;

}

</style>