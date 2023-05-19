<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mol_payment_system
 *
 * @author kong
 */
class mol_payment_system extends CI_Model
{
    public $get_email_name;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db->select('*');
        $this->db->where('email_system_id', '1');
        $q_email_system = $this->db->get('email_system');
        $data_email_system = array_shift($q_email_system->result_array());
        $protocol = $data_email_system['protocol'];
        $smtp_host = $data_email_system['smtp_host'];
        $smtp_port = $data_email_system['smtp_port'];
        $smtp_user = $data_email_system['smtp_user'];
        $smtp_pass = $data_email_system['smtp_pass'];
        $charset = $data_email_system['charset'];
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
    }
    
    function conferences_now()
    {
        $conferences_on ="";
        $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
        foreach ($query1112->result() as $data){
            $conferences_on  = $data->conferences_select_on;
        }
        return $conferences_on;
    }
    
    public function get_all($id)
    {
        $this->db->select('paper_detail_id');
        $this->db->from('paper_detail');
        $query = $this->db->get();
        $rows = $query->num_rows();
        return $rows;
    }

    public function get_public($id = array())
    {
        if (isset($id['paper_detail_id']) && trim($id['paper_detail_id'] != '')) {
            $this->db->where('paper_detail_id', $id['paper_detail_id']);
        }
        $this->db->select('*');
        $this->db->from('paper_detail');
        $this->db->where('user_id', $id['user_id']);
        $this->db->where('conferences_select_id', $this->conferences_now());
        $this->db->where("(paper_detail_status = 4 OR paper_detail_status = 5)");
        $query = $this->db->get();
        $rows = $query->num_rows();
        if ($rows > 0) {
            for ($i = 0; $i < $rows; $i++) {
                $data[$i] = $query->row_array($i);
            }
        } else {
            $data = null;
        }
        return $data;
    }

    public function insert_upload($data)
    {
        $this->db->insert('payment_system', $data);
        $last_id = $this->db->insert_id();
        return $last_id;

//        if($this->db->affected_rows() > 0)
//        {
//            // Code here after successful insert
//            return TRUE; // to the controller
//        }
//        else{
//            return FALSE;
//        }
    }

    public function insert_file_hash($data)
    {
        $this->db->insert('payment_system_hash', $data);
        return $this->db->insert_id();
    }

    public function update()
    {

    }

    public function get_one($id)
    {
        $this->db->select('*');
        $this->db->from('paper_detail');
        $this->db->join('paper_detail_status', 'paper_detail_status.paper_detail_status_id = paper_detail.paper_detail_status', 'LEFT');
        $this->db->where('paper_detail_id', $id);
        return $this->db->get()->row();
    }

    public function get_payment_with_hash($id)
    {
        $this->db->select('*');
        $this->db->where('paper_detail_id', $id);
        $this->db->join('payment_system_hash', 'payment_system_hash.payment_system_id = payment_system.payment_system_id', 'LEFT');
        $this->db->order_by("payment_system.payment_system_id", "asc");
        return $this->db->get('payment_system');
    }

    public function getEmail_from_user($id)
    {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $id);
        return $this->db->get()->row();

    }

//    public function sending_status($email, $data)
//    {
//        $message = /*-----------email body starts-----------*/
//            'ถึงท่านผู้ใช้ , !
//        <br>
//        ขณะนี้ ท่านได้อัปโหลด สลิปจ่ายเงิน ซึ่งตอนนี้ได้อยู่ในสถานะ <strong>' . $data['payment_system_status'] . '</strong><br>
//
//        <br>
//        กรุณารอการตรวจสอบจากเจ้าหน้าที่<br>
//
//        <br>
//
//
//        ขอขอบคุณ
//        <br>
//        ทีมงาน NCTECHED';
//        /*-----------email body ends-----------*/
//
//
//        $this->email->from($this->get_email_name, "NCTECHED SYSTEM");
//        $this->email->to($email);
//        //$this->email->cc("testcc@domainname.com");
//        $this->email->subject("การตรวจสอบสลิปจ่ายเงิน");
//        $this->email->message($message);
//
//        //$data['message'] = "Sorry Unable to send email...";
//        //if($this->email->send()){
//        //$data['message'] = "Mail sent...";
//        //}
//        $this->email->send();
//        return $this->email->print_debugger();
//    }
}
