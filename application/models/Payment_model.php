<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model{

    public function create($paymentID, $orderID, $amount, $currency, $status, $attemps = 0) {
        $data = array(
            'order_id'    => $orderID,
            'external_id' => $paymentID,
            'status'      => $status,
            'amount'      => $amount,
            'currency'    => $currency,
            'created_at'  => date('Y-m-d H:i:s'),
            'attemps'     => $attemps
        );
        
        $query = $this->db->get_where('ci_payments', array('external_id' => $paymentID));
        if (!$query->row_array()) {
            $this->db->insert('ci_payments', $data);
        }
        
        return true;
    }

    public function get_details($id) {
        $query = $this->db->get_where(
            'ci_payments', 
            array('external_id' => $id)
        );
        
        return $query->row_array();
    }
    
    public function close($paymentID, $status, $text = null){
        $data = array(
            'status'       => $status,
            'commited_at' => date('Y-m-d H:i:s'),
            'text' => $text
        );
        
        $this->db->where('external_id', $paymentID);
        
        $this->db->update('ci_payments', $data);
        
        return true;
    }
    
}

?>