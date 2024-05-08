<?php 

    class PayPal{
        private $clientId;
        private $clientSecretId;
        private $apiEndPoint = PAYPAL_API;

        function __construct($clientId, $clientSecretId){
            $this->clientId= $clientId;
            $this->clientSecretId = $clientSecretId;
        }
        function createPayment($amount){
            $ch =curl_init();
            $apiUrl = $this->apiEndPoint .'payments/payment';
            $headers = array(
                'Content-Type: application/json',
                'Authorization: Basic '.base64_encode($this->clientId.':'.$this->clientSecretId)
            );
            $postData=array(
                'intent'=>'sale',
                'payer'=>array(
                    'payment_method'=>'paypal'
                ),
                'transactions'=>array(
                    array(
                        'amount'=> array(
                            'total'=>$amount,
                            'currency'=>'PHP'
                        ),
                        'description'=>'Jomaddar IT Paypal Payment',
                    )
                    ),
                    'redirect_urls'=>array(
                        'return_url'=>APP_URL.'/success.php',
                        'cancel_url'=>APP_URL.'/cancel.php'
                    )
            );

            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($postData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            
            curl_close($ch);
            $res =  json_decode($response);
            
            return $res;

            
        }
        function executePayment($paymentId, $PayerID ){
            $ch =curl_init();
            $apiUrl = $this->apiEndPoint .'payments/payment/'.$paymentId.'/execute';
            $headers = array(
                'Content-Type: application/json',
                'Authorization: Basic '.base64_encode($this->clientId.':'.$this->clientSecretId)
            );
            $postData=array(
                'payer_id'=>$PayerID
               );

            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($postData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
             print_r($response);
            curl_close($ch);
            $res =  json_decode($response);
            
            return $res;
            
        }
    }

?>