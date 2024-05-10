<?php
// Assuming you have already established a database connection
include('../../inc/config.php');

// Query to select distinct times for the selected date
$sql = "SELECT Date, Time, ADDTIME(Time, '00:30:00') AS `to` FROM reservation where Status in (0,1)";

$result = mysqli_query($conn, $sql);

if ($result) {
    $datetimeOccupied = array();

    // Fetch each row and add the time to the available times array
    while ($row = mysqli_fetch_assoc($result)) {
        // Format the datetimeOccupied array differently
        $datetimeOccupied[] = array(
            'start' => $row['Date'] . 'T' . $row['Time'],
            'end' => $row['Date'] . 'T' . $row['to']
        );
    }
    $response['datetimeOccupied'] = $datetimeOccupied;

   
} else {
    // Error in query
    echo json_encode(array('status' => false, 'message' => 'Error in database query'));
    exit;
}
header('Content-Type: application/json');
echo json_encode($response);
?>
