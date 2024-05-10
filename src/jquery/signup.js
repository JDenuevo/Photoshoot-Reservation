$(document).ready(function () {
  $("#signupBtn").click(function () {
    var fname = $("#firstname").val();
    var lname = $("#lastname").val();
    var email = $("#email").val();
    var password1 = $("#password1").val();
    var password2 = $("#password2").val();

    if (password1 == password2) {
      register(fname, lname, email, password1);
    } else {
      $("#msg").text("Passwords do not match!");
    }
  });
});

function checkEmailExists(email) {
  $.ajax({
    url: "../api/accounts/checkEmailExist.php",
    type: "POST",
    data: { email: email },
    dataType: "json",
    beforeSend: function () {
      // Display loading indicator or perform any pre-request actions if needed
    },
    success: function (response) {
      if (response.status) {
        $("#msg").text("Email exists");
        return false;
      } else {
        $("#msg").text("");
        return true;
      }
    },
    error: function (xhr, status, error) {
      // Handle errors
      console.error("Error:", error);
    },
  });
}

$("#email").on("input", function () {
  var email = $(this).val();
  checkEmailExists(email);
});

function register(fname, lname, email, pass) {
  var send_data = {
    fname: fname,
    lname: lname,
    email: email,
    pass: pass,
  };
  $.ajax({
    url: "../api/accounts/registration.php",
    type: "POST",
    data: send_data,
    dataType: "json",
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (response) {
      alert(response.message);
      dispContent('login')
    },
    async: true,
    error: function (e) {},
    cache: false,
  });
}
