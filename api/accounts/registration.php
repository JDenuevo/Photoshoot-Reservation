<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();


        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = md5($_POST['pass']);

  
        $insertQuery = "INSERT INTO accounts (FirstName, LastName, Email, Password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertQuery);

        if ($stmt) {
            // Bind parameters and execute the statement
            mysqli_stmt_bind_param($stmt, 'ssss', $fname, $lname, $email, $password);
            $result = mysqli_stmt_execute($stmt);

            
            if ($result) {
                $response['status'] = true;
                $response['message'] = "Registration successful";
            } else {
                $response['status'] = false;
                $response['message'] = "Registration failed";
            }

            mysqli_stmt_close($stmt);
        } else {
            $response['status'] = false;
            $response['message'] = "Prepared statement failed";
            // Log the error for debugging
            error_log("Prepared statement failed: " . mysqli_error($conn));
        }
    

// Output the response as JSON
echo json_encode($response);
?>
