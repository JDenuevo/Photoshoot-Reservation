<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();
session_start();
if (checkToken($response)) {
    $reservedBy = $_POST['reservedby'];
    $packageID = $_POST['packageID'];
    $dateTo = $_POST['DateTo'];

    $sql = "SELECT TimeLimit FROM packages WHERE PackageID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $packageID);
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        $result_set = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result_set)) {
            $timeLimit = $row['TimeLimit'];
            // Create a DateTime object from the provided date
            $dateTime = new DateTime($dateTo);
            // Add the time limit in minutes to the DateTime object
            $dateTime->add(new DateInterval('PT' . $timeLimit . 'M'));
            $dateFrom = $dateTime->format('Y-m-d H:i:s');

            $insertQuery = "INSERT INTO reservation (Reserved_by, PackageID, DateTo, DateFrom) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $insertQuery);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'sdsi', $reservedBy, $packageID, $dateTo, $dateFrom);
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
                // Log the error for debugging
                error_log("Prepared statement failed: " . mysqli_error($conn));
            }
        } else {
            $response['status'] = false;
            $response['message'] = "Package ID not found";
        }
    } else {
        $response['status'] = false;
        $response['message'] = "Failed to fetch time limit";
        // Log the error for debugging
        error_log("Failed to fetch time limit: " . mysqli_error($conn));
    }
}

// Output the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
