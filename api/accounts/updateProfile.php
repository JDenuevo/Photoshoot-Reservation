<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();

    session_start();

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $userid = $_POST['userid'];

        $updateQuery = "update accounts set FirstName = ? , LastName = ? , Email = ? where ID = ?";
        $stmt = mysqli_prepare($conn, $updateQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'sssi',   $firstname, $lastname, $email,  $userid);
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
