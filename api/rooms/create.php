<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();

if (checkToken($response)){
    $roomName = $_POST['name'];
    $roomCapacity = $_POST['capacity'];

    $insertQuery = "INSERT INTO rooms (Name, Capacity) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $insertQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'si', $roomName, $roomCapacity);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $response['status'] = true;
            $response['message'] = "Added Room Successfully";
        } else {
            $response['status'] = false;
            $response['message'] = "Added Room failed";
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
