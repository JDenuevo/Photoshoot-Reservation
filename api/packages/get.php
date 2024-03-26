<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();


    $packageId = $_POST['packageID'];

    if (checkToken($response)) {
        if ($packageId != null) {
            // Fetch package by ID if package ID is provided
            $query = "SELECT * FROM packages WHERE PackageID = ? and Status = 1";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'i', $packageId);
        } else {
            // Fetch all packages if package ID is not provided
            $query = "SELECT * FROM packages";
            $stmt = mysqli_prepare($conn, $query);
        }

        // Execute the query
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $packages = array();
            $result_set = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result_set)) {
                $packages[] = $row;
            }

            $response['status'] = true;
            $response['packages'] = $packages;
        } else {
            $response['status'] = false;
            $response['message'] = "Failed to fetch packages";
            error_log("Failed to fetch packages: " . mysqli_error($conn));
        }

        mysqli_stmt_close($stmt);
    } 

// Output the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
