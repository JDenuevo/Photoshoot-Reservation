<?php
// Assuming you have already established a database connection
include('../../inc/config.php');
// Check if selectedDate is set and not empty
if (isset($_POST['selectedDate']) && !empty($_POST['selectedDate'])) {
    $selectedDate = $_POST['selectedDate'];

    // Escape the date to prevent SQL injection
    $selectedDate = mysqli_real_escape_string($conn, $selectedDate);

    // Query to select distinct times for the selected date
    $sql = "SELECT Time FROM timeslot
    WHERE Time NOT IN (
        SELECT DISTINCT Time 
        FROM reservation 
        WHERE Date = '$selectedDate'
    );
    ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $availableTimes = array();

        // Fetch each row and add the time to the available times array
        while ($row = mysqli_fetch_assoc($result)) {
            $timeOccupied[] = $row['Time'];
        }

        // Return JSON response with available times
        echo json_encode(array('status' => true, 'timeOccupied' => $timeOccupied));
        exit;
    } else {
        // Error in query
        echo json_encode(array('status' => false, 'message' => 'Error in database query'));
        exit;
    }
} else {
    // selectedDate parameter is not set or empty
    echo json_encode(array('status' => false, 'message' => 'selectedDate parameter is missing'));
    exit;
}
?>
