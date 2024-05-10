<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
 $response = array();



        $userid = $_POST['userid'];
  
            $query = "SELECT p.PackageID, p.PackageName 
            FROM packages p
            LEFT JOIN reservation r ON p.PackageID = r.PackageID
            LEFT JOIN reviews rev ON rev.PackageID = p.PackageID
            WHERE r.Reserved_by = ? 
            AND r.Status = 2 ;
            ";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'i', $userid);
       

        // Execute the query
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $package = array();
            $result_set = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result_set)) {
                $package[] = $row;
            }

            $response['status'] = true;
            $response['package'] = $package;
        } else {
            $response['status'] = false;
            $response['message'] = "Failed to fetch reviews";
            error_log("Failed to fetch package: " . mysqli_error($conn));
        }

        mysqli_stmt_close($stmt);


// Output the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
