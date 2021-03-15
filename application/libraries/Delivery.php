<?php

class Delivery {
    
    private $token;
    private $user;
    private $pass;
    
    function __construct()
    {
    }

    public function setCredentials($token, $user, $pass) {
        $this->token = $token;
        $this->user  = $user;
        $this->pass  = $pass;
    }
   
    private function curlPost($url, $fields, $headers = array()) {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1);

        if ($fields) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }
        
        $headers[] = "Content-Type: application/json"; 
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        
        $result = curl_exec($ch); 

        return $result;
    }
    
    public function getSessionID() {
        $request = new stdClass();
        $request->appKey    = $this->token;
        $request->login     = $this->user;
        $request->password  = $this->pass;
        
        $result = json_decode(
            $this->curlPost("https://api.dellin.ru/v1/customers/login.json", 
                json_encode($request), 
                array()
            )
        );
        
        if (isset($result->sessionID)) {
            return $result->sessionID;
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
