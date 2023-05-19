<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paper_with_admin
 *
 * @author kong mill
 */
class payment_system extends Core_Payment
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        $this->load->model("mol_payment_system", "payment_system");
        $this->load->model("mol_email","sys_email");
        //$this->load->model("mol_upload_file", "upload_file");
        $this->load->library('form_validation');
        $this->load->library("pagination");
        $this->load->library('manage_file');
    }

    public function index()
    {
        $id['user_id'] = $this->session->userdata('user_id');

        $data['public'] = $this->payment_system->get_public($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft_users');
        $this->load->view('payment-system/index', $data);

    }

    public function show_detail($id)
    {
        if(empty($id)){
            redirect('paper');
        }

        $user_id = $this->session->userdata('user_id');

        $check_data = $this->check_data($id);

        if($check_data == true){

            $permission = $this->check_owner_paper($id,$user_id);

            if ($permission == true){

                $this->r = $this->payment_system->get_one($id);
                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft_users');


                $this->db->select('*');
                $this->db->where('time_cycle_paper_name', 'Payment การชำระค่าลงทะเบียน');
                $this->db->where('time_cycle_conferences', $this->time->conferences_now());
                $q = $this->db->get('time_cycle_paper');
                $data = array_shift($q->result_array());
                $time_start = $data['time_cycle_paper_date_start'];
                $time_end = $data['time_cycle_paper_date_end'];
                $today = date("Y-m-d");

                if (($today >= $time_start) && ($today <= $time_end)) {
                    $this->load->view("payment-system/select", $this);
                } else {
                    echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("ไม่ได้อยู่ในช่วงส่งสลิปการชำระเงิน\nการส่งสลิปการชำระเงินต้องอยู่ในช่วง ระหว่าง ' . DateThai($time_start) . ' ถึง ' . DateThai($time_end) . '"); }'
                        . '</script></body></html>';
                    redirect(base_url() . 'users/users_detail', 'refresh');
                }

            }else{
                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft_users');
                $this->load->view('permission/permission_denied');
            }
        }else{
            $this->load->view('template/header/header');
            $this->load->view('template/menuleft/menuleft_users');
            $this->load->view('permission/error_404_not_found');
        }
    }

    //file upload function

    public function upload()
    {
        //check dir
        $dirname = date("Y_m");
        $filename = "./uploads/payment-file/" . $dirname . "/";
        $this->manage_file->check_dir($filename);

        //set preferences
        $config['upload_path'] = $filename;
        $config['allowed_types'] = 'pdf|jpg|png';
        //$config['max_size']    = '11102400';

        //load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('filename')) {
            // case - failure
            $upload_error = array('error' => $this->upload->display_errors());
            echo $upload_error['error'];
            echo $this->uri->uri_string();

            echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("อนุญาติให้อัฟโหลดสลิปเฉพาะไฟล์สกุล\n.pdf .jpg .png"); }'
                . '</script></body></html>';
            redirect('payment_system/show_detail/' . $_POST['paper_detail_id'], 'refresh');

        } else {
            // case - success
            $upload_data = $this->upload->data();
            $rename_file = 'SLP_' . date("Ymdmis");
            $set_hash_file_name = sha1(time().$rename_file)."_p";
            $full_rename_file = $upload_data['file_path'] . $set_hash_file_name. $upload_data['file_ext'];
            $data_rename = rename($upload_data['full_path'], $full_rename_file);
            $file_comment = "";


            $data = array(

                'paper_detail_id' => $_POST['paper_detail_id'],
                'payment_sytem_slip_realname' => $upload_data['file_name'],
                'payment_system_showslip_filename' => $rename_file,
                'payment_system_hash_file'  => $set_hash_file_name,
                'payment_system_file_type'  => $upload_data['file_ext'],
                'payment_system_file_dir'  => $dirname,
                'payment_system_ip' => $_SERVER['REMOTE_ADDR'],
                'payment_system_status' => 'กำลังตรวจสอบ',
                'user_id' => $this->session->userdata('user_id'),

            );
            $id = $data['user_id'];

            //add
//            if ($this->payment_system->insert_upload($data) > 0) {

            $return_id = $this->payment_system->insert_upload($data);

            $data_hash = array(
                'payment_system_id'         => $return_id,
                'payment_system_hash_str'   => sha1(time().$return_id),
            );
            $file_hash_id = $this->payment_system->insert_file_hash($data_hash);

            //sending mail
            $this->r = $this->payment_system->getEmail_from_user($id);
            if ($this->r) {

                $email = $this->r->email;

                $this->sys_email->sending_status($email, $data);

                echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("ระบบได้ส่งสถานะการชำระเงินไปที่ E-mail ของท่าน\nE-mail: '.$email.'"); }'
                . '</script></body></html>';
                redirect('/payment_system/show_detail/' . $data['paper_detail_id'], 'refresh');
            }
//            }

            $data['rename_file'] = $rename_file;
            $data['upload_data'] = $upload_data['full_path'];
            redirect('payment_system/show_detail/' . $_POST['paper_detail_id'], 'refresh');
        }
    }

    public function update_status()
    {

        $data = array(
            'paper_file_format_status' => $this->input->post('selected_status'),

        );

        $selected_status = $this->input->post('selected_status');
        $paper_detail_id = $this->input->post('paper_detail_id');
        $file_id = $this->input->post('file_id');
        $user_id = $this->input->post('user_id');

        //$this->paper_admin->updateFile_status($data,$file_id);

        if ($this->paper_admin->updateFile_status($data, $file_id) >= 1) {
            $this->r = $this->paper_admin->getEmail_from_user($user_id);
            if ($this->r) {

                $email = $this->r->email;

                $this->paper_admin->sendingStatus_to_Email($email, $selected_status, $paper_detail_id);

                redirect('/payment_system/show_detail/' . $paper_detail_id, 'refresh');
            }
        }

    }


}
