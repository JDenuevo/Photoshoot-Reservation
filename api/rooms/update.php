<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();
if (checkToken($response)){
    $token = $_POST['token'];
        $roomid = $_POST['roomid'];
        $name = $_POST['name'];
        $capacity = $_POST['capacity'];

        $insertQuery = "update rooms set Name = ?, Capacity = ? where RoomID = ?";
        $stmt = mysqli_prepare($conn, $insertQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'sii',   $name,  $capacity, $roomid);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $response['status'] = true;
                $response['message'] = "Room successfully updated";
            } else {
                $response['status'] = false;
                $response['message'] = "Room update failed";
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
