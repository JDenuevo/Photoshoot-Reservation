<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();

    session_start();

    $status = $_POST['status'];
    $reservationID = $_POST['reservationID'];
    $link = $_POST['link'];

        $updateQuery = "update reservation set Status = ? , Link = ? where ReservationID = ?";
        $stmt = mysqli_prepare($conn, $updateQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'isi',   $status, $link, $reservationID);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $response['status'] = true;
                $response['message'] = "Reservation successfully updated";
            } else {
                $response['status'] = false;
                $response['message'] = "Reservation update failed";
            }

            mysqli_stmt_close($stmt);
        } 
echo json_encode($response);
?>
