<?php
include('../../inc/config.php');
include('../../php/checkToken.php');

$response = array();
session_start();

    $reservedBy = mysqli_real_escape_string($conn, $_POST['reservedby']);
    $packageID = mysqli_real_escape_string($conn, $_POST['packageID']);
    $date= mysqli_real_escape_string($conn, $_POST['date']);
    $time= mysqli_real_escape_string($conn, $_POST['time']);

    
            // Insert reservation into the database
            $insertQuery = "INSERT INTO reservation (Reserved_by, PackageID, Date,Time) VALUES (?, ?, ?,?)";
            $stmt = mysqli_prepare($conn, $insertQuery);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'iiss', $reservedBy, $packageID, $date,$time);
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    $response['status'] = true;
                    $response['message'] = "Reservation added successfully";
                } else {
                    $response['status'] = false;
                    $response['message'] = "Failed to add reservation";
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
