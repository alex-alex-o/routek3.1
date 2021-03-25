<?php 

class Curl {
    
    function __construct()
    {
    }

  
    public function curlPost($url, $fields, $headers = array()) {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

        $headers[] = "Content-Type: application/json"; 
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        
        $result = curl_exec($ch); 

        return $result;
    }
    
    public function curlGet($url) {
         //Initiate cURL.
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); 
        
        return $result;
    }    
}

?>