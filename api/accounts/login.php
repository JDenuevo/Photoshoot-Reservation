<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
session_start();
$response = array();

if (checkToken($response)) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM accounts WHERE Email = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    
        $_SESSION['ID']=$row['ID'];
        $_SESSION['token']=$row['Token'];
        $response['status'] = true;
        $response['message'] = "Login successful";
    } else {
        $response['status'] = false;
        $response['message'] = "Login failed";
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
