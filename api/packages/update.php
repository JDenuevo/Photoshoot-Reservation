<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();
if (checkToken($response)){
    session_start();
    $createdBy = $_SESSION['userid'];
    //$createdBy =$_POST['createdBy'];
    $packageID = $_POST['packageID'];
    $packageName = $_POST['packageName'];
    $pax = $_POST['pax'];
    $price = $_POST['price'];
    $description = $_POST['description'];

        $updateQuery = "update packages set  PackageName = ?, Pax = ? ,Price = ? , Description = ? , Created_by = ?  where PackageID = ?";
        $stmt = mysqli_prepare($conn, $updateQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'siisii',   $packageName, $pax, $price,$description,$createdBy, $packageID);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $response['status'] = true;
                $response['message'] = "Package successfully updated";
            } else {
                $response['status'] = false;
                $response['message'] = "Package update failed";
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
