<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
 $response = array();


  
            $query = "SELECT * from accounts";
            $stmt = mysqli_prepare($conn, $query);
       

        // Execute the query
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $account = array();
            $result_set = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result_set)) {
                $account[] = $row;
            }

            $response['status'] = true;
            $response['account'] = $account;
        } else {
            $response['status'] = false;
            $response['message'] = "Failed to fetch reviews";
            error_log("Failed to fetch account: " . mysqli_error($conn));
        }

        mysqli_stmt_close($stmt);


// Output the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
