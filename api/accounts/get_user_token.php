<?php
include('../inc/config.php');


session_start();

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userid = $_SESSION['ID'];

    $query = "SELECT * FROM accounts WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    

        $response['status'] = true;
        $response['token'] = md5($row['Token']);
    } else {
        $response['status'] = false;

    }
} else {
    $response['status'] = false;
   
}

header('Content-Type: application/json');
echo json_encode($response);
?>
