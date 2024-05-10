<?php
include('../../inc/config.php');
$response = array();

session_start();
$query = "SELECT COUNT(*) AS count FROM reservation WHERE Status = 0";
$stmt = mysqli_prepare($conn, $query);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    $result_set = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result_set);
    $count = $row['count'];
    
    echo ($count > 0) ? $count : 0;
} else {
    echo 0; // Error occurred or no reservations found
}

mysqli_stmt_close($stmt);
?>
