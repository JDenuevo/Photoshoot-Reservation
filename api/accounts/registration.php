<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();


    if (checkToken($response)) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = md5($_POST['pass']);
        $usertype = $_POST['usertype'];
  
        function generateToken($length = 32) {
            return bin2hex(random_bytes($length / 2));
        }
        $token = generateToken();
        $insertQuery = "INSERT INTO accounts (FirstName, LastName, Email, Password, UserType, Token) VALUES (?, ?, ?, ?, ?,?)";
        $stmt = mysqli_prepare($conn, $insertQuery);

        if ($stmt) {
            // Bind parameters and execute the statement
            mysqli_stmt_bind_param($stmt, 'sssss', $fname, $lname, $email, $password, $usertype,$token);
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
    } 

// Output the response as JSON
echo json_encode($response);
?>
