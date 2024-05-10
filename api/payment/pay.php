<?php
session_start();
include '../../paypal/config.php'; // Include your PayPal configuration file
include '../../paypal/PayPal.php'; // Include the PayPal class or any other necessary files

// Get total amount from the request, or use a default value if necessary
$total = isset($_GET['total']) ? $_GET['total'] : 0;
$_SESSION['reservationID'] = isset($_GET['reservationid']) ? $_GET['reservationid'] : '';

// Initialize PayPal object with client ID and secret
$paypal = new PayPal(PAYPAL_CLIENT_ID, PAYPAL_SECRET_ID);

// Create the payment with the total amount
$paymentResponse = $paypal->createPayment($total);

// Debugging: Inspect the structure of the payment response
var_dump($paymentResponse);

// Check if the links property exists and is an array
if (isset($paymentResponse->links) && is_array($paymentResponse->links)) {
    // Check if the approval URL is available (assuming it's the second link)
    if (isset($paymentResponse->links[1]) && isset($paymentResponse->links[1]->href)) {
        // Redirect to the approval URL
        header('Location: ' . $paymentResponse->links[1]->href);
        exit;
    } else {
        echo "Approval URL not found in PayPal response";
    }
} else {
    echo "Invalid PayPal response format";
}
?>
