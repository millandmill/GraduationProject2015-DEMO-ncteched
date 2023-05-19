<?php

class mol_forget_password extends CI_Model
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

    public function getEmail_system()
    {
        $email = $this->db->query('SELECT smtp_user FROM email_system ORDER BY email_system_id DESC LIMIT 1');
        $data = array_shift($email->result_array());
        $email_show = $data['smtp_user'];
        return $email_show;
    }

    public function checkEmail($email)
    {
        $this->db->select('email');
        $this->db->where('email', $email);
        $count = $this->db->count_all_results('user');
        return $count;
    }

    public function checkUsernamefromEmail($email)
    {
        $this->db->select('username');
        $this->db->where('email', $email);
        $this->db->order_by("user_id", "asc");
        $this->db->limit("1");
        $q = $this->db->get('user');
        $data = array_shift($q->result_array());
        $Username = $data['username'];
        return $Username;
    }

    public function checkEmailfromCommeettee_id($id)
    {
        $email = $this->db->query('SELECT * FROM user INNER JOIN commeettee ON user.user_id=commeettee.user_id WHERE commeettee.commeettee_id = ' . $id);
        $data = array_shift($email->result_array());
        $email_show = $data['email'];
        return $email_show;
    }

    public function checkEmailfromUser_id($id)
    {
        $email = $this->db->query('SELECT * FROM user WHERE user_id = ' . $id);
        $data = array_shift($email->result_array());
        $email_show = $data['email'];
        return $email_show;
    }

    public function updateNewPassword($email, $newpassword)
    {
        $this->db->query("UPDATE user SET password='" . $newpassword . "' WHERE email='" . $email . "'");
    }

//    public function sendingNewPassword_to_Email($email, $newpassword)
//    {
//
//        $message = /*-----------email body starts-----------*/
//            'ถึงท่านผู้ใช้ , !
//                    <br>
//                    ขณะนี้ระบบได้ทำการรีเซ็ตรหัสผ่านใหม่
//                    <br>
//                    Username ของท่านคือ <strong>' . $this->checkUsernamefromEmail($email) . '</strong> <br>
//                    <br>
//                    รหัสผ่านใหม่ของท่านคือ <strong>' . $newpassword . '</strong>
//                    <br>
//                    ท่านสามารถเข้าระบบได้จากลิงก์นี้ :<br>
//                    ' . base_url() . 'welcome/login' .
//            '<br>
//                    ถ้าท่านต้องการจะเปลี่ยนรหัสผ่านให้เข้าจากลิงค์นี้ :<br>
//                    ' . base_url() . 'welcome/changePassword' . '<br>
//                    ขอขอบคุณ
//                    <br>
//                    ทีมงาน NCTECHED';
//        /*-----------email body ends-----------*/
//        $this->email->from($this->get_email_name, "รีเซ็ตรหัสผ่านใหม่ สำหรับ ระบบ NCTECHED SYSTEM");
//        $this->email->to($email);
//        $this->email->cc($this->getEmail_system());
//        $this->email->subject("รีเซ็ตรหัสผ่านใหม่");
//        $this->email->message($message);
//
//        $data['message'] = "Sorry Unable to send email...";
//        if ($this->email->send()) {
//            $data['message'] = "Mail sent...";
//        }
//    }
}

?>