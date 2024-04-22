<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();
session_start();
if (checkToken($response)){
 
        $addonsid = $_POST['addonsid'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $userid = $_SESSION['userid'];

        $insertQuery = "update addons set Name = ?, Price = ?, Description = ?,Created_by =? where AddonsID = ?";
        $stmt = mysqli_prepare($conn, $insertQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'sdsii',   $name,  $price, $description, $userid, $addonsid);
            $result = mysqli_stmt_execute($stmt);
            
            if ($result) {
                $response['status'] = true;
                $response['message'] = "AddOns successfully updated";
            } else {
                $response['status'] = false;
                $response['message'] = "AddOns update failed";
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
