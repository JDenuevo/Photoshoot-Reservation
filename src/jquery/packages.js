$(document).ready(function () {
  token = "photoreserved";
  var packageIdSelected;
  getPackages(null);

  $("#btnAddPackage").click(function () {
    packageName = $("#packageName").val();
    maximumPax = $("#maximumPax").val();
    price = $("#price").val();
    description = $("#description").val();

    if (
      packageName == "" ||
      maximumPax == "" ||
      price == "" ||
      description == ""
    ) {
      alert("Fill up all fiels!");
      return;
    }

    addPackages(packageName, maximumPax, price, description);
    $("#modal-packages").modal("hide");
  });

  $("#packagesData").on("click", ".removePackage", function () {
    var packageID = $(this).val();

    var send_data = { token: token, packageID: packageID };
    $.ajax({
      url: "../api/packages/delete.php",
      type: "POST",
      data: send_data,
      beforeSend: function () {
        // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
      },
      success: function (rs) {
        var response = JSON.parse(rs);
        alert(response.message);
        getPackages(null);
      },
      async: true,
      error: function (e) {},
      cache: false,
    });
  });

  $("#packagesData").on("click", ".updatePackage", function () {
    packageIdSelected = $(this).attr("packageId");
    $("#updatedPackageName").val($(this).attr("packageName"));
    $("#updatedPax").val($(this).attr("pax"));
    $("#updatedPrice").val($(this).attr("price"));
    $("#UpdatedDescription").val($(this).attr("description"));
    $("#modal-update-packages").modal("show");
  });

  $("#btnUpdate").click(function () {
    var packageName = $("#updatedPackageName").val();
    var pax = $("#updatedPax").val();
    var price = $("#updatedPrice").val();
    var description = $("#UpdatedDescription").val();
    updateRoom(packageIdSelected, packageName, pax, price, description);
    $("#modal-update-packages").modal("hide");
  });
});

function addPackages(packageName, pax, price, description) {
  var send_data = {
    token: token,
    packageName: packageName,
    pax: pax,
    price: price,
    description: description,
  };
  $.ajax({
    url: "../api/packages/create.php",
    type: "POST",
    data: send_data,
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (rs) {
      alert(rs.message);
      $("#roomName,#packageName,#pax,#price,#description").val("");
      getPackages(null);
    },
    async: true,
    error: function (e) {},
    cache: false,
  });
}

// function getRoomList(id) {
//   var send_data = { token: token, roomid: id };
//   $.ajax({
//     url: "../api/rooms/get.php",
//     type: "POST",
//     data: send_data,
//     dataType: "json",
//     beforeSend: function () {
//       // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
//     },
//     success: function (response) {
//       var roomNameSelect = $("#roomName");
//       var roomNameSelect = $("#roomName");
//       var roomNameUpdate = $("#updatedRoomName");
//       roomNameSelect.empty();
//       roomNameUpdate.empty();
//       response.rooms.forEach(function (room) {
//         var option = $("<option></option>");
//         option.val(room.RoomID).text(room.Name);
//         roomNameSelect.append(option);
//         roomNameUpdate.append(option.clone());
//       });
//     },
//     async: true,
//     error: function (e) {},
//     cache: false,
//   });
// }

function getPackages(id) {
  var send_data = { token: token, packageID: id };
  $.ajax({
    url: "../api/packages/get.php",
    type: "POST",
    data: send_data,
    dataType: "json",
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (response) {
      var packagesData = $("#packagesData");
      packagesData.empty();
      count = 1;
      response.packages.forEach(function (package) {
        var row = $("<tr></tr>");
        row.append("<td>" + count + "</td>");
        row.append("<td>" + package.PackageName + "</td>");
        row.append("<td>" + package.Pax + "</td>");
        row.append("<td>" + package.Price + "</td>");
        row.append("<td>" + package.Description + "</td>");
        row.append("<td>" + package.CreatedName + "</td>");
        row.append(
          '<td><button type="button" class="btn btn-sm btn-info updatePackage" id="updatePackage" packageID="' +
            package.PackageID +
            '" packageName ="' +
            package.PackageName +
            '" pax ="' +
            package.Pax +
            '" price ="' +
            package.Price +
            '" description ="' +
            package.Description +
            '" ><i class="ti ti-edit" ></i> Update</button><button class="btn btn-sm btn-danger removePackage" id="removePackage" value="' +
            package.PackageID +
            '"><i class="ti ti-trash"></i> Remove</button></td>'
        );
        packagesData.append(row);
        count++;
      });
    },
    async: true,
    error: function (e) {},
    cache: false,
  });
}

function updateRoom(packageId, packageName, pax, price, description) {
  var send_data = {
    token: token,
    packageID: packageId,
    packageName: packageName,
    pax: pax,
    price: price,
    description: description,
  };
  $.ajax({
    url: "../api/packages/update.php",
    type: "POST",
    data: send_data,
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (rs) {
      var response = JSON.parse(rs);

      alert(response.message);
      //$("#updateName,#updateCapacity").val("");
      getPackages(null);
    },
    async: true,
    error: function (e) {},
    cache: false,
  });
}
