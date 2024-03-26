<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
 $response = array();


if (checkToken($response)){

        $reviewID = $_POST['reviewID'];
        if ($reviewID != null) {
            // Fetch room by ID if room ID is provided
            $query = "SELECT * FROM reviews WHERE ReviewID = ? and Status = 1";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'i', $reviewID);
        } else {
            // Fetch all rooms if room ID is not provided
            $query = "SELECT * FROM reviews";
            $stmt = mysqli_prepare($conn, $query);
        }

        // Execute the query
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $rate = array();
            $result_set = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result_set)) {
                $rate[] = $row;
            }

            $response['status'] = true;
            $response['rooms'] = $rate;
        } else {
            $response['status'] = false;
            $response['message'] = "Failed to fetch reviews";
            error_log("Failed to fetch rooms: " . mysqli_error($conn));
        }

        mysqli_stmt_close($stmt);
}

// Output the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
