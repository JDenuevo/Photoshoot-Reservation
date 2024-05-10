$(document).ready(function () {
  getAccounts();

  $("#accountsData").on("change", ".status", function () {
    var id = $(this).attr("id");
    var status = $(this).val();
    var send_data = {
      id: id,
      status: status,
    };
    $.ajax({
      url: "../api/accounts/updateStatus.php",
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
  });
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
function getAccounts() {
  $.ajax({
    url: "../api/accounts/getAllUserAccounts.php",
    type: "GET",
    dataType: "json",
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (response) {
      var accountsData = $("#accountsData");

      accountsData.empty();
      count = 1;
      response.account.forEach(function (account) {
        var type = "user";
        if (account.UserType == 1) {
          type = "admin";
        }
        var row = $("<tr></tr>");
        row.append("<td>" + count + "</td>");
        row.append("<td>" + account.FirstName + "</td>");
        row.append("<td>" + account.LastName + "</td>");
        row.append("<td>" + account.Email + "</td>");
        row.append("<td>" + type + "</td>");
        row.append(
          "<td><select class='form-select rounded-4 status' id='" +
            account.ID +
            "' id='floatingSelect'><option value='1'>Active</option> <option value='0'>In-active</option></select></td>"
        );

        // Set the selected option based on the `account.Status` value
        row.find("select").val(account.Status);

        accountsData.append(row);
        count++;
      });
    },
    async: true,
    error: function (e) {},
    cache: false,
  });
}
