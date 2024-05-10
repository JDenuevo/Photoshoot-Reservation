$(document).ready(function () {
  getPackageList(null);
  let currentDate = new Date();

  // Get tomorrow's date
  let tomorrow = new Date(currentDate);
  tomorrow.setDate(tomorrow.getDate() + 1);

  // Format the date as yyyy-mm-dd (required format for input type date)
  let tomorrowFormatted = tomorrow.toISOString().split("T")[0];

  // Set the minimum date attribute for the input field
  document
    .getElementById("reservationDate")
    .setAttribute("min", tomorrowFormatted);
  $("#reserveBtn").click(function () {
    var reservedby = $("#userid").val();
    var packageID = $("#packages").val();
    var date = $("#reservationDate").val();
    var time = $("#time").val();
    addReservation(reservedby, packageID, date, time);
  });

  $("#reservationDate").on("change", function () {
    var selectedDate = $(this).val(); // Get the selected date

    getAvailableTimes(selectedDate);
  });
});
function getAvailableTimes(selectedDate) {
  $.ajax({
    url: "../api/reservation/timeOccupied.php",
    type: "POST",
    data: { selectedDate: selectedDate },
    dataType: "json",
    success: function (response) {
      $("#time").empty();

      // Populate time select dropdown with available times
      if (response.status === true) {
        $.each(response.timeOccupied, function (index, time) {
          // Convert time from 24-hour format to 12-hour format
          var formattedTime = convertTo12HourFormat(time);

          $("#time").append(
            $("<option>", {
              value: time,
              text: formattedTime,
            })
          );
        });
      } else {
        // Handle no available times
        $("#time").append(
          $("<option>", {
            disabled: true,
            text: "No available times",
          })
        );
      }
    },
    error: function (xhr, status, error) {
      // Handle AJAX error
      console.error("Error fetching available times:", error);
    },
  });
}
function convertTo12HourFormat(time) {
  var hour = parseInt(time.substring(0, 2));
  var suffix = hour >= 12 ? "PM" : "AM";
  hour = hour % 12 || 12; // Convert hour 0 to 12
  var minute = time.substring(3, 5);
  return hour + ":" + minute + " " + suffix;
}

function addReservation(reservedby, packageID, date, time) {
  var send_data = {
    reservedby: reservedby,
    packageID: packageID,
    date: date,
    time: time,
  };
  $.ajax({
    url: "../api/reservation/create.php",
    type: "POST",
    data: send_data,
    dataType: "json",
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (response) {
      alert(response.message);
    },
    async: true,
    error: function (e) {},
    cache: false,
  });
}
function getPackageList(id) {
  var send_data = { packageID: null };
  $.ajax({
    url: "../api/packages/get.php",
    type: "POST",
    data: send_data,
    dataType: "json",
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (response) {
      var packageSelect = $("#packages");
      packageSelect.empty();
      var packagesData = $("#packagesData");
      packagesData.empty();
      response.packages.forEach(function (package) {
        var option = $("<option></option>");
        option.val(package.PackageID).text(package.PackageName);
        packageSelect.append(option);

        var row = $("<tr></tr>");
        row.append("<td>" + package.PackageName + "</td>");
        row.append("<td>1- " + package.Pax + " Persons</td>");
        row.append("<td>30 Minutes</td>");
        row.append("<td>" + package.Description + "</td>");
        row.append("<td>₱" + package.Price + "</td>");

        packagesData.append(row);
      });
    },
    async: true,
    error: function (e) {},
    cache: false,
  });
}
