<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();

if (checkToken($response)){
    $packageID = $_POST['packageID'];
    $Rate = $_POST['rate'];
    $Review = $_POST['review'];
    $CreatedBy = $_POST['createdby'];

    $insertQuery = "INSERT INTO reviews (PackageID, Rate, Review, Created_by) VALUES (?, ?,?,?)";
    $stmt = mysqli_prepare($conn, $insertQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'iisi', $packageID, $Rate, $Review, $CreatedBy);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $response['status'] = true;
            $response['message'] = "Added Reviews Successfully";
        } else {
            $response['status'] = false;
            $response['message'] = "Added Reviews failed";
        }

        mysqli_stmt_close($stmt);
    } else {
        $response['status'] = false;
        $response['message'] = "Prepared statement failed";
        // Log the error for debugging
        error_log("Prepared statement failed: " . mysqli_error($conn));
    }
}
       
  

// Output the response as JSON
echo json_encode($response);
?>
