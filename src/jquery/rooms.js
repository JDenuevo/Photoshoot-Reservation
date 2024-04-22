$(document).ready(function () {
  token = "photoreserved";
  var roomIdSelected;
  getRooms(null);

  $("#btnAddRoom").click(function () {
    name = $("#name").val();
    capacity = $("#capacity").val();
    if (name == "" || capacity == "") {
      alert("Fill up all fiels!");
      return;
    }

    addRooms(name, capacity);
    $("#modal-new").modal("hide");
  });

  $("#roomData").on("click", ".removeRoom", function () {
    var roomid = $(this).val();

    var send_data = { token: token, roomid: roomid };
    $.ajax({
      url: "../api/rooms/delete.php",
      type: "POST",
      data: send_data,
      beforeSend: function () {
        // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
      },
      success: function (rs) {
        var response = JSON.parse(rs);
        alert(response.message);
        getRooms(null);
      },
      async: true,
      error: function (e) {},
      cache: false,
    });
  });

  $("#roomData").on("click", ".updateRoom", function () {
    roomIdSelected = $(this).attr("roomID");
    var updatedName = $(this).attr("roomName");
    var UpdatedCapacity = $(this).attr("roomCapacity");
    $("#modal-update-rooms").modal("show");
    $("#updateName").val(updatedName);
    $("#updateCapacity").val(UpdatedCapacity);
  });

  $("#btnUpdate").click(function () {
    var updatedName = $("#updateName").val();
    var UpdatedCapacity = $("#updateCapacity").val();
    $("#updateCapacity").val(UpdatedCapacity);
    updateRoom(roomIdSelected, updatedName, UpdatedCapacity);
    $("#modal-update-rooms").modal("hide");
  });
});

function addRooms(name, capacity) {
  var send_data = { token: token, name: name, capacity: capacity };
  $.ajax({
    url: "../api/rooms/create.php",
    type: "POST",
    data: send_data,
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (rs) {
      var response = JSON.parse(rs);
      alert(response.message);
      $("#name,#capacity").val("");
      getRooms(null);
    },
    async: true,
    error: function (e) {},
    cache: false,
  });
}

function getRooms(id) {
  var send_data = { token: token, roomid: id };
  $.ajax({
    url: "../api/rooms/get.php",
    type: "POST",
    data: send_data,
    dataType: "json",
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (response) {
      var roomData = $("#roomData");

      roomData.empty();
      count = 1;
      response.rooms.forEach(function (room) {
        var row = $("<tr></tr>");
        row.append("<td>" + count + "</td>");
        row.append("<td>" + room.Name + "</td>");
        row.append("<td>" + room.Capacity + "</td>");
        row.append(
          '<td><button type="button" class="btn btn-sm btn-info updateRoom" id="updateRoom" roomID="' +
            room.RoomID +
            '" roomName="' +
            room.Name +
            '" roomCapacity="' +
            room.Capacity +
            '" ><i class="ti ti-edit"></i> Update</button><button class="btn btn-sm btn-danger removeRoom" id="removeRoom" value="' +
            room.RoomID +
            '"><i class="ti ti-trash"></i> Remove</button></td>'
        );
        roomData.append(row);
        count++;
      });
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
