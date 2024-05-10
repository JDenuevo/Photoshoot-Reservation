<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();


    $packageId = $_POST['packageID'];

        if ($packageId != null) {
            $query = "SELECT p.*,a.FirstName as CreatedName FROM packages p inner join accounts a on p.Created_by = a.ID WHERE PackageID = ? and p.Status = 1";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'i', $packageId);
        } else {
            $query = "SELECT p.*,a.FirstName as CreatedName FROM packages p inner join accounts a on p.Created_by = a.ID where p.status = 1";
            $stmt = mysqli_prepare($conn, $query);
        }
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
    

// Output the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
