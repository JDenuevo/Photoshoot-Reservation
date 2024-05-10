<?php
include('../../inc/config.php');
include('../../php/checkToken.php');

// Check if the email parameter is set and not empty
if (isset($_POST['email']) && !empty($_POST['email'])) {
    $response = array();

    $email = $_POST['email'];

    $query = "SELECT * FROM accounts WHERE Email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $email);

    // Execute the query
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $emailData = array();
        $result_set = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result_set)) {
            $emailData[] = $row;
        }

        // Check if any rows were returned
        if (!empty($emailData)) {
            $response['status'] = true;
            $response['email'] = $emailData;
        } else {
            // Email does not exist
            $response['status'] = false;
            $response['message'] = "Email does not exist";
        }
    } else {
        // Database query failed
        $response['status'] = false;
        $response['message'] = "Failed to fetch email";
        error_log("Failed to fetch email: " . mysqli_error($conn));
    }

    mysqli_stmt_close($stmt);
} else {
    // Email parameter is missing or empty
    $response['status'] = false;
    $response['message'] = "Email parameter is missing or empty";
}

// Output the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
