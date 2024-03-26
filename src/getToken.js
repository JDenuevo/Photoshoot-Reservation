function getToken(callback) {
  $.ajax({
    url: "../api/parse/get_user_token.php",
    type: "POST",
    dataType: "json",
    success: function (response) {
      if (response.status === true) {
        var token = response.token;
        callback(token); // Call the callback function with the token
      } else {
        callback(null); // Call the callback function with null if token retrieval fails
      }
    },
    error: function (xhr, status, error) {
      console.error("Error:", status, error);
      callback(null); // Call the callback function with null if an error occurs
    },
  });
}
