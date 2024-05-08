$(document).ready(function () {
  token = "photoreserved";
  var roomIdSelected;
  getReservation();

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
    updateStatus(id, status);
  });

  // $("#btnUpdate").click(function () {
  //   var updatedName = $("#updateName").val();
  //   var UpdatedCapacity = $("#updateCapacity").val();
  //   $("#updateCapacity").val(UpdatedCapacity);
  //   updateRoom(roomIdSelected, updatedName, UpdatedCapacity);
  //   $("#modal-update-rooms").modal("hide");
  // });
});

function getReservation() {
  $.ajax({
    url: "../api/reservation/get.php",
    type: "POST",
    dataType: "json",
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
        row.append("<td>" + reservation.Date + "</td>");
        row.append("<td>" + reservation.Time + "</td>");
        row.append("<td>" + reservation.reserved_date + "</td>");

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
            '<td><button class="btn btn-sm btn-warning delete" id="delete" value ="1" reservationid="' +
              reservation.ReservationID +
              '">Delete</button></td>'
          );
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

function updateStatus(id, status) {
  var send_data = {
    reservationID: id,
    status: status,
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
      getReservation();
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
