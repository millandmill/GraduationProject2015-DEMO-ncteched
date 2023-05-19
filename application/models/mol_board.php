<?php

class mol_board extends CI_Model
{
    public $get_email_name;

    function __construct()
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

    public function getRecord_all($quotation)
    {

        $this->db->select('commeettee_type_id');
        $this->db->from('commeettee_type');
        $query = $this->db->get();
        $rows = $query->num_rows();
        return $rows;
    }

    public function getRecordCommeettee_all($quotation)
    {

        $this->db->select('commeettee_id');
        $this->db->from('commeettee');
        $query = $this->db->get();
        $rows = $query->num_rows();
        return $rows;
    }

    public function getCommeettee($id = array())
    {
        if (isset($id['commeettee_id']) && trim($id['commeettee_id'] != '')) {
            $this->db->where('commeettee_id', $id['commeettee_id']);
        }
        $this->db->select('*');
        $this->db->from('commeettee');
        $this->db->where('user_type', "1");
        $this->db->join('user', 'commeettee.user_id = user.user_id');
        $this->db->order_by("commeettee.commeettee_id", "desc");

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

    public function getUsers($id = array())
    {
        if (isset($id['user_detail_id']) && trim($id['user_detail_id'] != '')) {
            $this->db->where('user_detail_id', $id['user_detail_id']);
        }
        $this->db->select('*');
        $this->db->from('user_detail');
        $this->db->where('user.user_type', "0");
        $this->db->join('user', 'user_detail.user_id = user.user_id');
        $this->db->order_by("user_detail.user_detail_id", "desc");

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


    /*
    public function getUsers($id = array()){
    //if(isset($id['user_detail_id']) && trim($id['user_detail_id'] != '')){
    //	$this->db->where('user_detail_id', $id['user_detail_id']);
    //}
        $this->db->query('SELECT * FROM user JOIN user_detail ON user.user_id=user_detail.user_id ');
        //$this->db->where('user_type', "0");
        //$this->db->order_by("commeettee.commeettee_id","desc");

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

    */


    public function getReviewer($id = array())
    {
        if (isset($id['commeettee_id']) && trim($id['commeettee_id'] != '')) {
            $this->db->where('commeettee_id', $id['commeettee_id']);
        }
        $this->db->select('*');
        $this->db->from('commeettee');
        $this->db->where('user_type', "2");
        $this->db->join('user', 'commeettee.user_id = user.user_id');
        $this->db->order_by("commeettee.commeettee_id", "desc");
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

    public function insertCommeettee($data)
    {
        $this->db->insert('user', $data);
        $this->db->query('INSERT INTO commeettee(user_id) SELECT MAX(user.user_id) FROM user WHERE user_type=1');
    }

    public function updateCommeettee($data)
    {
        if (isset($data['user_id']) && trim($data['user_id'] != '')) {
            $this->db->where('user_id', $data['user_id']);
        }
        $this->db->set('password', FALSE);
        $this->db->update('user', $data);
    }

    public function updateCommeettee2($data, $data2)
    {
        $this->db->where('user_id', $data2);
        $this->db->update('commeettee', $data);
    }

//    public function sendingStatus_to_Email_Commeettee($email, $pass, $username)
//    {
//
//        $message = /*-----------email body starts-----------*/
//            'ถึงท่านผู้ใช้ , !
//                    <br>
//                    ขณะนี้ระบบได้เพิ่มท่านเข้าสู่ระบบเป็นประเภทคณะกรรมการ
//                    <br>
//                    Username ของท่านคือ <strong>' . $username . '</strong> <br>
//                    <br>
//                    รหัสผ่านของท่านคือ <strong>' . $pass . '</strong>
//                    <br>
//                    ท่านสามารถเข้าระบบได้จากลิงก์นี้ โดยเลือกเป็นประเภทคณะกรรมการ:<br>
//                    ' . base_url() . 'welcome/login' .
//            '<br><br>
//                    ขอขอบคุณ
//                    <br>
//                    ทีมงาน NCTECHED';
//        /*-----------email body ends-----------*/
//        $this->email->from($this->get_email_name, "NCTECHED SYSTEM");
//        $this->email->to($email);
//        $this->email->subject("เพิ่มท่านเข้าสู่ระบบ เป็นประเภทคณะกรรมการ");
//        $this->email->message($message);
//
//        $data['message'] = "Sorry Unable to send email...";
//        if ($this->email->send()) {
//            $data['message'] = "Mail sent...";
//        }
//    }

    public function insertReviewer($data)
    {
        $this->db->insert('user', $data);
        $this->db->query('INSERT INTO commeettee(user_id) SELECT MAX(user.user_id) FROM user WHERE user_type=2');
    }

    public function insertName($data)
    {
        $this->db->query('UPDATE commeettee SET commeettee_fname="' . implode("", $data) . '" ORDER BY commeettee.commeettee_id DESC LIMIT 1 ');
    }

    public function updateReviewer($data)
    {
        if (isset($data['user_id']) && trim($data['user_id'] != '')) {
            $this->db->where('user_id', $data['user_id']);
        }
        $this->db->set('password', FALSE);
        $this->db->update('user', $data);
    }

    public function updateReviewer2($data, $data2)
    {
        $this->db->where('user_id', $data2);
        $this->db->update('commeettee', $data);
    }

//    public function sendingStatus_to_Email_Reviewer($email, $pass, $username)
//    {
//
//        $message = /*-----------email body starts-----------*/
//            'ถึงท่านผู้ใช้ , !
//                    <br>
//                    ขณะนี้ระบบได้เพิ่มท่านเข้าสู่ระบบเป็นประเภทผู้ตรวจบทความ
//                    <br>
//                    Username ของท่านคือ <strong>' . $username . '</strong> <br>
//                    <br>
//                    รหัสผ่านของท่านคือ <strong>' . $pass . '</strong>
//                    <br>
//                    ท่านสามารถเข้าระบบได้จากลิงก์นี้ โดยเลือกเป็นประเภทผู้ตรวจบทความ:<br>
//                    ' . base_url() . 'welcome/login' .
//            '<br><br>
//                    ขอขอบคุณ
//                    <br>
//                    ทีมงาน NCTECHED';
//        /*-----------email body ends-----------*/
//        $this->email->from($this->get_email_name, "NCTECHED SYSTEM");
//        $this->email->to($email);
//        $this->email->subject("เพิ่มท่านเข้าสู่ระบบ เป็นประเภทผู้ตรวจบทความ");
//        $this->email->message($message);
//
//        $data['message'] = "Sorry Unable to send email...";
//        if ($this->email->send()) {
//            $data['message'] = "Mail sent...";
//        }
//    }

    public function getBoard_type($id = array())
    {
        if (isset($id['commeettee_type_id']) && trim($id['commeettee_type_id'] != '')) {
            $this->db->where('commeettee_type_id', $id['commeettee_type_id']);
        }
        $this->db->select('commeettee_type_id, commeettee_type_name ,commeettee_type_status');
        $this->db->from('commeettee_type');
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

    public function insertBoard_type($data)
    {
        $this->db->insert('commeettee_type', $data);
    }

    public function updateBoard_type($data)
    {
        if (isset($data['commeettee_type_id']) && trim($data['commeettee_type_id'] != '')) {
            $this->db->where('commeettee_type_id', $data['commeettee_type_id']);
        }
        $query = $this->db->update('commeettee_type', $data);
    }
}

?>