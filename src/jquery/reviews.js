$(document).ready(function () {
  getReviews(null);
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
function getReviews(id) {
  $.ajax({
    url: "../api/reviews/get.php",
    type: "POST",
    dataType: "json",
    data: { reviewID: id },
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (response) {
      var reviewsData = $("#reviewsData");

      reviewsData.empty();
      count = 1;
      response.review.forEach(function (review) {
        var row = $("<tr></tr>");
        row.append("<td>" + count + "</td>");
        row.append("<td>" + review.PackageName + "</td>");
        row.append("<td>" + review.Rate + " stars</td>");
        row.append("<td>" + review.Review + "</td>");
        row.append("<td>" + formatTimestamp(review.Created_at) + "</td>");
        row.append("<td>" + review.name + "</td>");

        reviewsData.append(row);
        count++;
      });
    },
    async: true,
    error: function (e) {},
    cache: false,
  });
}
