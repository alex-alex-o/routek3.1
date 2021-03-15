<?php

class Payment {
    
    private $token;
    private $storeID;
    private $payment;
    private $returnUrl;
    
    function __construct()
    {
    }

    public function setCredentials($token, $storeID, $returnUrl)
    {
        $this->token     = $token;
        $this->storeID   = $storeID;
        $this->returnUrl = $returnUrl;
    }
   
    private function curlPost($url, $fields, $headers = array()) {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1);

        if ($fields) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }
        
        $headers[] = "Content-Type: application/json"; 
        
        curl_setopt($ch, CURLOPT_USERPWD, $this->storeID . ":" . $this->token);
        
        if ($headers) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        
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
    
    public function addWebhook($url) {
        $headers[] = "Idempotence-Key: payment.succeeded";
        
        $webhook = new stdClass();
        $webhook->event = "payment.succeeded";
        $webhook->url   = $url;
        
        $result = json_decode(
            $this->curlPost("https://payment.yandex.net/api/v3/webhooks", 
                json_encode($webhook), 
                $headers
            )
        );
        
        return $result;
    }

    public function getWebhooks() {
        $result = json_decode(
            $this->curlPost("https://payment.yandex.net/api/v3/webhooks", 
                null, 
                null
            )
        );
        
        return $result;
    }
    
    public function createPayment($orderID, $cost, $currency, $description = null, $attempt = null) {
        $headers[] = "Idempotence-Key: " . $orderID . isset($attempt) ? : "." . $attempt . "";
        
        $amount           = new stdClass();
        $amount->value    = $cost;
        $amount->currency = $currency;
        
        $confirmation             = new stdClass();
        $confirmation->type       = "redirect";
        $confirmation->return_url = $this->returnUrl;
        
        $metadata = new stdClass();
        $metadata->order_id = $orderID;
        
        $payment = new stdClass();
        $payment->amount       = $amount;
        $payment->confirmation = $confirmation;
        $payment->description  = empty($description) ? $orderID : $description;
        $payment->capture      = true;
        $payment->metadata     = $metadata;
        
        $result = json_decode(
            $this->curlPost("https://payment.yandex.net/api/v3/payments", 
                json_encode($payment), 
                $headers
            )
        );
        
        if (!empty($result)) {
            $this->payment = $result;
            return $result;
        }
        
        return null;
    }
    
    public function pay() {
        if ($this->payment->status == "pending" && isset($this->payment->confirmation->confirmation_url)) {
            redirect($this->payment->confirmation->confirmation_url);
        }
    }
   
    public function refund() {
        
    }
    
    public function confirmation() {
        
    }
}
