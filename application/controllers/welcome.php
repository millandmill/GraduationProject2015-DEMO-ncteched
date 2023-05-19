<?php defined('BASEPATH') OR exit('No direct script access allowed');

class welcome extends CI_Controller
{

    public function DateThai($strDate)
    {

        $strwday = date("w", strtotime($strDate));
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strMonthCut = Array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        $TH_Day = Array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
        $sstrwdayth = $TH_Day[$strwday];
        $strMonthThai = $strMonthCut[$strMonth];
        return "วัน$sstrwdayth ที่ $strDay $strMonthThai $strYear";
    }

    function conferences_now()
    {
        $conferences_on = "";
        $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
        foreach ($query1112->result() as $data) {
            $conferences_on = $data->conferences_select_on;
        }
        return $conferences_on;
    }

    public function index()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('front/welcome_message');
    }

    public function rationale()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('front/rationale');
    }

    public function call_paper()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('front/call_for_paper');
    }

    public function dates()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('front/important_dates');
    }

    public function program()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('front/program_date');
    }

    public function paper_sub()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('front/paper_submission');
    }

    public function regis_method()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('front/regis_method');
    }

    public function where()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('front/where_place');
    }

    public function organizing()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('front/organizing');
    }

    public function download()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('front/download');
    }

    public function paper_total1()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('front/paper_total1');
    }

    public function downloadpaper()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('front/downloadpaper');
    }

    public function paper_search_index()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('front/paper_search_index');
    }

    public function paper_search_index2()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('front/paper_search_index2');
    }

    /*public function best()
{
            $this->load->database();
            $this->load->view('template/header/header_index');
    $this->load->view('front/best');
}*/
    public function paper_time_news()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('front/paper_time_news');
    }

    public function login()
    {
        if (!empty($this->session->userdata('user_id'))) {
            $this->auto_login();
        }

        if (isset($_POST['btn_submit'])) {
            $pass = hash('sha512', $_POST['password']);
            $this->form_validation->set_rules('username', 'Username', 'callback_check_login[' . $pass . ']');
            if ($this->form_validation->run() == FALSE) {
                $this->session->sess_destroy();
            } else {
                if ($_POST['selected_users'] == 'คณะกรรมการ') {
                    $this->db->select('user_type');
                    $this->db->where('username', $_POST['username']);
                    $q = $this->db->get('user');
                    $data = array_shift($q->result_array());
                    if ($data['user_type'] === '1') {

                        redirect('commeettee/commeettee_detail');
                    } else
                        echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("คุณไม่ได้รับอนุญาติในการเข้าสู่ระบบคณะกรรมการ"); }'
                            . '</script></body></html>';

                }
                if ($_POST['selected_users'] == 'ผู้ส่งผลงานวิจัย') {
                    $this->db->select('user_type');
                    $this->db->where('username', $_POST['username']);
                    $q2 = $this->db->get('user');
                    $data = array_shift($q2->result_array());

                    if ($data['user_type'] === '0') {
                        $this->db->select('*');
                        $this->db->where('time_cycle_paper_name', 'Regist สมัครสมาชิก');
                        $this->db->where('time_cycle_conferences', $this->conferences_now());
                        $q = $this->db->get('time_cycle_paper');
                        $data = array_shift($q->result_array());
                        $time_start = $data['time_cycle_paper_date_start'];
                        $this->db->select('*');
                        $this->db->where('time_cycle_paper_name', 'Regist สมัครสมาชิก');
                        $this->db->where('time_cycle_conferences', $this->conferences_now());
                        $q2 = $this->db->get('time_cycle_paper');
                        $data2 = array_shift($q2->result_array());
                        $time_end = $data2['time_cycle_paper_date_end'];
                        $today = date("Y-m-d");
                        if (($today >= $time_start) && ($today <= $time_end)) {

                            $id['user_id'] = $this->session->userdata('user_id');
                            $this->db->select('active_status, user_type, user_bad');
                            $this->db->where('user_id', $id['user_id']);
                            $qet_active_status = $this->db->get('user');
                            $data_check_e = array_shift($qet_active_status->result_array());
                            $active_status = $data_check_e['active_status'];
                            if ($active_status != 1) {
                                echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("คุณไม่ได้ยืนยันการสมัครสมาชิกใน E-mail\nกรุณากดยืนยันลิงค์ใน E-mail ของท่าน\nมีปัญหา ข้อสงสัยอื่นๆ กรุณาติดต่อผู้ดูแลระบบ"); }'
                                    . '</script></body></html>';
                                redirect('users/news', 'refresh');
                            } else {
                                redirect('users/news');
                            }
                        } else {
                            echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("ไม่ได้อยู่ในช่วงอนุญาติให้ผู้ส่งบทความ Login เข้าสู่ระบบ\nการอนุญาติให้ผู้ส่งบทความ Login เข้าสู่ระบบอยู่ในช่วง ระหว่าง ' . $this->DateThai($time_start) . ' ถึง ' . $this->DateThai($time_end) . '"); }'
                                . '</script></body></html>';

                            //destroy session also
                            $this->session->sess_destroy();

                            redirect(base_url() . 'welcome/login', 'refresh');
                        }
                    } else
                        echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("คุณไม่ได้รับอนุญาติในการเข้าสู่ระบบส่งบทความ"); }'
                            . '</script></body></html>';
                }

                if ($_POST['selected_users'] == 'ผู้ตรวจบทความ') {
                    $this->db->select('user_type');
                    $this->db->where('username', $_POST['username']);
                    $q2 = $this->db->get('user');
                    $data = array_shift($q2->result_array());

                    if ($data['user_type'] === '2') {
                        redirect('paper2/index');
                    } else
                        echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("คุณไม่ได้รับอนุญาติในการเข้าสู่ระบบผู้ตรวจบทความ"); }'
                            . '</script></body></html>';
                }


            }
        }
        $this->load->view('template/header/header');
        $this->load->view('front/login');
    }

    private function auto_login()
    {
        if ($this->session->userdata('user_type') === '1') {
            redirect('commeettee/commeettee_detail');
        } elseif ($this->session->userdata('user_type') === '2') {
            redirect('paper2/index');
        } elseif ($this->session->userdata('user_type') === '0') {
            redirect('users/news');
        }
    }

    function randomString($length = 6)
    {
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    public function forget_password()
    {
        $this->load->model('mol_forget_password');
        echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("ในกรณีที่ท่านลืมรหัสผ่านกรุณาติดต่อไปที่ Email : ' . $this->mol_forget_password->getEmail_system() . '"); }'
            . '</script></body></html>';
        redirect('welcome/login', 'refresh');
    }

    public function check_login($user, $pass)
    {
        $this->load->model('mol_welcome');
        $this->load->model('mol_log_user');

        if (isset($user) && trim($user != '')) {
            $result = $this->mol_welcome->checkLogin($user);
            if ($user == $result[0]['username'] && $pass == $result[0]['password']) {

                $data = array(

                    'user_id' => $result[0]['user_id'],
                    'log_user_ip' => $_SERVER['REMOTE_ADDR'],

                );

                $this->session->set_userdata('user_id', $result[0]['user_id']);
                $this->session->set_userdata('username', $result[0]['username']);
                $this->session->set_userdata('user_type', $result[0]['user_type']);

                $log_result = $this->mol_log_user->insertUserLog($data);

                return true;
            } else {
                $this->form_validation->set_message('check_login', 'Wrong password,Please try again.');
                return false;
            }
        } else {
            $this->form_validation->set_message('check_login', 'The Username field is required.');
            return false;
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('welcome/login');
    }

    public function register()
    {
        $this->load->model('mol_welcome');
        $this->load->model('mol_email');

        $this->load->view('template/header/header');

        //time start
        $this->db->select('*');
        $this->db->where('time_cycle_paper_name', 'Regist สมัครสมาชิก');
        $this->db->where('time_cycle_conferences', $this->conferences_now());
        $q = $this->db->get('time_cycle_paper');
        $data = array_shift($q->result_array());
        $time_start = $data['time_cycle_paper_date_start'];

        //time end
        $this->db->select('*');
        $this->db->where('time_cycle_paper_name', 'Regist สมัครสมาชิก');
        $this->db->where('time_cycle_conferences', $this->conferences_now());
        $q2 = $this->db->get('time_cycle_paper');
        $data2 = array_shift($q2->result_array());
        $time_end = $data2['time_cycle_paper_date_end'];

        //today
        $today = date("Y-m-d");
        if (($today >= $time_start) && ($today <= $time_end)) {
            $this->load->view('front/register');
        } else {
            echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("ไม่ได้อยู่ในช่วงสมัครสมาชิก\nการสมัครสมาชิกต้องอยู่ในช่วง ระหว่าง ' . $this->DateThai($time_start) . ' ถึง ' . $this->DateThai($time_end) . '"); }'
                . '</script></body></html>';
            redirect(base_url() . '', 'refresh');
        }
    }

    function register_chk(){

        $this->load->model('mol_welcome');
        $this->load->model('mol_email');

        $this->load->view('template/header/header');

        if (isset($_POST['btn_submit'])) {

            $insert = array(
                'username' => $_POST['username'],
                'password' => hash('sha512', $_POST['password']),
                'email' => $_POST['email'],
                'hash' => hash('md5', rand(0, 1000))
            );

            $this->form_validation->set_rules('username', 'Username', 'callback_check_register[' . $insert["email"] . ']');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
            $this->form_validation->set_rules('captcha_code', 'Captcha', 'required|callback_check_rec');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('front/register');
            } else {

                $data['email'] = $_POST['email'];
                $data['hash'] = $insert['hash'];

                $data['msg'] = "ขอขอบคุณที่สมัครสมาชิก กรุณาเข้าอีเมล <b><i>".$data['email']."</i></b> ที่คุณใช้สมัครเพื่อยืนยันบัญชีของคุณ <br /> หน้านี้จะถูกเปลี่ยนไปยังหน้าล๊อกอินในอีก <span id=\"countdown\">5</span> วินาที";

                $this->mol_welcome->insertUser($insert);
                $this->mol_email->sendVerificatinEmail($data['email'], $data['hash']);
                $this->load->view('front/redirect_page', $data);

            }

        } else if (isset($_POST['btn_back'])) {
            redirect('welcome/login');
        }
    }


    function verify()
    {

        $this->load->model('mol_email');

        $email = $this->input->get('email');
        $hash = $this->input->get('hash');

        $this->load->view('template/header/header');

        $data['msg'] = "ไม่พบลิงค์ที่ต้องการ  <br /> หน้านี้จะถูกเปลี่ยนไปยังหน้าล๊อกอิน ในอีก <span id=\"countdown\">5</span> วินาที";

        $this->result = $this->mol_email->get_hash_value($email); //get the hash value which belongs to given email from database
        if ($this->result) {
            //echo $result;
            if ($this->result->hash == $hash) {  //check whether the input hash value matches the hash value retrieved from the database

                if ($this->mol_email->verify_user($email)) { //update the status of the user as verified
                    /*---Now you can redirect the user to whatever page you want---*/
                    $this->mol_email->send_email_after_confirmed($email);

                    $data['msg'] = "อีเมล <b><i>".$email."</i></b> ได้รับการยืนยันเรียบร้อยแล้ว <br /> หน้านี้จะถูกเปลี่ยนไปยังหน้าล๊อกอิน ในอีก <span id=\"countdown\">5</span> วินาที";

                }
            }
        }

        $this->load->view('front/redirect_page', $data);
    }

    public function check_rec()
    {
        $this->load->library('securimage');
        $securimage = new Securimage();
        if ($securimage->check($_POST['captcha_code']) == false) {
            // the code was incorrect
            // you should handle the error so that the form processor doesn't continue
            // or you can use the following code if there is no validation or you do not know how
//            echo '<html><head><meta charset="utf-8"></head><body>';
//            echo "คุณกรอกข้อความยืนยันความปลอดภัยไม่ถูกต้อง<br /><br />";
//            echo "กรุณาลองใหม่อีกครั้งโดยคลิก <a href='javascript:history.go(-1)'>ที่นี้</a>";
//            echo '</body></html>';
//            exit;
            $this->form_validation->set_message('check_rec', 'The %s code was incorrect');
            return false;
        }
    }

    public function check_register($user, $data)
    {
        $data = preg_split('/,/', $data);
        $email = $data[0];
        $this->load->model('mol_welcome');
        if ($user == "") {
            $this->form_validation->set_message('check_register', 'The Username field is required.');
            return false;
        } else if (!preg_match('/[a-zA-Z0-9-]{5,10}/', $user)) {
            $this->form_validation->set_message('check_register', 'The Username field must be a-z, A-Z, 0-9, - and 5-10 charactors only.');
            return false;
        } else if ($email == "") {
            $this->form_validation->set_message('check_register', 'The Email field is required.');
            return false;
        }
//        else if (!preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $email)) {
//            $this->form_validation->set_message('check_register', 'The Email field is mistake.');
//            return false;
//        }
        else {
            $result = $this->mol_welcome->checkRegister($user, $email);
            if ($result != null) {
                $this->form_validation->set_message('check_register', 'The Username or Email field is already.');
                return false;
            } else {
                return true;
            }
        }
    }

    public function changePassword()
    {
        $this->load->model('mol_welcome');
        if (isset($_POST['btn_submit'])) {
            $change['password'] = $_POST['newPassword'];
            $this->form_validation->set_rules('username', 'Username', 'callback_check_changePassword[' . $change['password'] . ',' . $_POST["password"] . ']');
            if ($this->form_validation->run() == FALSE) {

            } else {
                $change['password'] = hash('sha512', $change['password']);
                $oldPass = hash('sha512', $_POST['password']);
                $user = $_POST['username'];
                $this->mol_welcome->updateNewPass($user, $change, $oldPass);
                redirect('welcome/login');
            }
        }
        $this->load->view('template/header/header');
        $this->load->view('front/change_user');
    }

    public function check_changePassword($user, $data)
    {
        $data = preg_split('/,/', $data);
        $nPass = $data[0];
        $bPass = $data[1];
        $pass = hash('sha512', $bPass);
        $this->load->model('mol_welcome');
        if ($user == "") {
            $this->form_validation->set_message('check_changePassword', 'The Username field is required.');
            return false;
        } else if ($pass == "") {
            $this->form_validation->set_message('check_changePassword', 'The Password field is required.');
            return false;
        } else if ($nPass == "") {
            $this->form_validation->set_message('check_changePassword', 'The New Password field is required.');
            return false;
        } else {
            $result = $this->mol_welcome->checkChangePassword($user, $pass);
            if ($result != null) {
                if ($user == $result[0]['username'] && $pass == $result[0]['password']) {
                    return true;
                } else {
                    $this->form_validation->set_message('check_changePassword', 'The Username or Password field is wrong.');
                    return false;
                }
            } else {
                $this->form_validation->set_message('check_changePassword', 'The Username and Password is wrong.');
                return false;
            }
        }
    }
}

?>