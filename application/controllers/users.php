<?php defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller
{

    public function users_detail()
    {
        $this->load->model('mol_user_detail');
        $id['user_id'] = $this->session->userdata('user_id');
        $data['user_detail'] = $this->mol_user_detail->getPerson($id);

        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft_users');
        $this->load->view('users/users_detail', $data);//2
    }


    public function users_detail_add()
    {
        $this->load->model('mol_user_detail');
        //config image.
        //$config['upload_path'] = './uploads/img/';
        //$config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size']	= '2048';                        //2048KB

        //$this->load->library('upload', $config);

        $data['blank'] = "";
        if (isset($_POST['btn_submit'])) {
            $insert = array(
                'user_detail_fname' => $_POST['name'],
                'user_detail_address' => $_POST['address'],
                'user_detail_district' => $_POST['district'],
                'user_detail_county' => $_POST['county'],
                'user_detail_road' => $_POST['road'],
                'user_detail_building' => $_POST['building'],
                'user_detail_floor' => $_POST['floor'],
                'user_detail_province' => $_POST['sltprovince'],
                'user_detail_zip' => $_POST['zip'],
                'user_detail_tel' => $_POST['tel'],
                'user_detail_fax' => $_POST['fax'],
                'user_id' => $this->session->userdata('user_id')
            );
            if (isset($_POST['user_detail_id']) && trim($_POST['user_detail_id']) != '') {
                $insert['user_detail_id'] = $_POST['user_detail_id'];
                $user_detail_id = $this->mol_user_detail->updatePerson($insert);
            } else {
                $user_detail_id = $this->mol_user_detail->insertPerson($insert);
                $this->session->set_userdata('user_detail_id', $user_detail_id);
            }
            redirect('users/users_detail', 'refresh');

        }
        if (isset($_GET['c_id'])) {
            $id['user_detail_id'] = $_GET['c_id'];
            $data['user_detail_edit'] = $this->mol_user_detail->getPerson($id);
        }
        $data['forProvince'] = $this->mol_user_detail->getProvince();
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft_users');
        $this->load->view('users/users_detail_add', $data);
    }
    function sendVerificatinEmail_again()
    {
        $this->load->model('mol_email');
        $id['user_id'] = $this->session->userdata('user_id');
        $email = $this->mol_email->get_email_from_user_id($id['user_id']);
        $newhash = hash('md5', rand(0, 1000));
        $this->mol_email->updateHashVerify_user($id['user_id'],$newhash);
        $this->mol_email->sendVerificatinEmail($email->email,$newhash);
        echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("กรุณาตรวจสอบ e-mail ของท่าน \nแล้วคลิก link ใน e-mail ของท่านเพื่อยืนยันการสมัครสมาชิก"); }'
                    . '</script></body></html>';
        redirect('users/users_detail', 'refresh');
    }

    function news()
    {
        $this->load->model('mol_news');
        $id['user_id'] = $this->session->userdata('user_id');

        $data['news_public'] = $this->mol_news->getNews_public($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft_users');
        $this->load->view('users/user_news', $data);
    }
    
    
    function news_time()
    {
        $this->load->model('mol_time_paper');
        $id['user_id'] = $this->session->userdata('user_id');

        $data['time_cycle'] = $this->mol_time_paper->getNews_public($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft_users');
        $this->load->view('users/user_news_time', $data);
    }
    

    function paper_detail_add()
    {
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft_users');
        $this->load->view('users/paper_detail_add');
    }

}

?>

