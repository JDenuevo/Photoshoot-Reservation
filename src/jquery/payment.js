$(document).ready(function () {
  var userid = $("#userid").val();
  getUserReservation(userid);

  $("#reservationCards").on("click", ".paymentModal", function (e) {
    var payment_status = $(this).attr("paymentStatus");
    var total_price = parseFloat($(this).attr("total_price")); // Parse total price to float
    var total_amount_pay = parseFloat($(this).attr("total_amount_pay")); // Parse total amount paid to float
    var reservationID = $(this).attr("reservationID");
    var package = $(this).attr("package");

    var newTotalAmount = total_price - total_amount_pay;
    if (total_amount_pay != 0) {
      $("#downpayment").hide();
    } else {
      $("#downpaymentOption").show();
    }

    $("#modalTitle").text(package);
    $("#totalAmount").text("Total: ₱ " + newTotalAmount.toFixed(2)); // Display total price

    // Event listener for payment option change
    $('input[name="paymentOption"]').change(function () {
      var selectedOption = $(this).val();

      if (selectedOption === "downpayment") {
        newTotalAmount = total_price - total_amount_pay;
        // If downpayment option is selected, set total amount to 50% of total price
        newTotalAmount = total_price / 2;
      } else {
        newTotalAmount = total_price - total_amount_pay;
        // If full payment option is selected, set total amount to total price
        newTotalAmount = newTotalAmount;
      }

      $("#totalAmount").text("Total: ₱ " + newTotalAmount.toFixed(2)); // Update total amount displayed
    });

    $("#paymentModal").modal("show");

    $("#paymentBtn").click(function () {
      window.location.href =
        "../api/payment/pay.php?total=" +
        newTotalAmount +
        "&reservationid=" +
        reservationID;
    });
  });
});

function getUserReservation(userid) {
  var send_data = {
    reservedby: userid,
  };
  $.ajax({
    url: "../api/reservation/get.php",
    type: "POST",
    data: send_data,
    beforeSend: function () {
      // $('#msg').html('<img src="loading_circle.gif" /> <br/> Loading Page...');
    },
    success: function (response) {
      if (response.status === true && response.reservation.length > 0) {
        var reservationCards = $("#reservationCards");

        // Iterate over each reservation in the response
        $.each(response.reservation, function (index, reservation) {
          // Create card HTML dynamically
          var dateParts = reservation.Date.split("-");
          var formattedDate = new Date(reservation.Date).toLocaleString(
            "en-us",
            { month: "short", day: "numeric" }
          );
          var timeParts = reservation.Time.split(":");
          var formattedTime =
            (timeParts[0] % 12 || 12) +
            ":" +
            timeParts[1] +
            " " +
            (timeParts[0] < 12 ? "am" : "pm");

          var link = "";
          var linkbtn = "";
          if (reservation.Status == 2) {
            link = reservation.Link;
            linkbtn =
              '<li><a href="' +
              link +
              '"target="_blank" class="btn btn-primary mt-5 mb-3" type="button">Picture Here</a></li>';
          }

          var cardHtml = `
                <div class="col-4">
                    <div class="card bg-light border border-dark">
                        <div class="card-header">
                            <h5 class="card-title my-auto">${reservation.PackageName}</h5>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <ul class="card-text fs-6">
                                <li>Payment Status: ${reservation.payment_status}</li>
                                <li>1 - ${reservation.Pax} Persons</li>
                                <li>${reservation.Description}</li>
                                <li>---------------------------------</li>
                                <li>${formattedDate} | ${formattedTime}</li>
                                <li>30 Minutes</li>
                                ${linkbtn}
                    `;

          if (reservation.Status == 0) {
            cardHtml += `
                                <h5 class="mt-5">This Reservation is Pending</h5>
                            </ul>
                        </div>
                    </div>
                </div>
                `;
          } else if (reservation.Status == 3) {
            cardHtml += `
                                <h5 class="mt-5">This Reservation is Declined</h5>
                            </ul>
                        </div>
                    </div>
                </div>
                `;
          } else if (reservation.Status == 2) {
            cardHtml += `
                                <h5>This Reservation is Done</h5>
                            </ul>
                        </div>
                    </div>
                </div>
                `;
          } else {
            var totalHtml = "";
            var downHtml = "";
            var btnHtml = "";

            if (reservation.payment_status === "Complete") {
              btnHtml =
                '<button type="button" class="btn btn-primary paymentModal" paymentStatus="' +
                reservation.payment_status +
                '" total_price="' +
                reservation.total_price +
                '" total_amount_pay="' +
                reservation.total_amount_pay +
                '" reservationID="' +
                reservation.ReservationID +
                '" package="' +
                reservation.PackageName +
                '" disabled>Payment Completed</button>';
            } else {
              btnHtml =
                '<button type="button" class="btn btn-primary paymentModal" paymentStatus="' +
                reservation.payment_status +
                '" total_price="' +
                reservation.total_price +
                '" total_amount_pay="' +
                reservation.total_amount_pay +
                '" reservationID="' +
                reservation.ReservationID +
                '" package="' +
                reservation.PackageName +
                '">Payment Reservation Slot</button>';

              totalHtml =
                '<li class="fw-bold mt-5 fs-5">Downpayment : ' +
                reservation.total_amount_pay +
                "</li>";
              downHtml =
                '<li class="fw-bold  fs-5">Total : ' +
                (reservation.Price - reservation.total_amount_pay) +
                "</li>";
            }

            cardHtml += `
                                ${totalHtml}
                                ${downHtml}
                            </ul>
                            ${btnHtml}
                        </div>
                    </div>
                </div>
                `;
          }

          // Append the card HTML to the reservationCards container
          reservationCards.append(cardHtml);
        });
      } else {
        // Handle no reservations found
        // You can add a message or perform any other action here
        console.log("No reservations found.");
      }
    },
    async: true,
    error: function (e) {},
    cache: false,
  });
}
