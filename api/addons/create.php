<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();
session_start();
if (checkToken($response)){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $createdby = $_SESSION['userid'];

    $insertQuery = "INSERT INTO addons (Name, Price, Description, Created_by) VALUES (?, ?,?,?)";
    $stmt = mysqli_prepare($conn, $insertQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sdsi', $name, $price, $description, $createdby);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $response['status'] = true;
            $response['message'] = "Added AddOns Successfully";
        } else {
            $response['status'] = false;
            $response['message'] = "Added AddOns failed";
        }

        mysqli_stmt_close($stmt);
    } else {
        $response['status'] = false;
        $response['message'] = "Prepared statement failed";
        // Log the error for debugging
        error_log("Prepared statement failed: " . mysqli_error($conn));
    }
}
       
  

// Output the response as JSON
echo json_encode($response);
?>
