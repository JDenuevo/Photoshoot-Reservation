$(document).ready(function () {
  var userid = $("#userid").val();
  getUserProfile(userid);

  $("#saveBtn").click(function () {
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var email = $("#email").val();
    var send_data = {
      userid: userid,
      firstname: firstname,
      lastname: lastname,
      email: email,
    };
    $.ajax({
      url: "../api/accounts/updateProfile.php",
      type: "POST",
      data: send_data,
      dataType: "json",
      beforeSend: function () {
        // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
      },
      success: function (response) {
        alert(response.message);
        getUserProfile(userid);
      },
      async: true,
      error: function (e) {
        console.error("Error fetching package list:", e);
      },
      cache: false,
    });
  });
});

function getUserProfile(userid) {
  var send_data = { userid: userid };
  $.ajax({
    url: "../api/accounts/getUserAccount.php",
    type: "POST",
    data: send_data,
    dataType: "json",
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (response) {
      $("#firstname").val(response.account[0].FirstName);
      $("#lastname").val(response.account[0].LastName);
      $("#email").val(response.account[0].Email);
    },
    async: true,
    error: function (e) {
      console.error("Error fetching package list:", e);
    },
    cache: false,
  });
}
