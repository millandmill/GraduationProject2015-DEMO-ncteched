<?php

class mol_email extends CI_Model
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

    public function sendVerificatinEmail($email, $verificationText)
    {

        $message = /*-----------email body starts-----------*/
            'ถึงท่านผู้ใช้ , !
        <br>
        บัญชีของท่านได้ถูกสร้างขึ้นมาแล้ว <br>
        
        <br>            
        กรุณาคลิกที่ลิงก์เพื่อยืนยันอีเมลของท่าน:<br>
            
        ' . base_url() . 'welcome/verify?' .
            'email=' . $email . '&hash=' . $verificationText .
            '<br><br>
            
        ขอขอบคุณ 
        <br>
        ทีมงาน NCTECHED';
        /*-----------email body ends-----------*/


        $this->email->from($this->get_email_name, "NCTECHED SYSTEM");
        $this->email->to($email);
        //$this->email->cc("testcc@domainname.com");
        $this->email->subject("กรุณายืนยันอีเมลของท่าน");
        //$this->email->message("ถึงผู้ใช้,<br>กรุณาคลิกที่ URL หรือคัดลอก URL ไปวางในเว็บเบราวน์เซอร์ของท่านเพื่อยืนยันอีเมล<br><br>" .base_url(). "verify/".$verificationText."<br>"."<br>ขอขอบคุณ<br>NCTECHED");
        $this->email->message($message);


        $data['message'] = "Sorry Unable to send email...";
        if ($this->email->send()) {
            $data['message'] = "Mail sent...";
        }

    }

    public function send_email_after_confirmed($email)
    {
        $message = /*-----------email body starts-----------*/
            'ถึงท่านผู้ใช้ , !
        <br>
        บัญชีของท่านได้ถูกยืนยันอีเมลเรียบร้อยแล้ว <br>
        
        <br>            
        ขอต้อนรับท่านเข้าสู่เว็บการประชุมวิชาการ NCTECHED:<br>
        
        <br>
        
            
        ขอขอบคุณ 
        <br>
        ทีมงาน NCTECHED';
        /*-----------email body ends-----------*/


        $this->email->from($this->get_email_name, "NCTECHED SYSTEM");
        $this->email->to($email);
        $this->email->subject("อีเมลของท่านได้ถูกยืนยันเรียบร้อยแล้ว");
        $this->email->message($message);

        $data['message'] = "Sorry Unable to send email...";
        if ($this->email->send()) {
            $data['message'] = "Mail sent...";
        }
    }

    public function get_hash_value($email)
    {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        return $this->db->get()->row();

    }
    
    public function get_email_from_user_id($user_id)
    {
        $this->db->select('email');
        $this->db->from('user');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->row();
        
    }
    
    function updateHashVerify_user($id,$newhash)
    {
       return $this->db->query('UPDATE user SET hash ="'.$newhash.'" WHERE user_id ='.$id);
    }
    
    

    function verify_user($email)
    {

        $data = array(
            'hash' => hash('md5', rand(0, 1000)),
            'active_status' => '1',
        );

        $this->db->where('email', $email);
        return $this->db->update('user', $data);
    }

    //move function send email on other model to this here

    //from mol forget password
    public function sendingNewPassword_to_Email($email, $newpassword)
    {

        $message = /*-----------email body starts-----------*/
            'ถึงท่านผู้ใช้ , !
                    <br>
                    ขณะนี้ระบบได้ทำการรีเซ็ตรหัสผ่านใหม่
                    <br>
                    Username ของท่านคือ <strong>' . $this->checkUsernamefromEmail($email) . '</strong> <br>
                    <br>
                    รหัสผ่านใหม่ของท่านคือ <strong>' . $newpassword . '</strong>
                    <br>            
                    ท่านสามารถเข้าระบบได้จากลิงก์นี้ :<br>
                    ' . base_url() . 'welcome/login' .
            '<br>
                    ถ้าท่านต้องการจะเปลี่ยนรหัสผ่านให้เข้าจากลิงค์นี้ :<br>
                    ' . base_url() . 'welcome/changePassword' . '<br>
                    ขอขอบคุณ 
                    <br>
                    ทีมงาน NCTECHED';
        /*-----------email body ends-----------*/
        $this->email->from($this->get_email_name, "รีเซ็ตรหัสผ่านใหม่ สำหรับ ระบบ NCTECHED SYSTEM");
        $this->email->to($email);
        $this->email->cc($this->getEmail_system());
        $this->email->subject("รีเซ็ตรหัสผ่านใหม่");
        $this->email->message($message);

        $data['message'] = "Sorry Unable to send email...";
        if ($this->email->send()) {
            $data['message'] = "Mail sent...";
        }
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

    public function getEmail_system()
    {
        $email = $this->db->query('SELECT smtp_user FROM email_system ORDER BY email_system_id DESC LIMIT 1');
        $data = array_shift($email->result_array());
        $email_show = $data['smtp_user'];
        return $email_show;
    }
    /* end */

    //mol_board
    public function sendingStatus_to_Email_Commeettee($email, $pass, $username)
    {

        $message = /*-----------email body starts-----------*/
            'ถึงท่านผู้ใช้ , !
                    <br>
                    ขณะนี้ระบบได้เพิ่มท่านเข้าสู่ระบบเป็นประเภทคณะกรรมการ
                    <br>
                    Username ของท่านคือ <strong>' . $username . '</strong> <br>
                    <br>
                    รหัสผ่านของท่านคือ <strong>' . $pass . '</strong>
                    <br>            
                    ท่านสามารถเข้าระบบได้จากลิงก์นี้ โดยเลือกเป็นประเภทคณะกรรมการ:<br>
                    ' . base_url() . 'welcome/login' .
            '<br><br>
                    ขอขอบคุณ 
                    <br>
                    ทีมงาน NCTECHED';
        /*-----------email body ends-----------*/
        $this->email->from($this->get_email_name, "NCTECHED SYSTEM");
        $this->email->to($email);
        $this->email->subject("เพิ่มท่านเข้าสู่ระบบ เป็นประเภทคณะกรรมการ");
        $this->email->message($message);

        $data['message'] = "Sorry Unable to send email...";
        if ($this->email->send()) {
            $data['message'] = "Mail sent...";
        }
    }

    public function sendingStatus_to_Email_Reviewer($email, $pass, $username)
    {

        $message = /*-----------email body starts-----------*/
            'ถึงท่านผู้ใช้ , !
                    <br>
                    ขณะนี้ระบบได้เพิ่มท่านเข้าสู่ระบบเป็นประเภทผู้ตรวจบทความ
                    <br>
                    Username ของท่านคือ <strong>' . $username . '</strong> <br>
                    <br>
                    รหัสผ่านของท่านคือ <strong>' . $pass . '</strong>
                    <br>            
                    ท่านสามารถเข้าระบบได้จากลิงก์นี้ โดยเลือกเป็นประเภทผู้ตรวจบทความ:<br>
                    ' . base_url() . 'welcome/login' .
            '<br><br>
                    ขอขอบคุณ 
                    <br>
                    ทีมงาน NCTECHED';
        /*-----------email body ends-----------*/
        $this->email->from($this->get_email_name, "NCTECHED SYSTEM");
        $this->email->to($email);
        $this->email->subject("เพิ่มท่านเข้าสู่ระบบ เป็นประเภทผู้ตรวจบทความ");
        $this->email->message($message);

        $data['message'] = "Sorry Unable to send email...";
        if ($this->email->send()) {
            $data['message'] = "Mail sent...";
        }
    }
    /* end */

    //mol_payment_system
    public function sending_status($email, $data)
    {
        $message = /*-----------email body starts-----------*/
            'ถึงท่านผู้ใช้ , !
        <br>
        ขณะนี้ ท่านได้อัปโหลด สลิปจ่ายเงิน ซึ่งตอนนี้ได้อยู่ในสถานะ <strong>' . $data['payment_system_status'] . '</strong><br>
        
        <br>            
        กรุณารอการตรวจสอบจากเจ้าหน้าที่<br>
        
        <br>
        
            
        ขอขอบคุณ 
        <br>
        ทีมงาน NCTECHED';
        /*-----------email body ends-----------*/


        $this->email->from($this->get_email_name, "NCTECHED SYSTEM");
        $this->email->to($email);
        //$this->email->cc("testcc@domainname.com");
        $this->email->subject("การตรวจสอบสลิปจ่ายเงิน");
        $this->email->message($message);

        //$data['message'] = "Sorry Unable to send email...";
        //if($this->email->send()){
        //$data['message'] = "Mail sent...";
        //}
        $this->email->send();
        return $this->email->print_debugger();
    }
    /* end */

    /* mol_paper_with_admin */
    public function sendingStatus_to_Email($email, $selected_status, $paper_detail_id)
    {

        $message = /*-----------email body starts-----------*/
            'ถึงท่านผู้ใช้ , !
        <br>
        งานวิจัยที่ท่านส่ง เปลียนสถานะเป็น <strong>' . $selected_status . '</strong> <br>
        
        <br>            
        ท่านสามารถตรวจสอบสถานะของท่านได้จากลิงก์นี้:<br>
            
        ' . base_url() . 'paper/show_detail/' . $paper_detail_id .
            '<br><br>
            
        ขอขอบคุณ 
        <br>
        ทีมงาน NCTECHED';
        /*-----------email body ends-----------*/


        $this->email->from($this->get_email_name, "NCTECHED SYSTEM");
        $this->email->to($email);
        //$this->email->cc("testcc@domainname.com");
        $this->email->subject("มีการเปลียนแปลงสถานะงานวิจัยของท่านใหม่");
        //$this->email->message("ถึงผู้ใช้,<br>กรุณาคลิกที่ URL หรือคัดลอก URL ไปวางในเว็บเบราวน์เซอร์ของท่านเพื่อยืนยันอีเมล<br><br>" .base_url(). "verify/".$verificationText."<br>"."<br>ขอขอบคุณ<br>NCTECHED");
        $this->email->message($message);


        $data['message'] = "Sorry Unable to send email...";
        if ($this->email->send()) {
            $data['message'] = "Mail sent...";
        }

    }

    public function sendingStatus_to_Email_reviewer_with_admin($email, $paper_detail_id)
    {

        $message = /*-----------email body starts-----------*/
            'ถึงผู้ตรวจความ , !
        <br>
        ทางคณะกรรมการได้ส่งงานที่ท่านต้องตรวจใหม่ <br>
        
        <br>            
        ท่านสามารถตรวจสอบบทความที่ท่านต้องตรวจได้จากได้จากลิงก์นี้:<br>
            
        ' . base_url() . 'paper2/show_detail/' . $paper_detail_id .
            '<br><br>
            
        ขอขอบคุณ 
        <br>
        ทีมงาน NCTECHED';
        /*-----------email body ends-----------*/


        $this->email->from($this->get_email_name, "NCTECHED SYSTEM");
        $this->email->to($email);
        //$this->email->cc("testcc@domainname.com");
        $this->email->subject("มีงานที่ท่านต้องตรวจใหม่");
        //$this->email->message("ถึงผู้ใช้,<br>กรุณาคลิกที่ URL หรือคัดลอก URL ไปวางในเว็บเบราวน์เซอร์ของท่านเพื่อยืนยันอีเมล<br><br>" .base_url(). "verify/".$verificationText."<br>"."<br>ขอขอบคุณ<br>NCTECHED");
        $this->email->message($message);


        $data['message'] = "Sorry Unable to send email...";
        if ($this->email->send()) {
            $data['message'] = "Mail sent...";
        }

    }

    public function broadcast_email($param){
        $flag = false;

        $this->email->from($this->get_email_name, "NCTECHED SYSTEM");
//        $this->email->to($param['email']);
        //$this->email->cc("testcc@domainname.com");
        $this->email->bcc($param['email']);
        $this->email->subject($param['title']);
        //$this->email->message("ถึงผู้ใช้,<br>กรุณาคลิกที่ URL หรือคัดลอก URL ไปวางในเว็บเบราวน์เซอร์ของท่านเพื่อยืนยันอีเมล<br><br>" .base_url(). "verify/".$verificationText."<br>"."<br>ขอขอบคุณ<br>NCTECHED");
        $this->email->message($param['message']);


        $data['message'] = "Sorry Unable to send email...";
        if ($this->email->send()) {
            $data['message'] = "Mail sent...";

            $flag = true;
        }

        return $flag;

    }

}
