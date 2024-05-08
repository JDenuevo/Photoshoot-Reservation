<?php
include('../../inc/config.php');
include('../../php/checkToken.php');

$response = array();
session_start();

    $resercationID = mysqli_real_escape_string($conn, $_POST['reservationID']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $transactionID= mysqli_real_escape_string($conn, $_POST['transactionID']);


            $insertQuery = "INSERT INTO payment (ReservationID, Amount, TransactionID) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $insertQuery);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'iii', $resercationID, $amount, $transactionID);
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    $response['status'] = true;
                    $response['message'] = "Payment added successfully";
                } else {
                    $response['status'] = false;
                    $response['message'] = "Failed to add Payment";
                }

                mysqli_stmt_close($stmt);
            } else {
                $response['status'] = false;
                $response['message'] = "Prepared statement failed";
                error_log("Prepared statement failed: " . mysqli_error($conn));
            }
        
    
// Output the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
