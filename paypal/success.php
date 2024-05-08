<?php
 include 'config.php';
 include './PayPal.php';

if(isset($_GET['paymentId']) && $_GET['paymentId']){
   

    $paypal = new PayPal(PAYPAL_CLIENT_ID, PAYPAL_SECRET_ID);
    $paymentResponse = $paypal->executePayment($_GET['paymentId'], $_GET['PayerID']);
    //here you can insert data in your database 
}


?>