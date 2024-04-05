<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();
if (checkToken($response)){
        $reviewID = $_POST['reviewid'];

        $insertQuery = "update reviews set Status = 0 where ReviewID = ?";
        $stmt = mysqli_prepare($conn, $insertQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'i', $reviewID);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $response['status'] = true;
                $response['message'] = "Review successfully deleted";
            } else {
                $response['status'] = false;
                $response['message'] = "Review deletion failed";
            }

            mysqli_stmt_close($stmt);
        } else {
            $response['status'] = false;
            $response['message'] = "Prepared statement failed";
            error_log("Prepared statement failed: " . mysqli_error($conn));
        }
    } 


// Output the response as JSON
echo json_encode($response);
?>
