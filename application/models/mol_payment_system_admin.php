<?php

class mol_payment_system_admin extends CI_Model {
    public $get_email_name;
    public function __construct() {
        parent::__construct();
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
    
    public function get_all($id){
        $this->db->select('paper_detail_id');
        $this->db->from('paper_detail');
        $query = $this->db->get();
        $rows = $query->num_rows();
        return $rows;
    }
    
    public function get_public($id = array()){
        if(isset($id['paper_detail_id']) && trim($id['paper_detail_id'] != '')){
                $this->db->where('paper_detail_id', $id['paper_detail_id']);
        }
        $this->db->select('*');
        $this->db->from('paper_detail');
        $this->db->where('conferences_select_id',$this->conferences_now());
        $this->db->where("(paper_detail_status = 4 OR paper_detail_status = 5)");
        $query = $this->db->get();
                $rows = $query->num_rows();
                if($rows > 0){
                        for($i=0; $i < $rows; $i++){
                                $data[$i] = $query->row_array($i);
                        }
                }else{
                        $data = null;
                }
                return $data;
    }
    
    public function get_public2($id = array()){
        if(isset($id['paper_detail_id']) && trim($id['paper_detail_id'] != '')){
                $this->db->where('paper_detail_id', $id['paper_detail_id']);
        }
        $this->db->select('*');
        $this->db->from('paper_detail');
        $this->db->where('conferences_select_id',$this->conferences_now());
        $this->db->where('paper_detail_status','6');
        $query = $this->db->get();
                $rows = $query->num_rows();
                if($rows > 0){
                        for($i=0; $i < $rows; $i++){
                                $data[$i] = $query->row_array($i);
                        }
                }else{
                        $data = null;
                }
                return $data;
    }

    public function insert_upload($data){
        $this->db->insert('payment_system', $data);
        
        if($this->db->affected_rows() > 0)
        {
            // Code here after successful insert
            return TRUE; // to the controller
        }
        else{
            return FALSE;
        }
    }
    
    public function update_paper_detail_status($data,$paper_id){
        $this->db->trans_start();
        $this->db->where('paper_detail_id', $paper_id);
        $this->db->update('paper_detail', $data); 
        
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    
    public function get_one($id){
        $this->db->select('*');
        $this->db->from('paper_detail');
        $this->db->join('paper_detail_status', 'paper_detail_status.paper_detail_status_id = paper_detail.paper_detail_status','LEFT');
        $this->db->join('department', 'department.department_id = paper_detail.department_id','LEFT');
        $this->db->where('paper_detail.paper_detail_id', $id);
        return $this->db->get()->row();
    }

    public function get_payment_with_hash($id){
        $this->db->select('*');
        $this->db->where('paper_detail_id',$id );
        $this->db->join('payment_system_hash', 'payment_system_hash.payment_system_id = payment_system.payment_system_id','LEFT');
        $this->db->order_by("payment_system.payment_system_id","asc");
        return $this->db->get('payment_system');
    }
    
    public function getEmail_from_user($id){
        
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $id);
        return $this->db->get()->row();
        
    }
    
     public function updateFile_status($data,$file_id){
        
        $this->db->trans_start();
        $this->db->where('payment_system_id', $file_id);
        $this->db->update('payment_system', $data); 
        
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    public function updateFileDetail_status($data,$detail_id){

        $this->db->trans_start();
        $this->db->where('paper_detail_id', $detail_id);
        $this->db->update('payment_system', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    public function copyPaperToIndex($data){

        $this->db->insert('index_paper_file', $data);
        $last_id = $this->db->insert_id();
        return $last_id;

//        $this->db->trans_start();
//        $this->db->insert('index_paper_file', $data);
//
//        $this->db->trans_complete();
//
//        if ($this->db->trans_status() === FALSE)
//        {
//            return FALSE;
//        }
//        else{
//            return TRUE;
//        }
    }

    public function insert_file_index_hash($data)
    {
        $this->db->insert('paper_file_index_hash', $data);
        return $this->db->insert_id();
    }

    public function getOwner($id){
        $this->db->select('*');
        $this->db->from('paper_detail_owner');
        $this->db->where('paper_detail_id',$id);
        $data = $this->db->get()->result();
        return $data;
    }

    public function select_conference($id){
        $this->db->select('*');
        $this->db->from('conferences_select_on');
        $this->db->where('conferences_select_id',$id);
        $data = $this->db->get()->row();
        return $data;
    }

    public function getPayment_last($select_arr){

        $this->db->select('*');
        $this->db->from('payment_system');
        $this->db->where_in('payment_system.paper_detail_id',@$select_arr);
        $this->db->join('payment_system_hash', 'payment_system_hash.payment_system_id = payment_system.payment_system_id','LEFT');
        $this->db->order_by("payment_system.payment_system_id","desc");
        $this->db->limit(1);
        $query_reviewer = $this->db->get();
        $result_reviewer = array();

        foreach ($query_reviewer->result() as $obj_reviewer) {
            array_push($result_reviewer,$obj_reviewer);
        }

        return $result_reviewer;

    }

    public function getPaper_select($select_arr){

        $this->db->select('*');
        $this->db->from('paper_detail');
        $this->db->where_in('paper_detail_id',$select_arr);
        $query_reviewer = $this->db->get();
        $result_reviewer = array();

        foreach ($query_reviewer->result() as $obj_reviewer) {
            array_push($result_reviewer,$obj_reviewer);
        }

        return $result_reviewer;

    }

    public function sendingStatus_to_Email($email,$selected_status,$paper_detail_id){
        
        $message= /*-----------email body starts-----------*/
        'ถึงท่านผู้ใช้ , !
        <br>
        งานวิจัยที่ท่านส่ง เปลียนสถานะเป็น <strong>'.$selected_status.'</strong> <br>
        
        <br>            
        ท่านสามารถตรวจสอบสถานะของท่านได้จากลิงก์นี้:<br>
            
        ' . base_url() . 'payment_system/show_detail/'.$paper_detail_id.
        '<br><br>
            
        ขอขอบคุณ 
        <br>
        ทีมงาน NCTECHED';
		/*-----------email body ends-----------*/	
        
        

        $this->email->from($this->get_email_name, "NCTECHED SYSTEM");
        $this->email->to($email);
        //$this->email->cc("testcc@domainname.com");
        $this->email->subject("สถานะของสลิปจ่ายเงินมีการเปลี่ยนแปลง");
        //$this->email->message("ถึงผู้ใช้,<br>กรุณาคลิกที่ URL หรือคัดลอก URL ไปวางในเว็บเบราวน์เซอร์ของท่านเพื่อยืนยันอีเมล<br><br>" .base_url(). "verify/".$verificationText."<br>"."<br>ขอขอบคุณ<br>NCTECHED");
        $this->email->message($message);
        
        
        $data['message'] = "Sorry Unable to send email..."; 
        if($this->email->send()){     
        $data['message'] = "Mail sent...";   
        } 
        
    }
    
}
