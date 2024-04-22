<style scoped>
:root{
    --fc-event-bg-color: #001F3F;
    --fc-event-border-color: #FFFFFF;
    --fc-event-hover-color: #002F5F;
}
.card {
  border-radius: 10px;
  filter: drop-shadow(0 5px 10px 0 #FFFFFF);
  width: 100%;
  background-color: #FFFFFF;
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
    color: #FFFFFF;

}

</style>

<div class="">
        
    <h5 class="fw-bold">Dashboard</h5>

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

        <div class="d-flex justify-content-between mt-4">
            <h5 class="date text-primary"></h5>
            <h5 class="time text-primary"></h5>
        </div>

    
        <div class="container">
            <?php include '../components/admin/calendar.php' ?>
        </div>    

        </div>
  
    </div>

</div>

<script>

    function updateDate() {
        $.ajax({
        url: '../php/get_date.php', // Path to PHP script that returns the date
        type: 'GET',
        success: function(data) {
            $('.date').text(data); // Update the date element with the fetched date
        },
        error: function() {
            $('.date').text('Error fetching date.'); // Display error message if date fetch fails
        }
        });
    }

    function updateTime() {
        $.ajax({
        url: '../php/get_time.php', // Path to PHP script that returns the time
        type: 'GET',
        success: function(data) {
            $('.time').text(data); // Update the time element with the fetched time
        },
        error: function() {
            $('.time').text('Error fetching time.'); // Display error message if time fetch fails
        }
        });
    }

    // Update the date and time every second
    setInterval(function() {
        updateDate();
        updateTime();
    }, 1000);

    // Initial call to display the date and time
    updateDate();
    updateTime();

</script>