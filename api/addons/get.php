<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();

    $addonsId = $_POST['id'];

    if (checkToken($response)) {
        if ($addonsId != null) {
            $query = "SELECT a.*,ac.FirstName as CreatedName FROM addons a inner join accounts ac on a.Created_by = ac.ID WHERE a.AddonsID = ? and a.Status = 1";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'i', $addonsId);
        } else {
  
            $query = "SELECT a.*,ac.FirstName as CreatedName FROM addons a inner join accounts ac on a.Created_by = ac.ID where a.status = 1";
            $stmt = mysqli_prepare($conn, $query);
        }

        // Execute the query
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $addons = array();
            $result_set = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result_set)) {
                $addons[] = $row;
            }

            $response['status'] = true;
            $response['addons'] = $addons;
        } else {
            $response['status'] = false;
            $response['message'] = "Failed to fetch packages";
            error_log("Failed to fetch addons: " . mysqli_error($conn));
        }

        mysqli_stmt_close($stmt);
    } 

header('Content-Type: application/json');
echo json_encode($response);
?>
