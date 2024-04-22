$(document).ready(function () {
  token = "photoreserved";
  var addonsId;
  getAddons(null);

  $("#btnAddAddons").click(function () {
    var name = $("#name").val();
    var price = $("#price").val();
    var description = $("#description").val();
    addAddons(name, price, description);
  });

  $("#addonsData").on("click", ".updateAddons", function () {
    addonsId = $(this).attr("addonsId");
    var addonsName = $(this).attr("name");
    var addonsPrice = $(this).attr("price");
    var addonsDescription = $(this).attr("description");

    $("#modal-update-addons").modal("show");

    $("#updatedName").val(addonsName);
    $("#updatedPrice").val(addonsPrice);
    $("#updatedDescription").val(addonsDescription);
  });

  $("#btnUpdateAddons").click(function () {
    var updatedName = $("#updatedName").val();
    var updatedPrice = $("#updatedPrice").val();
    var updatedDescription = $("#updatedDescription").val();

    updateAddOns(addonsId, updatedName, updatedPrice, updatedDescription);
  });

  $("#addonsData").on("click", ".removeAddons", function () {
    var id = $(this).val();

    deleteAddons(id);
  });

  function deleteAddons(id) {
    $.ajax({
      url: "../api/addons/delete.php",
      type: "POST",
      data: { token: token, id: id },
      beforeSend: function () {},
      success: function (rs) {
        var response = JSON.parse(rs);
        alert(response.message);
        getAddons(null);
      },
    });
  }

  function addAddons(name, price, description) {
    var send_data = {
      token: token,
      name: name,
      price: price,
      description: description,
    };
    $.ajax({
      url: "../api/addons/create.php",
      type: "POST",
      data: send_data,
      beforeSend: function () {
        // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
      },
      success: function (rs) {
        var response = JSON.parse(rs);
        alert(response.message);
        $("#name,#price,#description").val("");
        getAddons(null);
      },
      async: true,
      error: function (e) {},
      cache: false,
    });
  }

  function getAddons(id) {
    $.ajax({
      type: "POST",
      data: { token: token, id: id },
      url: "../api/addons/get.php",
      beforeSend: function () {
        // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
      },
      success: function (response) {
        var addonsData = $("#addonsData");
        addonsData.empty();
        count = 1;
        response.addons.forEach(function (addons) {
          var row = $("<tr></tr>");
          row.append("<td>" + count + "</td>");
          row.append("<td>" + addons.Name + "</td>");
          row.append("<td>" + addons.Price + "</td>");
          row.append("<td>" + addons.Description + "</td>");
          row.append("<td>" + addons.CreatedName + "</td>");
          row.append(
            '<td><button type="button" class="btn btn-sm btn-info updateAddons" id="updateAddons" addonsId="' +
              addons.AddonsID +
              '" name="' +
              addons.Name +
              '" price ="' +
              addons.Price +
              '" description ="' +
              addons.Description +
              '" ><i class="ti ti-edit" ></i> Update</button><button class="btn btn-sm btn-danger removeAddons" id="removeAddons" value="' +
              addons.AddonsID +
              '"><i class="ti ti-trash"></i> Remove</button></td>'
          );
          addonsData.append(row);
          count++;
        });
      },
      async: true,
      error: function (e) {},
      cache: false,
    });
  }

  function updateAddOns(addonsId, name, price, description) {
    var send_data = {
      token: token,
      addonsid: addonsId,
      name: name,
      price: price,
      description: description,
    };
    $.ajax({
      url: "../api/addons/update.php",
      type: "POST",
      data: send_data,
      beforeSend: function () {
        // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
      },
      success: function (rs) {
        var response = JSON.parse(rs);

        alert(response.message);
        $("#modal-update-addons").modal("hide");
        getAddons(null);
      },
      async: true,
      error: function (e) {},
      cache: false,
    });
  }
});
