<?php defined('BASEPATH') OR exit('No direct script access allowed');

class commeettee extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("mol_email", "sys_email");

    }

    function commeettee_type()
    {
        $this->load->model('mol_board');
        $id['user_id'] = $this->session->userdata('user_id');

        $data['commeettee_type'] = $this->mol_board->getBoard_type($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('commeettee/commeettee_type', $data);
    }

    function commeettee_type_add()
    {

        $this->load->model('mol_board');
        $data['blank'] = '';

        if (isset($_POST['btn_submit'])) {
            $insert = array(
                'commeettee_type_id' => $_POST['commeettee_type_id'],
                'commeettee_type_name' => $_POST['commeettee_type_name'],
                'commeettee_type_status' => $_POST['commeettee_type_status'],
            );
            $this->form_validation->set_rules('commeettee_type_name', 'ชื่อประเภทงานวิจัย', 'required');
            $this->form_validation->set_rules('commeettee_type_status', 'อนุญาตไหม', 'required');


            if ($this->form_validation->run() == FALSE) {

            } else {

                if (isset($_POST['commeettee_type_id']) && trim($_POST['commeettee_type_id']) != '') {
                    $insert['commeettee_type_id'] = $_POST['commeettee_type_id'];
                    $this->mol_board->updateBoard_type($insert);
                } else {
                    $this->mol_board->insertBoard_type($insert);
                }
                redirect('commeettee/commeettee_type');
            }
        } else if (isset($_POST['btn_back'])) {
            redirect('commeettee/commeettee_type');
        }
        if (isset($_GET['c_id'])) {
            $id['commeettee_type_id'] = $_GET['c_id'];
            $data['commeettee_type_edit'] = $this->mol_board->getBoard_type($id);
        }

        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('commeettee/commeettee_type_add', $data);
    }

    public function commeettee_detail()
    {
        $this->load->model('mol_commeettee');
        $id['user_id'] = $this->session->userdata('user_id');
        $data['commeettee'] = $this->mol_commeettee->getPerson($id);

        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('commeettee/commeettee_detail', $data);//2
    }

    public function commeettee_detail_add()
    {

        $this->load->model('mol_commeettee');
        //config image.
        //$config['upload_path'] = './uploads/img/';
        //$config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size']	= '2048';                        //2048KB

        //$this->load->library('upload', $config);

        $data['blank'] = "";
        if (isset($_POST['btn_submit'])) {
            $insert = array(
                'commeettee_fname' => $_POST['name'],
                'commeettee_type_name' => $_POST['commeettee_type_name'],
                'commeettee_address' => $_POST['address'],
                'commeettee_district' => $_POST['district'],
                'commeettee_county' => $_POST['county'],
                'commeettee_road' => $_POST['road'],
                'commeettee_building' => $_POST['building'],
                'commeettee_floor' => $_POST['floor'],
                'commeettee_province' => $_POST['sltprovince'],
                'commeettee_zip' => $_POST['zip'],
                'commeettee_tel' => $_POST['tel'],
                'commeettee_department' => '',
                'commeettee_fax' => $_POST['fax'],
                'user_id' => $this->session->userdata('user_id')
            );

            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('commeettee_type_name', 'commeettee_type_name', 'required');
            $this->form_validation->set_rules('address', 'commeettee_address', 'required');
            $this->form_validation->set_rules('district', 'commeettee_district', 'required');
            $this->form_validation->set_rules('county', 'commeettee_county', 'required');
            $this->form_validation->set_rules('sltprovince', 'commeettee_province', 'required');
            $this->form_validation->set_rules('zip', 'commeettee_zip', 'required');
            $this->form_validation->set_rules('tel', 'commeettee_tel', 'required');
            if ($this->form_validation->run() == FALSE) {
                echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("กรุณาตรวจสอบข้อมูลที่กรอกในข้อมูลส่วนตัวอีกครั้งว่าถูกต้องตามรูปแบบหรือไม่ ?"); }'
                    . '</script></body></html>';
                redirect(base_url() . '/commeettee/commeettee_detail_add?c_id=' . $_POST['commeettee_id'], 'refresh');
            } else {
                //submit checkbox department
                $insert['commeettee_department'] = join(", ", $_POST['department']);
                //upload file image.
                //if($this->upload->do_upload('image')) {
                //    $data = array('upload_data' => $this->upload->data());
                //    $file_name = $data['upload_data']['file_name'];
                //    $insert['commeettee_pic'] = $file_name;
                //}

                if (isset($_POST['commeettee_id']) && trim($_POST['commeettee_id']) != '') {
                    $insert['commeettee_id'] = $_POST['commeettee_id'];
                    $commeettee_id = $this->mol_commeettee->updatePerson($insert);
                } else {
                    $commeettee_id = $this->mol_commeettee->insertPerson($insert);
                    //$this->session->set_userdata('commeettee_id', $commeettee_id);
                }
                redirect('commeettee/commeettee_detail');
            }
        } else if (isset($_POST['btn_back'])) {
            redirect('commeettee/commeettee_detail');
        }
        if (isset($_GET['c_id'])) {
            $id['commeettee_id'] = $_GET['c_id'];
            $data['commeettee_edit'] = $this->mol_commeettee->getPerson($id);
        }

        $data['forProvince'] = $this->mol_commeettee->getProvince();
        $data['forDepartment'] = $this->mol_commeettee->getDepartment();
        $data['forCommeettee_type'] = $this->mol_commeettee->getCommeettee_type();
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('commeettee/commeettee_detail_add', $data);

    }

    function forget_password_users()
    {
        $this->load->model('mol_forget_password');

        if (isset($_GET['c_id'])) {
            $getemail = $this->mol_forget_password->checkEmailfromUser_id($_GET['c_id']);
            $password = $this->randomString();
            $pass512 = hash('sha512', $password);
            $this->mol_forget_password->updateNewPassword($getemail, $pass512);
            $this->sys_email->sendingNewPassword_to_Email($getemail, $password);
            echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("รหัสผ่านใหม่ถูกส่งไปยัง E-mail : ' . $getemail . ' \nซึ่งเป็นอีเมล์ของสมาชิกท่านนี้\nและระบบได้ทำการสำเนาอีเมล์ที่บรรจุรหัสผ่านใหม่ของท่านนี้ไปยัง E-mail หลักของระบบนี้ด้วย"); }'
                . '</script></body></html>';
        }
        redirect('commeettee/users_all', 'refresh');
    }
    
    function forget_password_users_123456()
    {
        $this->load->model('mol_forget_password');

        if (isset($_GET['c_id'])) {
            $getemail = $this->mol_forget_password->checkEmailfromUser_id($_GET['c_id']);
            $password = 123456;
            $pass512 = hash('sha512', $password);
            $this->mol_forget_password->updateNewPassword($getemail, $pass512);
            $this->sys_email->sendingNewPassword_to_Email($getemail, $password);
            echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("รหัสผ่านใหม่ถูกส่งไปยัง E-mail : ' . $getemail . ' \nซึ่งเป็นอีเมล์ของสมาชิกท่านนี้\nและระบบได้ทำการสำเนาอีเมล์ที่บรรจุรหัสผ่านใหม่ของท่านนี้ไปยัง E-mail หลักของระบบนี้ด้วย"); }'
                . '</script></body></html>';
        }
        redirect('commeettee/users_all', 'refresh');
    }

    function forget_password_commeettee()
    {
        $this->load->model('mol_forget_password');

        if (isset($_GET['c_id'])) {
            $getemail = $this->mol_forget_password->checkEmailfromCommeettee_id($_GET['c_id']);
            $password = $this->randomString();
            $pass512 = hash('sha512', $password);
            $this->mol_forget_password->updateNewPassword($getemail, $pass512);
            $this->sys_email->sendingNewPassword_to_Email($getemail, $password);
            echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("รหัสผ่านใหม่ถูกส่งไปยัง E-mail : ' . $getemail . ' \nซึ่งเป็นอีเมล์ของสมาชิกท่านนี้\nและระบบได้ทำการสำเนาอีเมล์ที่บรรจุรหัสผ่านใหม่ของท่านนี้ไปยัง E-mail หลักของระบบนี้ด้วย"); }'
                . '</script></body></html>';
        }
        redirect('commeettee/commeettee_all', 'refresh');
    }
    
    function forget_password_commeettee_123456()
    {
        $this->load->model('mol_forget_password');

        if (isset($_GET['c_id'])) {
            $getemail = $this->mol_forget_password->checkEmailfromCommeettee_id($_GET['c_id']);
            $password = 123456;
            $pass512 = hash('sha512',$password);
            $this->mol_forget_password->updateNewPassword($getemail, $pass512);
            $this->sys_email->sendingNewPassword_to_Email($getemail, $password);
            echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("รหัสผ่านใหม่ถูกส่งไปยัง E-mail : ' . $getemail . ' \nซึ่งเป็นอีเมล์ของสมาชิกท่านนี้\nและระบบได้ทำการสำเนาอีเมล์ที่บรรจุรหัสผ่านใหม่ของท่านนี้ไปยัง E-mail หลักของระบบนี้ด้วย"); }'
                . '</script></body></html>';
        }
        redirect('commeettee/commeettee_all', 'refresh');
    }

    function forget_password_reviewer_123456()
    {
        $this->load->model('mol_forget_password');

        if (isset($_GET['c_id'])) {
            $getemail = $this->mol_forget_password->checkEmailfromCommeettee_id($_GET['c_id']);
            $password = 123456;
            $pass512 = hash('sha512', $password);
            $this->mol_forget_password->updateNewPassword($getemail, $pass512);
            $this->sys_email->sendingNewPassword_to_Email($getemail, $password);
            echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("รหัสผ่านใหม่ถูกส่งไปยัง E-mail : ' . $getemail . ' \nซึ่งเป็นอีเมล์ของสมาชิกท่านนี้\nและระบบได้ทำการสำเนาอีเมล์ที่บรรจุรหัสผ่านใหม่ของท่านนี้ไปยัง E-mail หลักของระบบนี้ด้วย"); }'
                . '</script></body></html>';
        }
        redirect('commeettee/reviewer_all', 'refresh');
    }
    
    function forget_password_reviewer()
    {
        $this->load->model('mol_forget_password');

        if (isset($_GET['c_id'])) {
            $getemail = $this->mol_forget_password->checkEmailfromCommeettee_id($_GET['c_id']);
            $password = $this->randomString();
            $pass512 = hash('sha512', $password);
            $this->mol_forget_password->updateNewPassword($getemail, $pass512);
            $this->sys_email->sendingNewPassword_to_Email($getemail, $password);
            echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("รหัสผ่านใหม่ถูกส่งไปยัง E-mail : ' . $getemail . ' \nซึ่งเป็นอีเมล์ของสมาชิกท่านนี้\nและระบบได้ทำการสำเนาอีเมล์ที่บรรจุรหัสผ่านใหม่ของท่านนี้ไปยัง E-mail หลักของระบบนี้ด้วย"); }'
                . '</script></body></html>';
        }
        redirect('commeettee/reviewer_all', 'refresh');
    }

    function commeettee_all()
    {
        $this->load->model('mol_board');
        $id['user_id'] = $this->session->userdata('user_id');

        $data['commeettee'] = $this->mol_board->getCommeettee($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('commeettee/commeettee_all', $data);
    }


    function users_all()
    {
        $this->load->model('mol_board');
        $id['user_id'] = $this->session->userdata('user_id');

        $data['users'] = $this->mol_board->getUsers($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('commeettee/users_all', $data);
    }

    function reviewer_all()
    {
        $this->load->model('mol_board');
        $id['user_id'] = $this->session->userdata('user_id');

        $data['reviewer'] = $this->mol_board->getReviewer($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('commeettee/reviewer_all', $data);
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

    function commeettee_add()
    {
        $this->load->model('mol_board');
        $this->load->model('mol_welcome');
        $data['blank'] = '';
        $pass = $this->randomString();
        if (isset($_POST['btn_submit'])) {
            $insert = array(
                'user_id' => $_POST['user_id'],
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => hash('sha512', $pass),
                'user_type' => $_POST['user_type'] = "1", //auto = 1 คือ คณะกรรมการ

            );
            $insert2 = array(
                'commeettee_fname' => $_POST['commeettee_fname'],
            );

            $this->form_validation->set_rules('username', 'ชื่อผู้ใช้', 'required');


            if ($this->form_validation->run() == FALSE) {

            } else {
                if (isset($_POST['user_id']) && trim($_POST['user_id']) != '') {
                    $insert['user_id'] = $_POST['user_id'];
                    $this->mol_board->updateCommeettee($insert);
                    $this->mol_board->updateCommeettee2($insert2, $insert['user_id']);
                } else {

                    $result = $this->mol_welcome->checkRegister($_POST['username'], $_POST['email']);
                    if ($result != null) {

                        echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("ชื่อผู้ใช้ หรือ E-mail ซึ้ากันในระบบ"); }'
                            . '</script></body></html>';
                    } else {
                        $this->mol_board->insertCommeettee($insert);
                        $this->mol_board->insertName($insert2);
                        $this->sys_email->sendingStatus_to_Email_Commeettee($_POST['email'], $pass, $_POST['username']);
                    }
                }
                redirect('commeettee/commeettee_all', 'refresh');
            }
        } else if (isset($_POST['btn_back'])) {
            redirect('commeettee/commeettee_all');
        }
        if (isset($_GET['c_id'])) {
            $id['commeettee_id'] = $_GET['c_id'];
            $data['commeettee_edit'] = $this->mol_board->getCommeettee($id);
        }

        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('commeettee/commeettee_add', $data);
    }


    function reviewer_add()
    {
        $this->load->model('mol_board');
        $this->load->model('mol_welcome');
        $data['blank'] = '';
        $pass = $this->randomString();
        if (isset($_POST['btn_submit'])) {
            $insert = array(
                'user_id' => $_POST['user_id'],
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => hash('sha512', $pass),
                'user_type' => $_POST['user_type'] = "2", //auto = 2 คือ ผู้ตรวจบทความ
            );
            $insert2 = array(
                'commeettee_fname' => $_POST['commeettee_fname'],
            );

            $this->form_validation->set_rules('username', 'ชื่อผู้ใช้', 'required');

            if ($this->form_validation->run() == FALSE) {

            } else {
                if (isset($_POST['user_id']) && trim($_POST['user_id']) != '') {
                    $insert['user_id'] = $_POST['user_id'];
                    $this->mol_board->updateReviewer($insert);
                    $this->mol_board->updateReviewer2($insert2, $insert['user_id']);
                } else {
                    $result = $this->mol_welcome->checkRegister($_POST['username'], $_POST['email']);
                    if ($result != null) {

                        echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("ชื่อผู้ใช้ หรือ E-mail ซึ้ากันในระบบ"); }'
                            . '</script></body></html>';
                    } else {
                        $this->mol_board->insertReviewer($insert);
                        $this->mol_board->insertName($insert2);
                        $this->sys_email->sendingStatus_to_Email_Reviewer($_POST['email'], $pass, $_POST['username']);
                    }
                }
                redirect('commeettee/reviewer_all', 'refresh');
            }
        } else if (isset($_POST['btn_back'])) {
            redirect('commeettee/reviewer_all');
        }
        if (isset($_GET['c_id'])) {
            $id['commeettee_id'] = $_GET['c_id'];
            $data['reviewer_edit'] = $this->mol_board->getReviewer($id);
        }

        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('commeettee/reviewer_add', $data);
    }


    /*	public function check_company($name, $data)
        {
            $data = preg_split('/,/', $data);
            $address = $data[0];
            $district = $data[1];
            $county = $data[2];
            $province = $data[3];
            $zip = $data[4];
            $tel = $data[5];

            $fax = $data[6];
            $image = $data[7];
            //$logo = $data[8];

            $this->load->model('mol_commeettee');

            if($name == ""){
                $this->form_validation->set_message('check_company', 'The name field is required.');
                return false;
            }else if($address == ""){
                $this->form_validation->set_message('check_company', 'The Address field is required.');
                return false;
            }else if($district == ""){
                $this->form_validation->set_message('check_company', 'The District field is required.');
                return false;
            }else if($county == ""){
                $this->form_validation->set_message('check_company', 'The County field is required.');
                return false;
            }else if($province == ""){
                $this->form_validation->set_message('check_company', 'The Province field is required.');
                return false;
            }else if($zip == ""){
                $this->form_validation->set_message('check_company', 'The Zip field is required.');
                return false;
            }else if($tel == ""){
                $this->form_validation->set_message('check_company', 'The Telephone number field is required.');
                return false;
            }else if(!preg_match('/[0-9]{5}/', $zip)){
                $this->form_validation->set_message('check_company', 'The Zip field must be number and 5 characters only.');
                return false;
            }else{
                //check upload image.
                if(isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                    if($this->upload->do_upload('image')) {
                        // set a $_POST value for 'image' that we can use later
                        $upload_data = $this->upload->data();
                        $_POST['image'] = $upload_data['file_name'];
                        return true;
                      }else if($_FILES['image']['type'] !== "image/jpeg" || $_FILES['image']['type'] !== "image/png") {
                          $this->form_validation->set_message('check_company', "You must upload an image only.");
                          return false;
                      }else{
                        // possibly do some clean up ... then throw an error
                        $this->form_validation->set_message('check_company', 'Size of image more than 2 MB.');
                        return false;
                      }
                }else if(!isset($_FILES['image'])){
                    // throw an error because nothing was uploaded
                    $this->form_validation->set_message('check_company', "Image file error.");
                    return false;
                }

                if(isset($_POST['commeettee_id']) && trim($_POST['commeettee_id']) != ''){
                    return true;
                }



                $check = $this->mol_commeettee->checkPerson($this->session->userdata('user_id'));
                if($check != null){
                    $this->form_validation->set_message('check_company', 'Your company is already.');
                    return false;
                }else{
                    return true;
                }
            }
        }

       */

}

?>

