<?php
include('../../inc/config.php');
include('../../php/checkToken.php');
$response = array();
$reservedby = $_POST['reservedby'];
if ($reservedby != null){
    $query = "SELECT CONCAT(a.FirstName ,' ', a.LastName) AS reserved_by,p.Pax,p.Price,p.Description,p.PackageName,r.Date,r.Time,r.Created_at As reserved_date,r.Status,r.ReservationID,r.Date,r.Time,r.Link,
    IFNULL((SELECT SUM(Amount) FROM payment WHERE ReservationID = r.ReservationID), 0) AS total_amount_pay,
    (SELECT Price FROM packages WHERE PackageID = p.PackageID) AS total_price,
    CASE 
        WHEN (SELECT SUM(Amount) FROM payment WHERE ReservationID = r.ReservationID) IS NULL THEN 'Incomplete'
        WHEN (SELECT SUM(Amount) FROM payment WHERE ReservationID = r.ReservationID) < (SELECT Price FROM packages WHERE PackageID = p.PackageID) THEN 'Downpayment'
        WHEN (SELECT SUM(Amount) FROM payment WHERE ReservationID = r.ReservationID) = (SELECT Price FROM packages WHERE PackageID = p.PackageID) THEN 'Complete'
    END AS payment_status
FROM reservation r 
INNER JOIN accounts a ON a.ID = r.Reserved_by
INNER JOIN packages p ON p.PackageID = r.PackageID where r.Status IN (1,2) and r.reserved_by = '$reservedby'";
}else{
    $query = "SELECT CONCAT(a.FirstName ,' ', a.LastName) AS reserved_by,p.Pax,p.Price,p.Description,p.PackageName,r.Date,r.Time,r.Created_at As reserved_date,r.Status,r.ReservationID,r.Date,r.Time,
    IFNULL((SELECT SUM(Amount) FROM payment WHERE ReservationID = r.ReservationID), 0) AS total_amount_pay,
    (SELECT Price FROM packages WHERE PackageID = p.PackageID) AS total_price,
    CASE 
        WHEN (SELECT SUM(Amount) FROM payment WHERE ReservationID = r.ReservationID) IS NULL THEN 'Incomplete'
        WHEN (SELECT SUM(Amount) FROM payment WHERE ReservationID = r.ReservationID) < (SELECT Price FROM packages WHERE PackageID = p.PackageID) THEN 'Downpayment'
        WHEN (SELECT SUM(Amount) FROM payment WHERE ReservationID = r.ReservationID) = (SELECT Price FROM packages WHERE PackageID = p.PackageID) THEN 'Complete'
    END AS payment_status
FROM reservation r 
INNER JOIN accounts a ON a.ID = r.Reserved_by
INNER JOIN packages p ON p.PackageID = r.PackageID";
}
          
            $stmt = mysqli_prepare($conn, $query);
        
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $reservation = array();
            $result_set = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result_set)) {
                $reservation[] = $row;
            }

            $response['status'] = true;
            $response['reservation'] = $reservation;
        } else {
            $response['status'] = false;
            $response['message'] = "Failed to fetch reservation";
            error_log("Failed to fetch packages: " . mysqli_error($conn));
        }

        mysqli_stmt_close($stmt);

header('Content-Type: application/json');
echo json_encode($response);
?>
