<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();
if (checkToken($response)){

        $reviewID = $_POST['reviewid'];
        $PackageID = $_POST['packageid'];
        $Rate = $_POST['rate'];
        $Review = $_POST['review'];
        $Created_by = $_POST['createdby'];

        $insertQuery = "update reviews set PackageID = ?, Rate = ?, Review = ? , Created_by = ? where ReviewID = ?";
        $stmt = mysqli_prepare($conn, $insertQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'iisii',  $PackageID, $Rate, $Review, $Created_by, $reviewID);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $response['status'] = true;
                $response['message'] = "Reviews successfully updated";
            } else {
                $response['status'] = false;
                $response['message'] = "Reviews update failed";
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
