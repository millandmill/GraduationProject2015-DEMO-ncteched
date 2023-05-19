<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of send_mail
 *
 * @author kong
 */
class SendEmail extends CI_Controller {
    public $get_email_name;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('email'); // load the library
    }

    function index(){
        $this->sendEmail();  
    }

    public function sendEmail(){   
        
        $this->load->database();
        $this->db->select('*'); 
        $this->db->where('email_system_id','1' ); $q_email_system = $this->db->get('email_system');
        $data_email_system = array_shift($q_email_system->result_array()); 
        $protocol = $data_email_system['protocol']; $smtp_host = $data_email_system['smtp_host'];
        $smtp_port = $data_email_system['smtp_port']; $smtp_user = $data_email_system['smtp_user'];
        $smtp_pass = $data_email_system['smtp_pass']; $charset = $data_email_system['charset'];
        $mailtype = $data_email_system['mailtype'];
        $this->load->library('email');
        $config['protocol'] = $protocol;
        $config['smtp_host'] = $smtp_host;
        $config['smtp_port'] = $smtp_port;
        $config['smtp_user'] = $smtp_user; 
        $config['smtp_pass'] = $smtp_pass;
        $config['charset'] = $charset;
        $config['mailtype'] = $mailtype;
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
        $this->get_email_name = $smtp_user;

        $this->email->from($this->get_email_name, "NCTECHED SYSTEM");
        $this->email->to("kong555.01@gmail.com");
        //$this->email->cc("testcc@domainname.com");
        $this->email->subject("Test Systems Send E-Mail");
        $this->email->message("Mail sent test message...");

        $data['message'] = "Sorry Unable to send email..."; 
        if($this->email->send()){     
        $data['message'] = "Mail sent...";   
        } 

        // forward to index page
        $this->load->view('email/index', $data);  
    }
    
    
    
    
}
