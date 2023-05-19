<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mol_paper_with_admin
 *
 * @author kong
 */
class mol_paper_with_admin extends CI_Model
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

    public function get_all($quotation)
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
        if (isset($id['paper_detail_status']) && trim($id['paper_detail_status'] != '')) {
            $this->db->where('paper_detail_status', $id['paper_detail_status']);
        }
        $this->db->select('*');
        $this->db->from('paper_detail');
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

    public function get_paper_checked($id = array())
    {
        if (isset($id['paper_detail_id']) && trim($id['paper_detail_id'] != '')) {
            $this->db->where('paper_detail.paper_detail_id', $id['paper_detail_id']);
        }
        if (isset($id['paper_detail_status']) && trim($id['paper_detail_status'] != '')) {
            $this->db->where('paper_detail.paper_detail_status', $id['paper_detail_status']);
        }
        if (isset($id['paper_detail_status_start']) && trim($id['paper_detail_status_start'] != '')) {
            $this->db->where('paper_detail.paper_detail_status >=', $id['paper_detail_status_start']);
        }
        if (isset($id['paper_detail_status_end']) && trim($id['paper_detail_status_end'] != '')) {
            $this->db->where('paper_detail.paper_detail_status <=', $id['paper_detail_status_end']);
        }
        if (isset($id['paper_file_status']) && trim($id['paper_file_status'] != '')) {
            $this->db->where('paper_file.paper_file_status', $id['paper_file_status']);
        }
        if (isset($id['paper_file_flg']) && trim($id['paper_file_flg'] != '')) {
            $this->db->where('paper_file.paper_file_flg', $id['paper_file_flg']);
        }
        if(isset($id['conferences_select_id']) && trim($id['conferences_select_id'] != '')){
            $this->db->where('conferences_select_id '.$id['operate'], $id['conferences_select_id']);
        }

        $select_paper_file = '
            paper_file.paper_file_id,
            paper_file.paper_file_name,
            paper_file.paper_file_show,
            paper_file.paper_file_name_hash,
            paper_file.paper_file_year_dir,
            paper_file.paper_file_type,
            paper_file.paper_file_format_status,
            paper_file.paper_file_printcount,
            paper_file.paper_file_datetime,
            paper_file.paper_file_comment1,
            paper_file.paper_file_comment2,
            paper_file.paper_file_comment3,
            paper_file.paper_file_ip,
            paper_file.user_id,
            paper_file.paper_file_owner_comment1_status,
            paper_file.paper_file_owner_comment2_status,
            paper_file.paper_file_owner_comment3_status,
            paper_file.paper_file_status,
            paper_file.paper_file_flg,
        ';

        $this->db->select('paper_detail.*,'.$select_paper_file);
        //$this->db->select("'paper_detail.*,'paper_file.*'");
        $this->db->from('paper_detail');
        $this->db->where('conferences_select_id',$this->conferences_now());
        $this->db->join('paper_file', 'paper_file.paper_file_id = paper_detail.paper_last_file_id', 'LEFT');
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

    public function get_one($id)
    {
        $this->db->select('*');
        $this->db->from('paper_detail');
        $this->db->join('department', 'department.department_id = paper_detail.department_id', 'LEFT');
        $this->db->join('paper_detail_status', 'paper_detail_status.paper_detail_status_id = paper_detail.paper_detail_status', 'LEFT');
        $this->db->where('paper_detail.paper_detail_id', $id);
        return $this->db->get()->row();
    }

    public function create($data)
    {
        $this->db->insert('paper_detail', $data);
    }

    public function update($data)
    {
        if (isset($data['paper_detail_id']) && trim($data['paper_detail_id'] != '')) {
            $this->db->where('paper_detail_id', $data['paper_detail_id']);
        }
        return $this->db->update('paper_detail', $data);
    }

    public function update_status_file($data)
    {
        if (isset($data['paper_file_id']) && trim($data['paper_file_id'] != '')) {
            $this->db->where('paper_file_id', $data['paper_file_id']);
        }
        return $this->db->update('paper_file', $data);
    }

    public function check_reviewer($data)
    {
        $this->db->where('paper_detail_id', $data);
        $query = $this->db->get('paper_reviewer');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update_reviewer($data)
    {
        if (isset($data['paper_detail_id']) && trim($data['paper_detail_id'] != '')) {
            $this->db->where('paper_detail_id', $data['paper_detail_id']);
        }
        return $this->db->update('paper_reviewer', $data);
    }

    public function insert_reviewer($data)
    {
        $this->db->insert('paper_reviewer', $data);
    }

    public function updateFile_status($data, $file_id)
    {

        $this->db->trans_start();
        $this->db->where('paper_file_id', $file_id);
        $this->db->update('paper_file', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function getPaper_status($id)
    {
        $this->db->select('*');
        $this->db->from('paper_detail_status');
        $this->db->where('paper_detail_status_id', $id);
        return $this->db->get()->row();
    }

    public function update_paper_status($data)
    {
        if (isset($data['paper_detail_id']) && trim($data['paper_detail_id'] != '')) {
            $this->db->where('paper_detail_id', $data['paper_detail_id']);
        }
        $query = $this->db->update('paper_detail', $data);
    }


    public function getEmail_from_user($id)
    {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $id);
        return $this->db->get()->row();

    }

    public function getUser_committee($department_name)
    {
        //11111111111111111111111111111111111111
        $this->db->select('commeettee_id, commeettee_fname, commeettee.user_id, user.email, commeettee_department,user.user_type');
        $this->db->join('user', 'commeettee.user_id = user.user_id');
        $this->db->from('commeettee');
        $this->db->where('user.user_type', "2");
        $this->db->like('commeettee_department', $department_name);
        $query_reviewer = $this->db->get();
        $result_reviewer = array();

        foreach ($query_reviewer->result() as $obj_reviewer) {
            array_push($result_reviewer, $obj_reviewer);
        }

        return $result_reviewer;
    }

    public function getUser_paper_reviewer($paper_detail_id)
    {
        //22222222222222222222222222222222222222222222222222222
        $this->db->select('*');
        $this->db->from('paper_reviewer');
        $this->db->where('paper_detail_id', $paper_detail_id);
        $query_r = $this->db->get();
        $second_compare_reviewer = array();

        foreach ($query_r->result() as $obj_rss) {
            $second_compare_reviewer[0]['user_id'] = $obj_rss->paper_file_owner_comment1;
            $second_compare_reviewer[1]['user_id'] = $obj_rss->paper_file_owner_comment2;
            $second_compare_reviewer[2]['user_id'] = $obj_rss->paper_file_owner_comment3;
            $second_compare_reviewer[3]['user_id'] = $obj_rss->paper_file_owner_comment4;
        }

        return $second_compare_reviewer;
    }

    public function getUser_committee_where_in($result_diff)
    {
        //3333333333333333333333333333333333333333333333333333333333
        $this->db->select('commeettee_id, commeettee_fname, commeettee.user_id, user.email, commeettee_department,user.user_type');
        $this->db->join('user', 'commeettee.user_id = user.user_id');
        $this->db->from('commeettee');
        $this->db->where_in('user.user_id', $result_diff);
        $query_reviewer = $this->db->get();
        $result_reviewer = array();

        foreach ($query_reviewer->result() as $obj_reviewer) {
            array_push($result_reviewer, $obj_reviewer);
        }

        return $result_reviewer;

    }

    public function getEvaluation_by_file_id($file_id, $user_id)
    {

        $this->db->select('*');
        $this->db->from('evaluation');
        $this->db->where('evaluation.paper_file_id', $file_id);
        $this->db->where('evaluation.user_id', $user_id);
        $this->db->join('paper_file_evaluation_comment', 'evaluation.evaluation_id = paper_file_evaluation_comment.evaluation_id', 'LEFT');

        $query = $this->db->get()->row();

        return $query;
    }

    public function getPaper_select($select_arr)
    {

        $this->db->select('*');
        $this->db->from('paper_detail');
        $this->db->where_in('paper_detail_id', $select_arr);
        $query_reviewer = $this->db->get();
        $result_reviewer = array();

        foreach ($query_reviewer->result() as $obj_reviewer) {
            array_push($result_reviewer, $obj_reviewer);
        }

        return $result_reviewer;

    }

//    public function sendingStatus_to_Email($email, $selected_status, $paper_detail_id)
//    {
//
//        $message = /*-----------email body starts-----------*/
//            'ถึงท่านผู้ใช้ , !
//        <br>
//        งานวิจัยที่ท่านส่ง เปลียนสถานะเป็น <strong>' . $selected_status . '</strong> <br>
//
//        <br>
//        ท่านสามารถตรวจสอบสถานะของท่านได้จากลิงก์นี้:<br>
//
//        ' . base_url() . 'paper/show_detail/' . $paper_detail_id .
//            '<br><br>
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
//        $this->email->subject("มีการเปลียนแปลงสถานะงานวิจัยของท่านใหม่");
//        //$this->email->message("ถึงผู้ใช้,<br>กรุณาคลิกที่ URL หรือคัดลอก URL ไปวางในเว็บเบราวน์เซอร์ของท่านเพื่อยืนยันอีเมล<br><br>" .base_url(). "verify/".$verificationText."<br>"."<br>ขอขอบคุณ<br>NCTECHED");
//        $this->email->message($message);
//
//
//        $data['message'] = "Sorry Unable to send email...";
//        if ($this->email->send()) {
//            $data['message'] = "Mail sent...";
//        }
//
//    }
//
//    public function sendingStatus_to_Email_reviewer($email, $paper_detail_id)
//    {
//
//        $message = /*-----------email body starts-----------*/
//            'ถึงผู้ตรวจความ , !
//        <br>
//        ทางคณะกรรมการได้ส่งงานที่ท่านต้องตรวจใหม่ <br>
//
//        <br>
//        ท่านสามารถตรวจสอบบทความที่ท่านต้องตรวจได้จากได้จากลิงก์นี้:<br>
//
//        ' . base_url() . 'paper2/show_detail/' . $paper_detail_id .
//            '<br><br>
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
//        $this->email->subject("มีงานที่ท่านต้องตรวจใหม่");
//        //$this->email->message("ถึงผู้ใช้,<br>กรุณาคลิกที่ URL หรือคัดลอก URL ไปวางในเว็บเบราวน์เซอร์ของท่านเพื่อยืนยันอีเมล<br><br>" .base_url(). "verify/".$verificationText."<br>"."<br>ขอขอบคุณ<br>NCTECHED");
//        $this->email->message($message);
//
//
//        $data['message'] = "Sorry Unable to send email...";
//        if ($this->email->send()) {
//            $data['message'] = "Mail sent...";
//        }
//
//    }


}
