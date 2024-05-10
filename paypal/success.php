<?php
session_start();
include '../inc/config.php';
include 'config.php';
include './PayPal.php';

// Make sure to include the file where $pdo is defined
include '../inc/config.php';

if(isset($_GET['paymentId']) && $_GET['paymentId']){
    $paypal = new PayPal(PAYPAL_CLIENT_ID, PAYPAL_SECRET_ID);
    $paymentResponse = $paypal->executePayment($_GET['paymentId'], $_GET['PayerID']);
   
    $reservationID = $_SESSION['reservationID'];
    $transactionid = $paymentResponse->id;
    $amount = $paymentResponse->transactions[0]->amount->total; // Assuming the amount is in the first transaction
    $status = $paymentResponse->state; // Assuming the payment state is the status

    $stmt = $conn->prepare("INSERT INTO payment (Amount, ReservationID, TransactionID) VALUES (?, ?, ?)");
    $stmt->bind_param("dss", $amount, $reservationID, $transactionid); // Assuming Amount is of type double and TransactionID is of type string
    $stmt->execute();

    // Redirect the user or show a success message
    header('Location: ../../pages/user.php');
    exit;
}
?>
