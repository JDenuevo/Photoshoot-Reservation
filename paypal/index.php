<?php
include 'config.php';
include './PayPal.php';
$total = 150;
$paypal = new PayPal(PAYPAL_CLIENT_ID, PAYPAL_SECRET_ID);
$paymentResponse = $paypal->createPayment(150);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paypal Payment</title>
</head>
<body>
    <h1>Total: <?php echo $total?></h1>
<a href="<?php echo $paymentResponse->links[1]->href; ?>">Pay With  PayPal</a>
</body>
</html>