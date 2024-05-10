<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();

    session_start();

    $id = $_POST['id'];
    $status = $_POST['status'];

        $updateQuery = "update accounts set Status = ? where ID = ?";
        $stmt = mysqli_prepare($conn, $updateQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ii',   $status,$id);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $response['status'] = true;
                $response['message'] = "Account successfully updated";
            } else {
                $response['status'] = false;
                $response['message'] = "Account update failed";
            }

            mysqli_stmt_close($stmt);
        } 
echo json_encode($response);
?>
