$(document).ready(function () {
  var userid = $("#userid").val();
  getPackageList(userid);
  $(".star-icon").click(function (event) {
    event.stopPropagation();
    const rating = $(this).data("rating");
    $(".star-icon").removeClass("active");
    for (let i = 0; i < rating; i++) {
      $(".star-icon").eq(i).addClass("active");
    }
  });
  $("textarea").click(function (event) {
    event.stopPropagation();
  });
  $("select").click(function (event) {
    event.stopPropagation();
  });

  $(document.body).click(function (event) {
    event.stopPropagation();
    const starRatingSection = $(".star-rating");
    if (
      !starRatingSection.is(event.target) &&
      starRatingSection.has(event.target).length === 0
    ) {
      $(".star-icon").removeClass("active");
    }
  });

  $("#btnRate").click(function () {
    const rating = $(".star-icon.active").length;
    alert(rating);
    const comment = $("#floatingTextarea").val();
    const packageid = $("#packages").val();
    var send_data = {
      packageID: packageid,
      rate: rating,
      review: comment,
      createdby: userid,
    };
    $.ajax({
      url: "../api/reviews/create.php",
      type: "POST",
      data: send_data,
      dataType: "json",
      beforeSend: function () {
        // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
      },
      success: function (response) {
        alert(response.message);
        $("#floatingTextarea").val("");
        $("#packages").empty();
        getPackageList(id);
      },
      async: true,
      error: function (e) {},
      cache: false,
    });
  });
});

function getPackageList(id) {
  var send_data = { userid: id };
  $.ajax({
    url: "../api/reviews/getUserPackage.php",
    type: "POST",
    data: send_data,
    dataType: "json",
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (response) {
      console.log(response); // Debugging line
      var packageSelect = $("#packages");
      packageSelect.empty();
      var packagesData = $("#packagesData");
      packagesData.empty();
      if (response.status === true && Array.isArray(response.package)) {
        response.package.forEach(function (package) {
          var option = $("<option></option>");
          option.val(package.PackageID).text(package.PackageName);
          packageSelect.append(option);
        });
      } else {
        console.error("Invalid response format or no packages found.");
      }
    },
    async: true,
    error: function (e) {
      console.error("Error fetching package list:", e);
    },
    cache: false,
  });
}
