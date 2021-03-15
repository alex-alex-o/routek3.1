<?php

class Notifications
{
    private $instance;
    private $notifications;

    function __construct()
    {
        $this->instance  = &get_instance();
        $this->instance->load->library('email');
        
        $sql   = "SELECT id, subject, body FROM ci_notification_templates";
        $query = $this->instance->db->query($sql);
        foreach($query->result_array() as $notification) {
            $this->notifications[$notification["id"]] = array(
                "subject" => $notification["subject"],
                "body"    => $notification["body"]
            );
        }
    }
    
    function send($notificationID, $params) {

        $subject = $this->notifications[$notificationID]["subject"];
        $body    = $this->notifications[$notificationID]["body"];
       
        foreach ($params as $key => $param) {
            $subject = str_replace($key, $param, $subject);
            $body    = str_replace($key, $param, $body);
        }
        
        $this->instance->load->library("email");
        
        $config = $this->instance->config->item('mail_config');
        if ($config === null) {
            $config['charset']  = 'utf-8';
            $config['wordWrap'] = true;
            $config['mailtype'] = "html";
            $config['sender_email'] = "support@routek.tech";
            $config['sender_name'] = "Команда Routek";        
        }

        $this->instance->email->initialize($config);
        
        
        $this->instance->email->from($config['sender_email'], $config['sender_name']);
        $this->instance->email->to($params["[user_email]"]);
        $this->instance->email->subject($subject);
        $this->instance->email->message($body);
        
        return $this->instance->email->send();        
    }
}

