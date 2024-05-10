<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
session_start();
$response = array();


    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM accounts WHERE Email = ? AND Password = ? and Status = 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    
        $_SESSION['userid']=$row['ID'];
        $response['userid']=$row['ID'];
        $response['userFirstname']=$row['FirstName'];
        $response['userLastname']=$row['LastName'];
        $response['userid']=$row['ID'];
        $response['usertype']=$row['UserType'];
        $response['email']=$row['Email'];
        $response['status'] = true;
        $response['message'] = "Login successful";

        
    } else {
        $response['status'] = false;
        $response['message'] = "Your credentials doesn't match.";
    }


header('Content-Type: application/json');
echo json_encode($response);
?>
