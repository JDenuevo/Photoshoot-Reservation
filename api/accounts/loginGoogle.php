<?php
include('../../inc/config.php');

// Get the POST data
$email = $_POST['email'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];

// Initialize response array
$response = array();

// Check if the email exists in the database
$query = "SELECT * FROM accounts WHERE Email = '$email'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Email exists, fetch the row and prepare response
    $row = $result->fetch_assoc();
    $response['userid'] = $row['ID'];
    $response['status'] = true;
    $response['message'] = "Login successful";
} else {
    // Email does not exist, insert into database and then log in
    $insertQuery = "INSERT INTO accounts (Email, FirstName, LastName) VALUES ('$email', '$firstName', '$lastName')";
    if ($conn->query($insertQuery) === TRUE) {
        // Get the ID of the newly inserted row
        $userid = $conn->insert_id;
        $response['userid'] = $userid;
        $response['status'] = true;
        $response['message'] = "Account created and logged in";
    } else {
        $response['status'] = false;
        $response['message'] = "Error: " . $conn->error;
    }
}

// Output response as JSON
echo json_encode($response);

$conn->close();
?>
