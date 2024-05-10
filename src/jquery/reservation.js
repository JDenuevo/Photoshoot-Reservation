$(document).ready(function () {
  token = "photoreserved";
  var roomIdSelected;
  getReservation(null);

  // $("#btnAddRoom").click(function () {
  //   name = $("#name").val();
  //   capacity = $("#capacity").val();
  //   if (name == "" || capacity == "") {
  //     alert("Fill up all fiels!");
  //     return;
  //   }

  //   addRooms(name, capacity);
  //   $("#modal-new").modal("hide");
  // });

  // $("#roomData").on("click", ".removeRoom", function () {
  //   var roomid = $(this).val();

  //   var send_data = { token: token, roomid: roomid };
  //   $.ajax({
  //     url: "../api/rooms/delete.php",
  //     type: "POST",
  //     data: send_data,
  //     beforeSend: function () {
  //       // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
  //     },
  //     success: function (rs) {
  //       var response = JSON.parse(rs);
  //       alert(response.message);
  //       getRooms(null);
  //     },
  //     async: true,
  //     error: function (e) {},
  //     cache: false,
  //   });
  // });

  $("#reservationData").on("click", ".approved", function () {
    var status = $(this).val();
    var id = $(this).attr("reservationid");
    var link = "";
    updateStatus(id, status, link);
  });
  $("#reservationData").on("click", ".markDone", function () {
    var id = $(this).attr("reservationid");
    var status = $(this).val();
    // Prompt the user to input data
    var link = window.prompt("Enter Link Drive:");

    // Check if the user entered some data
    if (link !== null) {
      // Call the updateStatus function with the provided data
      updateStatus(id, status, link);
    }
  });

  // $("#btnUpdate").click(function () {
  //   var updatedName = $("#updateName").val();
  //   var UpdatedCapacity = $("#updateCapacity").val();
  //   $("#updateCapacity").val(UpdatedCapacity);
  //   updateRoom(roomIdSelected, updatedName, UpdatedCapacity);
  //   $("#modal-update-rooms").modal("hide");
  // });
});
function formatTimestamp(timestamp) {
  const date = new Date(timestamp);
  const month = date.toLocaleString("default", { month: "short" });
  const day = date.getDate();
  let hours = date.getHours();
  const minutes = (date.getMinutes() < 10 ? "0" : "") + date.getMinutes();
  const ampm = hours >= 12 ? "pm" : "am";
  hours = hours % 12;
  hours = hours ? hours : 12; // Handle midnight (0 hours)
  const formattedTime = `${month} ${day} ${hours}:${minutes} ${ampm}`;
  return formattedTime;
}
function formatDate(dateString) {
  const date = new Date(dateString);
  const month = date.toLocaleString("default", { month: "short" });
  const day = date.getDate();
  return `${month} ${day}`;
}

function formatTime(timeString) {
  const [hours, minutes] = timeString.split(":");
  let formattedTime;
  let ampm;

  // Convert hours to 12-hour format
  let hours12 = parseInt(hours, 10) % 12;
  hours12 = hours12 || 12; // Handle 0 hours

  // Determine AM or PM
  ampm = parseInt(hours, 10) >= 12 ? "pm" : "am";

  // Format minutes
  const formattedMinutes = (minutes < 10 ? "0" : "") + minutes;

  // Construct formatted time string
  formattedTime = `${hours12}:${formattedMinutes} ${ampm}`;
  return formattedTime;
}
function getReservation(reservedby) {
  $.ajax({
    url: "../api/reservation/get.php",
    type: "POST",
    dataType: "json",
    data: { reservedby: reservedby },
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (response) {
      var reservationData = $("#reservationData");

      reservationData.empty();
      count = 1;
      response.reservation.forEach(function (reservation) {
        var row = $("<tr></tr>");
        row.append("<td>" + count + "</td>");
        row.append("<td>" + reservation.reserved_by + "</td>");
        row.append("<td>" + reservation.PackageName + "</td>");
        row.append("<td>" + formatDate(reservation.Date) + "</td>");
        row.append("<td>" + formatTime(reservation.Time) + "</td>");
        row.append(
          "<td>" + formatTimestamp(reservation.reserved_date) + "</td>"
        );

        if (reservation.total_amount_pay != null) {
          row.append(
            "<td>" +
              reservation.total_amount_pay +
              "-" +
              reservation.payment_status +
              "</td>"
          );
        } else {
          row.append("<td>" + reservation.payment_status + "</td>");
        }

        if (reservation.Status == 0) {
          row.append("<td>Pending</td>");
          row.append(
            '<td><button class="btn btn-sm btn-primary approved" id="approved" value ="1" reservationid="' +
              reservation.ReservationID +
              '">Approved</button></td>'
          );
        } else if (reservation.Status == 1) {
          row.append("<td>Reserved</td>");
          row.append(
            '<td><button class="btn btn-sm btn-warning markDone" id="markDone" value ="2" reservationid="' +
              reservation.ReservationID +
              '">Mark As Done</button></td>'
          );
        } else if (reservation.Status == 2) {
          row.append("<td>Done</td>");
          row.append("<td>Done</td>");
        }

        reservationData.append(row);
        count++;
      });
    },
    async: true,
    error: function (e) {},
    cache: false,
  });
}

function updateStatus(id, status, link) {
  var send_data = {
    reservationID: id,
    status: status,
    link: link,
  };
  $.ajax({
    url: "../api/reservation/updateStatus.php",
    type: "POST",
    data: send_data,
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (rs) {
      var response = JSON.parse(rs);

      alert(response.message);
      getReservation(null);
    },
    async: true,
    error: function (e) {},
    cache: false,
  });
}

function updateRoom(roomid, name, capacity) {
  var send_data = {
    token: token,
    roomid: roomid,
    name: name,
    capacity: capacity,
  };
  $.ajax({
    url: "../api/rooms/update.php",
    type: "POST",
    data: send_data,
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (rs) {
      var response = JSON.parse(rs);

      alert(response.message);
      $("#updateName,#updateCapacity").val("");
      getRooms(null);
    },
    async: true,
    error: function (e) {},
    cache: false,
  });
}
