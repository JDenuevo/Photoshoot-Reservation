<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();

    if (checkToken($response)) {

        session_start();
        //$createdBy = $_SESSION['userid'];
        $createdBy =$_POST['createdBy'];

        $roomID = $_POST['roomID'];
        $packageName = $_POST['packageName'];
        $pax = $_POST['pax'];
        $price = $_POST['price'];
        $timeLimit = $_POST['timeLimit'];
        $description = $_POST['description'];

        
        // Prepare and execute the SQL query
        $insertQuery = "INSERT INTO packages (RoomID, PackageName, Pax, Price, TimeLimit, Description, Created_by) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'isidisii', $roomID, $packageName, $pax, $price, $timeLimit, $description, $createdBy);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $response['status'] = true;
                $response['message'] = "Added Room Successfully";
            } else {
                $response['status'] = false;
                $response['message'] = "Failed to add room";
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
header('Content-Type: application/json');
echo json_encode($response);
?>
