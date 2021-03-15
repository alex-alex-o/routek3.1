<?php

class YandexPayment {
    
    private $token;
    private $storeID;

    
    function __construct()
    {
    }

    public function setCredentials($token, $storeID)
    {
        $this->token   = $token;
        $this->storeID = $storeID;
    }
   
    private function curlPost($url, $fields, $headers = array()) {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

        $headers[] = "Content-Type: application/json"; 
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        
        $result = curl_exec($ch); 

        return $result;
    }
    
    private function curlGet($url) {
         //Initiate cURL.
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); 
        
        return $result;
    }    
    
    
    public function pay($orderID, $cost, $currency) {
        $encodedAuth = base64_encode($this->stoteID . ':' . $this->token);
        
        $headers[] = "Idempotence-Key: $orderID";
        $headers[] = "Authorization: 'Basic ' . $encodedAuth";
        
        $amount           = new stdClass();
        $amount->value    = $cost;
        $amount->currency = $currency;
        
        $confirmation             = new stdClass();
        $confirmation->type       = "redirect";
        $confirmation->return_url = "https://www.routek.xyz/orders/index";
        
        $metadata = new stdClass();
        $metadata->order_id = $orderID;
        
        $payment = new stdClass();
        $payment->amount       = $amount;
        $payment->confirmation =  $confirmation;
        $payment->description  = "Заказ " . $orderID;
        $payment->capture      = true;
        $payment->metadata     = $metadata;
        
        $result = $this->curlPost("https://payment.yandex.net/api/v3/payments", 
            json_encode($payment), 
            $headers
        );
                
        return $result;
    }
    
    public function refund() {
        
    }
}
