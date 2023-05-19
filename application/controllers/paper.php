<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paper
 *
 * @author kong
 */

//สถานะของบทความ
//1 หมายถึง กำลังตรวจสอบหัวข้อ ***ตัดออก
//2 หมายถึง ผ่านการตรวจสอบหัวข้องานวิจัย **ตัดออก
//3 หมายถึง รอการตรวจสอบงานวิจัย
//4 หมายถึง ผ่าน รอการตรวจสอบการชำระเงิน
//5 หมายถึง อยู่ระหว่างการตรวจสอบการขำระเงิน
//6 หมายถึง ผ่านการตรวจสอบการชำระเงิน
//7 หมายถึง รอการตีพิมพ์
//ปล. สถานะนี้อาจจะแก้ไขเพิ่มเติมได้ในอนาคต


class paper extends Core_Paper
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("mol_paper", "paper");
        $this->load->model("mol_upload_file", "upload_file");
        $this->load->model("mol_evaluation", "evaluation");
        $this->load->library('form_validation');
        $this->load->library("pagination");
        $this->load->library('manage_file');
//        $this->load->library('Auth_paper');
    }

    public function index()
    {
        $id['user_id'] = $this->session->userdata('user_id');
        $config = array();
        $config["base_url"] = base_url() . "paper/index";

        $config["total_rows"] = $this->paper->get_all($id);
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $id['per_page'] = $config["per_page"];
        $id['page'] = $page;
        $id['conferences_select_id'] = $this->time->conferences_now();
        $id['operate'] = '=';

        $data['title'] = 'ส่งงานวิจัย';
        $data['btn_flg'] = 1;

        $data['public'] = $this->paper->get_public($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft_users');
        $this->load->view('paper/index', $data);

    }

    public function index_archive (){
        $id['user_id'] = $this->session->userdata('user_id');
        $config = array();
        $config["base_url"] = base_url() . "paper/index";

        $config["total_rows"] = $this->paper->get_all($id);
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $id['per_page'] = $config["per_page"];
        $id['page'] = $page;
        $id['conferences_select_id'] = $this->time->conferences_now();
        $id['operate'] = '!=';

        $data['title'] = 'รายการบทความที่ผ่านมา';
        $data['btn_flg'] = 0;

        $data['public'] = $this->paper->get_public($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft_users');
        $this->load->view('paper/index_old', $data);
    }

    public function paper_count_word($str)
    {
        include_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'libraries/THSplitLib/segment.php');
        $segment = new Segment();
        $result = $segment->get_segment_array($str);
        return count($result);
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

                $this->r = $this->paper->get_one($id);
                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft_users');

                $this->db->select('*');
                $this->db->where('time_cycle_paper_name', 'วันเปิดรับผลงานวิจัย');
                $this->db->where('time_cycle_conferences', $this->time->conferences_now());
                $q = $this->db->get('time_cycle_paper');
                $data = array_shift($q->result_array());
                $time_start = $data['time_cycle_paper_date_start'];
                $time_end = $data['time_cycle_paper_date_end'];
                $today = date("Y-m-d");

                if (($today >= $time_start) && ($today <= $time_end)) {
                    $this->load->view("paper/select", $this);
                } else {
                    echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("ไม่ได้อยู่ในช่วงแก้ไขบทความวิจัย\nการแก้ไขบทความวิจัยต้องอยู่ในช่วง ระหว่าง ' . DateThai($time_start) . ' ถึง ' . DateThai($time_end) . '"); }'
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

    public function show_detail_old($id)
    {

        if(empty($id)){
            redirect('paper');
        }

        $user_id = $this->session->userdata('user_id');

        $check_data = $this->check_data($id);

        if($check_data == true){

            $permission = $this->check_owner_paper($id,$user_id);

            if ($permission == true){

                $this->r = $this->paper->get_one($id);
                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft_users');

                $this->db->select('*');
                $this->db->where('time_cycle_paper_name', 'วันเปิดรับผลงานวิจัย');
                $this->db->where('time_cycle_conferences', $this->time->conferences_now());
                $q = $this->db->get('time_cycle_paper');
                $data = array_shift($q->result_array());
                $time_start = $data['time_cycle_paper_date_start'];
                $time_end = $data['time_cycle_paper_date_end'];
                $today = date("Y-m-d");

                if (($today >= $time_start) && ($today <= $time_end)) {
                    $this->load->view("paper/select_old", $this);
                } else {
                    echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("ไม่ได้อยู่ในช่วงแก้ไขบทความวิจัย\nการแก้ไขบทความวิจัยต้องอยู่ในช่วง ระหว่าง ' . DateThai($time_start) . ' ถึง ' . DateThai($time_end) . '"); }'
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
    

    public function paper_detail_update($p_id){

        if(empty($p_id)){
            redirect('paper');
        }

        $user_id = $this->session->userdata('user_id');

        $check_data = $this->check_data($p_id);

        if($check_data == true){

            $permission = $this->check_owner_paper($p_id,$user_id);

            if ($permission == true){

                $data['blank'] = '';
                $data['action'] = '';
                $data['btn_back'] = 'show_detail/'.$p_id;

                if (isset($p_id)) {
                    $id['paper_detail_id'] = $p_id;
                    $data['paper_detail_edit'] = $this->paper->get_public($id);
                }


                if (isset($_POST['btn_submit'])) {
                    $getcur_con = $this->paper->getCurent_conference();

                    $insert = array(
                        'paper_detail_id' => $p_id,
                        'paper_detail_name_th' => $_POST['paper_detail_name_th'],
                        'paper_detail_name_en' => $_POST['paper_detail_name_en'],
                        'department_id' => $_POST['department_id'],
                        'paper_detail_keyword_th' => $_POST['paper_detail_keyword_th'],
                        'paper_detail_keyword_en' => $_POST['paper_detail_keyword_en'],
                        'paper_detail_abstract_th' => $_POST['paper_detail_abstract_th'],
                        'paper_detail_abstract_en' => $_POST['paper_detail_abstract_en'],
                        'user_id' => $this->session->userdata('user_id'),

                    );

                    $this->form_validation->set_rules('paper_detail_name_th', 'ชื่องานวิจัยภาษาไทย', 'required|callback_th_lan_name_form_validation');
                    $this->form_validation->set_rules('paper_detail_name_en', 'ชื่องานวิจัยภาษาอังกฤษ', 'required|callback_en_lan_name_form_validation');
                    $this->form_validation->set_rules('department_id', 'สาขาวิชา', 'required|callback_id_null_breaking_validation');
                    $this->form_validation->set_rules('paper_detail_keyword_th', 'คำสำคัญภาษาไทย', 'required|callback_th_word_form_validation');
                    $this->form_validation->set_rules('paper_detail_keyword_en', 'คำสำคัญภาษาอังกฤษ', 'required|callback_en_word_form_validation');
                    $this->form_validation->set_rules('paper_detail_abstract_th', 'บทคัดย่อภาษาไทย', 'required|callback_th_lan_abs_form_validation');
                    $this->form_validation->set_rules('paper_detail_abstract_en', 'บทคัดย่อภาษาอังกฤษ', 'required|callback_en_lan_abs_form_validation');


                    if ($this->form_validation->run() == FALSE) {

                        $data['paper_detail_edit'] = '';

                    } else {

                        $data['paper_detail_edit'] = '';

                        if (isset($p_id) && trim($p_id) != '') {
                            $this->qr_status = $this->paper->getPaper_detail_status($p_id);
                            $check_status = $this->qr_status->paper_detail_status;


                            if ($check_status == 0) {

                                $data_status = array(
                                    'paper_detail_id' => $_POST['paper_detail_id'],
                                    'paper_detail_status' => 1
                                );

                                $this->paper->update_paper_status($data_status);

                            }

//                            $insert['paper_detail_id'] = $_POST['paper_detail_id'];

                            $this->paper->update($insert);
                            redirect('paper/show_detail/'.$p_id, 'refresh');
                        }


                    }

                } else
                    if (isset($_POST['btn_back'])) {
                    redirect('paper/index', 'refresh');
                }


                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft_users');

                $this->db->select('*');
                $this->db->where('time_cycle_paper_name', 'วันเปิดรับผลงานวิจัย');
                $this->db->where('time_cycle_conferences', $this->time->conferences_now());
                $q = $this->db->get('time_cycle_paper');
                $data1 = array_shift($q->result_array());
                $time_start = $data1['time_cycle_paper_date_start'];
                $time_end = $data1['time_cycle_paper_date_end'];
                $today = date("Y-m-d");
                if (($today >= $time_start) && ($today <= $time_end)) {
                    $this->load->view('paper/paper_detail_add', $data);
                } else {
                    echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("555ไม่ได้อยู่ในช่วงส่งบทความวิจัย\nการส่งบทความวิจัยต้องอยู่ในช่วง ระหว่าง ' . DateThai($time_start) . ' ถึง ' . DateThai($time_end) . '"); }'
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

    // Kong 2016/08/03 modify paper START
    public function paper_detail_add()
    {

        $data['blank'] = '';
        $data['action'] = 'paper_detail_add';
        $data['btn_back'] = '';


        if (isset($_POST['btn_submit'])) {

            $getcur_con = $this->paper->getCurent_conference();

            $insert = array(
                'paper_detail_id' => @$_POST['paper_detail_id'],
                'paper_detail_name_th' => $_POST['paper_detail_name_th'],
                'paper_detail_name_en' => $_POST['paper_detail_name_en'],
                'department_id' => $_POST['department_id'],
                'paper_detail_keyword_th' => $_POST['paper_detail_keyword_th'],
                'paper_detail_keyword_en' => $_POST['paper_detail_keyword_en'],
                'paper_detail_abstract_th' => $_POST['paper_detail_abstract_th'],
                'paper_detail_abstract_en' => $_POST['paper_detail_abstract_en'],
                'user_id' => $this->session->userdata('user_id'),

            );



            $thai_count_word = $this->paper_count_word($_POST['paper_detail_abstract_th']);
            $eng_count_word = $this->paper_count_word($_POST['paper_detail_abstract_en']);

            //|callback_th_lan_name_form_validation
            $this->form_validation->set_rules('paper_detail_name_th', 'ชื่องานวิจัยภาษาไทย', 'required|callback_th_lan_name_form_validation');
            $this->form_validation->set_rules('paper_detail_name_en', 'ชื่องานวิจัยภาษาอังกฤษ', 'required|callback_en_lan_name_form_validation');
            $this->form_validation->set_rules('department_id', 'สาขาวิชา', 'required|callback_id_null_breaking_validation');
            $this->form_validation->set_rules('paper_detail_keyword_th', 'คำสำคัญภาษาไทย', 'required|callback_th_word_form_validation');
            $this->form_validation->set_rules('paper_detail_keyword_en', 'คำสำคัญภาษาอังกฤษ', 'required|callback_en_word_form_validation');
            $this->form_validation->set_rules('paper_detail_abstract_th', 'บทคัดย่อภาษาไทย', 'required|callback_th_lan_abs_form_validation');
            $this->form_validation->set_rules('paper_detail_abstract_en', 'บทคัดย่อภาษาอังกฤษ', 'required|callback_en_lan_abs_form_validation');

            if ($this->form_validation->run() == FALSE) {
               /* if ($thai_count_word > 250) {
                    echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("บทคัดย่อไทยเกิน 250 คำ \nมีคำทั้งหมด : ' . $thai_count_word . ' คำ"); }' . '</script></body></html>';
                }
                if ($eng_count_word > 250) {
                    echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("บทคัดย่ออังกฤษเกิน 250 คำ \nมีคำทั้งหมด : ' . $eng_count_word . ' คำ"); }' . '</script></body></html>';
                }*/


            }

            else {

//                echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("บทคัดย่อไทย มีคำทั้งหมด : ' . $thai_count_word . ' คำ\nบทคัดย่ออังกฤษ มีคำทั้งหมด : ' . $eng_count_word . ' คำ"); }'
//                    . '</script></body></html>';
//
//
//                if (isset($_POST['paper_detail_id']) && trim($_POST['paper_detail_id']) != '') {
//                    $this->qr_status = $this->paper->getPaper_detail_status($_POST['paper_detail_id']);
//                    $check_status = $this->qr_status->paper_detail_status;
//
//
//                    if ($check_status == 0) {
//
//                        $data_status = array(
//                            'paper_detail_id' => $_POST['paper_detail_id'],
//                            'paper_detail_status' => 1
//                        );
//
//
//                        $this->paper->update_paper_status($data_status);
//
//                    }
//
//                    $insert['paper_detail_id'] = $_POST['paper_detail_id'];
//
//                    $this->paper->update($insert);
//                    redirect('paper/show_detail', 'refresh');
//                } else {

                    $insert['conferences_select_id'] = $getcur_con->conferences_select_id;
                    $insert['paper_numbering_code'] = $this->generate_current_number($insert['department_id']);

                    $return_id = $this->paper->create($insert);

                   redirect('paper/paper_detail_add_owner?c_id=' . $return_id);

//                }
            }

        } else if (isset($_POST['btn_back'])) {
            redirect('paper/index', 'refresh');
        }


//        if (isset($_GET['c_id'])) {
//            $id['paper_detail_id'] = $_GET['c_id'];
//            $data['paper_detail_edit'] = $this->paper->get_public($id);
//        }

        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft_users');

        $this->db->select('*');
        $this->db->where('time_cycle_paper_name', 'วันเปิดรับผลงานวิจัย');
        $this->db->where('time_cycle_conferences', $this->time->conferences_now());
        $q = $this->db->get('time_cycle_paper');
        $data1 = array_shift($q->result_array());
        $time_start = $data1['time_cycle_paper_date_start'];
        $time_end = $data1['time_cycle_paper_date_end'];
        $today = date("Y-m-d");
        if (($today >= $time_start) && ($today <= $time_end)) {
            $this->load->view('paper/paper_detail_add', $data);
        } else {
            echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("ไม่ได้อยู่ในช่วงส่งบทความวิจัย\nการส่งบทความวิจัยต้องอยู่ในช่วง ระหว่าง ' . DateThai($time_start) . ' ถึง ' . DateThai($time_end) . '"); }'
                . '</script></body></html>';
            redirect(base_url() . 'users/users_detail', 'refresh');
        }
    }

    //เอาไว้เพิ่มเจ้าของผลงาน ยังไม่ทำต่อ
    public function paper_detail_add_own()
    {
//        $data = ""
        if (isset($_GET['c_id'])) {
            $id = $_GET['c_id'];
            $result = $this->paper->get_one($id);

            if ($result) {
                $data['paper_detail_id'] = $result->paper_detail_id;
                $data['paper_detail_name_th'] = $result->paper_detail_name_th;

                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft_users');
                $this->load->view('paper/paper_owner_detail_add', $data);
            }
        }else{

            redirect('paper/index', 'refresh');
        }
    }
    public function paper_detail_add_owner(){
        if (isset($_GET['c_id']) and trim($_GET['c_id']) != '') {
            $id = $_GET['c_id'];

            $user_id = $this->session->userdata('user_id');

            $check_data = $this->check_data($id);

            if($check_data == true){

                $permission = $this->check_owner_paper($id,$user_id);

                if ($permission == true){

                    $result = $this->paper->get_one($id);

                    if ($result) {
                        $data['paper_detail_id'] = $result->paper_detail_id;
                        $data['paper_detail_name_th'] = $result->paper_detail_name_th;

                        $getowner = $this->paper->get_one($id);

                        $this->load->view('template/header/header');
                        $this->load->view('template/menuleft/menuleft_users');
                        $this->load->view('paper/paper_owner_add', $data);
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
        }else{

            redirect('paper/index', 'refresh');
        }
    }

    public function paper_owner_manage(){
        if (isset($_GET['c_id'])) {
            $id = $_GET['c_id'];
            $result = $this->paper->get_one($id);

            if ($result) {
                $data['paper_detail_id'] = $result->paper_detail_id;
                $data['paper_detail_name_th'] = $result->paper_detail_name_th;

                $getowner = $this->paper->get_one($id);

                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft_users');
                $this->load->view('paper/paper_owner_manage', $data);
            }
        }
    }

    public function paper_detail_update_owner(){
        if ((isset($_GET['c_id']) and trim($_GET['c_id']) != '') and (isset($_GET['o_id']) and trim($_GET['o_id']) != '')) {
            $id = $_GET['c_id'];
            $id_owner = $_GET['o_id'];

            $user_id = $this->session->userdata('user_id');

            $check_data = $this->check_data($id);

            if($check_data == true){

                $permission = $this->check_owner_paper($id,$user_id);

                if ($permission == true){

                    $owner_paper = $this->check_data_owner($id,$id_owner);

                    if($owner_paper == true){
                        $result = $this->paper->get_one($id);

                        if ($result) {
                            $data['paper_detail_id'] = $result->paper_detail_id;
                            $data['paper_detail_name_th'] = $result->paper_detail_name_th;

                            $owner = $this->paper->get_one_paper_owner($id_owner);

                            if ($owner) {
                                $data['paper_detail_owner_id'] = $owner->paper_detail_owner_id;
                                $data['paper_detail_owner_prename'] = $owner->paper_detail_owner_prename;
                                $data['paper_detail_owner_name'] = $owner->paper_detail_owner_name;
                                $data['paper_detail_owner_email'] = $owner->paper_detail_owner_email;
                                $data['paper_detail_owner_address'] = $owner->paper_detail_owner_address;
                                $data['paper_detail_owner_mobile'] = $owner->paper_detail_owner_mobile;
                                $data['paper_detail_owner_tel'] = $owner->paper_detail_owner_tel;
                            }

                            $this->load->view('template/header/header');
                            $this->load->view('template/menuleft/menuleft_users');
                            $this->load->view('paper/paper_owner_update', $data);
                        }
                    }else{
                        $this->load->view('template/header/header');
                        $this->load->view('template/menuleft/menuleft_users');
                        $this->load->view('permission/error_404_not_found');
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
        }else{

            redirect('paper/index', 'refresh');

        }
    }

    public function add_batch()
    {
        if (isset($_POST['btn_submit'])) {
            $paper_id = $_POST['jpaper_id'][0];

            $result = $this->paper->create_batch($_POST);
            if ($result) {
//                    echo 1;
                redirect('paper/show_detail/' . $paper_id);
            } else {
                echo 0;
            }
            exit;
        }
    }

    public function add_owner(){

        if (!$this->input->is_ajax_request()) {
            exit('no valid req.');
        }

        $this->form_validation->set_rules('paper_detail_id', 'รหัสงานวิจัย', 'required|');
        $this->form_validation->set_rules('prename', 'คำนำหน้า', 'required');
        $this->form_validation->set_rules('name', 'ชื่อ', 'required');
        $this->form_validation->set_rules('email', 'อีเมล', 'required|valid_email');
        $this->form_validation->set_rules('address', 'ที่อยู่', 'required');
        $this->form_validation->set_rules('mobile', 'เบอร์โทรศัพท์มือถือ', 'required|callback_check_mobile_number');
        $this->form_validation->set_rules('tel', 'เบอร์โทรศัพท์ที่ทำงาน', 'callback_check_phone_number');


        $this->form_validation->set_message('check_mobile_number', 'กรอก %s ไม่ถูกต้อง กรุณากรอกเป็นตัวเลขและต้องครบ 10 หลัก');
        $this->form_validation->set_message('check_phone_number', 'กรอก %s ไม่ถูกต้อง กรุณากรอกเป็นตัวเลข  แต่สามารถใส่ข้อความต่อท้ายเบอร์ได้ เช่น กด 123 , ถึง 123');
        $this->form_validation->set_message('valid_email', 'กรอก %s ไม่ถูกต้อง');


        if ($this->form_validation->run() == FALSE) {

            $data_msg['err'] = '<div class="errors">' . validation_errors() . '</div>';
            $data_msg['flag'] = false;

            $data_msg = json_encode($data_msg);

            echo $data_msg;

        }else{
            $insert = array(
                'paper_detail_id' => $_POST['paper_detail_id'],
                'paper_detail_owner_prename' => $_POST['prename'],
                'paper_detail_owner_name' => $_POST['name'],
                'paper_detail_owner_email' => $_POST['email'],
                'paper_detail_owner_address' => $_POST['address'],
                'paper_detail_owner_mobile' => $_POST['mobile'],
                'paper_detail_owner_tel' => $_POST['tel'],
                'paper_detail_owner_status' => $_POST['status'],
                'user_id' => $this->session->userdata('user_id')
            );
            if($this->paper->add_owner($insert)){

                $data_msg['err'] = '<div class="success">Your data is already add.</div>';
                $data_msg['redirect'] = 'paper_owner_manage?c_id=' . $insert['paper_detail_id'];
                $data_msg['flag'] = true;

                $data_msg = json_encode($data_msg);

                echo $data_msg;

                //redirect('paper/paper_owner_manage?c_id=' . $insert['paper_detail_id']);
            }else{
                $data_msg['err'] = '<div class="success">Data not add. Please try again.</div>';
                $data_msg['flag'] = false;

                $data_msg = json_encode($data_msg);

                echo $data_msg;
            }

        }

    }

    function check_phone_number($str){
        $result = false;
        if(preg_match('/^[0-9][d|D]?/',$str)){
            $result = true;
        }

        return $result;
    }

    function check_mobile_number($str){
        $result = false;
        if(preg_match('/^0[1-9]\d{8}$/',$str)){
            $result = true;
        }

        return $result;
    }

    public function presenter_owner(){
        if (isset($_POST['btn_submit'])) {
            if (isset($_GET['c_id']) && isset($_POST['presenter'])){

                $paper_id = $_GET['c_id'];
                $presenter = $_POST['presenter'];

                $query = $this->paper->getPeperOwner_by_paper_id($paper_id);

                foreach ($query as $rs){
                    if($rs->paper_detail_owner_id == $presenter){
                        $insert = array(
                            'paper_detail_owner_flg'    => 1,
                        );
                    }elseif ($rs->paper_detail_owner_id != $presenter){
                        $insert = array(
                            'paper_detail_owner_flg'    => 0,
                        );
                    }
                    $this->paper->updatePaper_owner_flg($insert,$rs->paper_detail_owner_id);
                }
            }
            redirect('paper/paper_owner_manage?c_id=' . $_GET['c_id']);
        }
    }

    public function update_owner(){

        if (!$this->input->is_ajax_request()) {
            exit('no valid req.');
        }


        $this->form_validation->set_rules('paper_detail_id', 'รหัสงานวิจัย', 'required|');
        $this->form_validation->set_rules('prename', 'คำนำหน้า', 'required');
        $this->form_validation->set_rules('name', 'ชื่อ', 'required');
        $this->form_validation->set_rules('email', 'อีเมล', 'required|valid_email');
        $this->form_validation->set_rules('address', 'ที่อยู่', 'required');
        $this->form_validation->set_rules('mobile', 'เบอร์โทรศัพท์มือถือ', 'required|callback_check_mobile_number');
        $this->form_validation->set_rules('tel', 'เบอร์โทรศัพท์ที่ทำงาน', 'callback_check_phone_number');


        $this->form_validation->set_message('check_mobile_number', 'กรอก %s ไม่ถูกต้อง กรุณากรอกเป็นตัวเลขและต้องครบ 10 หลัก');
        $this->form_validation->set_message('check_phone_number', 'กรอก %s ไม่ถูกต้อง กรุณากรอกเป็นตัวเลข แต่สามารถใส่ข้อความต่อท้ายเบอร์ได้ เช่น กด 123 , ถึง 123');
        $this->form_validation->set_message('valid_email', 'กรอก %s ไม่ถูกต้อง');


        if ($this->form_validation->run() == FALSE) {

            $data_msg['err'] = '<div class="errors">' . validation_errors() . '</div>';
            $data_msg['flag'] = false;

            $data_msg = json_encode($data_msg);

            echo $data_msg;

        }else{
            $insert = array(
                'paper_detail_owner_id' => $_POST['paper_detail_owner_id'],
                'paper_detail_owner_prename' => $_POST['prename'],
                'paper_detail_owner_name' => $_POST['name'],
                'paper_detail_owner_email' => $_POST['email'],
                'paper_detail_owner_address' => $_POST['address'],
                'paper_detail_owner_mobile' => $_POST['mobile'],
                'paper_detail_owner_tel' => $_POST['tel'],
                'paper_detail_owner_status' => $_POST['status'],
                'modify_date' => date("Y-m-d H:i:s"),
                'user_id' => $this->session->userdata('user_id')
            );

            if($this->paper->update_owner($insert)){

                $data_msg['err'] = '<div class="success">Your data is already update.</div>';
                $data_msg['redirect'] = 'paper_owner_manage?c_id=' . $_POST['paper_detail_id'];
                $data_msg['flag'] = true;

                $data_msg = json_encode($data_msg);

                echo $data_msg;
            }else{
                $data_msg['err'] = '<div class="success">Data not update. Please try again.</div>';
                $data_msg['flag'] = false;

                $data_msg = json_encode($data_msg);

                echo $data_msg;
            }
        }

    }

    public function delete_owner(){
        if ((isset($_GET['c_id'])) && (isset($_GET['o_id']))) {
            $id = $_GET['c_id'];
            $id_owner = $_GET['o_id'];
            $this->paper->delete_owner($id_owner);
            redirect('paper/paper_owner_manage?c_id=' . $id);
        }
    }

    //callback_validation
   /* function word_breaking_validation($str)
    {
        // $str will be field value which post. will get auto and pass to function.
        include_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'libraries/THSplitLib/segment.php');
        $count = 250;
        $segment = new Segment();
        $result = $segment->get_segment_array($str);

        if (count($result) > $count) {
            $this->form_validation->set_message("word_breaking_validation", 'คำใน %s คำเกิน 250 คำ');
            return FALSE;
        } else {
            return TRUE;
        }
    }*/




    function id_null_breaking_validation($str){
        if($str == "" || $str == null || $str == 0 || $str == "0"){
            //$this->form_validation->set_message("id_null_breaking_validation", "department_id cannot be empty.");

            return FALSE;
        }
        else{
           // $this->form_validation->set_message("id_null_breaking_validation", "ok");

            return TRUE;
        }
    }

    function en_lan_name_form_validation($str){
        if(preg_match('/^[a-z\A-Z\d\(\)\+\-\*\/\.\,\s]+$/umA', $str)){
            return true;
        }else{
            $this->form_validation->set_message("en_lan_name_form_validation", 'กรุณากรอกชื่อผลงานเป็นภาษาอังกฤษ');
           return false;
        }
    }

    function en_word_form_validation($str){
        //if(preg_match('/^[a-z\A-Z\d\(\)\+\-\*\/\.\,\s]+$/umA', $str)){
            if(preg_match('/^[a-z\A-Z\d\.\,\s]+$/umA', $str)){
            return true;
        }else{
            $this->form_validation->set_message("en_word_form_validation", 'กรุณากรอกคำสำคัญเป็นภาษาอังกฤษ');
            return false;
        }
    }

    function en_lan_abs_form_validation($str){

        if(preg_match('/^[a-z\A-Z\d\(\)\+\-\*\/\.\,\“\”\s\’\;]+$/umA', $str)){
//        if(preg_match('/^[\x20-\x7F]+$/umA', $str)){

            return true;
        }else{
            $this->form_validation->set_message("en_lan_abs_form_validation", 'กรุณากรอกบทคัดย่อเป็นภาษาอังกฤษ');
            return false;
        }
    }
//
    function th_lan_name_form_validation($str){
        
        if(preg_match('/^[\d\(\)\+\-\*\/\.\,\p{Thai}\“\”\s]|[a-z\A-Z\d\(\)\+\-\*\/\.\,\s\;]+$/umA', $str)){

            if(preg_match('/^[\d\(\)\+\-\*\/\.\,\p{Thai}\“\”\s]+$/umA', $str)){

                return true;

            }elseif(preg_match('/^[a-z\A-Z\d\(\)\+\-\*\/\.\,\s\;]+$/umA', $str)){

                $this->form_validation->set_message("th_lan_name_form_validation", 'กรุณากรอกชื่อผลงานเป็นภาษาไทย แต่สามารถมีศัพท์ภาษาอังกฤษปนอยู่ได้');
                return false;

            }else{

                return true;
            }

        }else{
            $this->form_validation->set_message("th_lan_name_form_validation", 'กรุณากรอกชื่อผลงานเป็นภาษาไทย');
            return false;
        } 
    }

    function th_lan_abs_form_validation($str){

        if(preg_match('/^[\d\(\)\+\-\*\/\.\,\p{Thai}\“\”\s]|[a-z\A-Z\d\(\)\+\-\*\/\.\,\s\;]+$/umA', $str)){

            if(preg_match('/^[\d\(\)\+\-\*\/\.\,\p{Thai}\“\”\s]+$/umA', $str)){

                return true;

            }elseif(preg_match('/^[a-z\A-Z\d\(\)\+\-\*\/\.\,\s\;]+$/umA', $str)){

                $this->form_validation->set_message("th_lan_abs_form_validation", 'ต้องมีบทคัดย่อที่เป็นภาษาไทยประกอบด้วย');
                return false;

            }else{

                return true;
            }

        }else{
            $this->form_validation->set_message("th_lan_abs_form_validation", 'กรุณากรอกบทคัดย่อเป็นภาษาไทย');
            return false;
        }
    }

    function th_word_form_validation($str){
        //if(preg_match('/^[\d\(\)\+\-\*\/\.\,\p{Thai}\“\”\s]+$/umA', $str)){
        if(preg_match('/^[\d\.\,\p{Thai}\s]+$/umA', $str)){
            return true;
        }else{
            $this->form_validation->set_message("th_word_form_validation", 'กรุณากรอกคำสำคัญเป็นภาษาไทย');
            return false;
        }
    }



    // Kong 2016/08/03 modify paper END
    //file upload function
    public function upload()
    {
        //check dir
        $dirname = date("Y_m");
        $filename = "./uploads/paper-file/" . $dirname . "/";
        $this->manage_file->check_dir($filename);
        //set preferences
        $config['upload_path'] = $filename;
        $config['allowed_types'] = 'pdf|doc|docx';
        //$config['max_size']    = '11102400';

        //load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('filename')) {
            // case - failure
            $upload_error = array('error' => $this->upload->display_errors());
            echo $upload_error['error'];
            echo $this->uri->uri_string();
            //$this->load->view('paper/select', $upload_error);
            //sleep(10);
            //redirect('/paper/show_detail/'.$_POST['paper_detail_id'], 'refresh');
            $this->output->set_header('refresh:3; url=' . 'show_detail/' . $_POST['paper_detail_id']);

        } else {
            // case - success
            $upload_data = $this->upload->data();

            $file_detail = $this->paper_numbering->getLastPerperFileNumber($_POST['paper_detail_id']);
            if (empty($file_detail)){
                $reult_paper = $this->paper->get_one($_POST['paper_detail_id']);
                $paper_code = $reult_paper->paper_numbering_code;
                $seq = "001";
                $set_file_name = $paper_code."-".$seq;
            }else{
                //NCTED-00-00-0000-[000]<- file number
                $arr_sub = explode("-", $file_detail->paper_file_show);
                $arr_sub[4] = substr("000".strval(intval($arr_sub[4])+1),-3,3);
                $set_file_name = implode("-",$arr_sub);
            }
            $set_hash_file_name = sha1(time().$set_file_name)."_o";
            $rename_file = $set_hash_file_name . $upload_data['file_ext'];
            $full_rename_file = $upload_data['file_path'] . $rename_file;
            $data_rename = rename($upload_data['full_path'], $full_rename_file);

            $data = array(
                'paper_detail_id' => $_POST['paper_detail_id'],
                'paper_file_name' => $upload_data['raw_name'],
                'paper_file_show' => $set_file_name,
                'paper_file_name_hash' => $set_hash_file_name,
                'paper_file_year_dir' => $dirname,
                'paper_file_type' => $upload_data['file_ext'],
                'paper_file_ip' => $_SERVER['REMOTE_ADDR'],
                'user_id' => $_POST['user_id'],
            );
            $file_id = $this->upload_file->insert_file($data);

            $data_hash = array(
                'paper_file_id'         => $file_id,
                'paper_file_hash_str'   => sha1(time().$file_id),
            );
            $file_hash_id = $this->upload_file->insert_file_hash($data_hash);

            $data_status = array(

                'paper_detail_id' => $_POST['paper_detail_id'],
                'paper_detail_status' => 3,
                'paper_last_file_id' => $file_id,
            );
            $this->paper->update($data_status);

            $data['success_msg'] = '<div class="alert alert-success text-center">Your file <strong>' . $upload_data['file_name'] . '</strong> was successfully uploaded!</div>';
            $data['rename_file'] = $set_file_name;
            $data['upload_data'] = $upload_data['full_path'];
            //$this->load->view('paper/select', $data);
            //redirect($this->uri->uri_string());
            redirect('/paper/show_detail/' . $data['paper_detail_id'], 'refresh');
        }
    }

    public function result(){

        $this->load->model("mol_paper2", "paper2");
        $user_id = $this->session->userdata('user_id');
        if(isset($_GET['c_id'])){
            $id = $_GET['c_id'];
            $check_eval = $this->check_evaluation($id);
            if($check_eval == true){
                $result = $this->evaluation->get_evaluation_comment_by_one($id);
                if($result){
                    $permission = $this->check_owner_paper($result->paper_detail_id,$user_id);
                    $check_flag = $this->check_paper_file_flag($result->paper_file_id);
                    if(($permission && $check_flag) == true){
                        $owner = $this->paper2->getPeperOwnerPresent_by_paper_id($result->paper_detail_id);
                        $data['paper_detail_owner_name'] = $owner->paper_detail_owner_name;

                        $reviewer_detail = $this->paper2->getUser_detail($result->user_id);
                        $data['commeettee_fname'] = $reviewer_detail->commeettee_fname;

                        $data['evaluation_id'] = $result->evaluation_id;
                        $data['paper_detail_id'] = $result->paper_detail_id;
                        $data['paper_detail_name'] = $result->paper_detail_name_th;
                        $data['number1'] = $result->evaluation_number1;
                        $data['number2'] = $result->evaluation_number2;
                        $data['number3'] = $result->evaluation_number3;
                        $data['number4'] = $result->evaluation_number4;
                        $data['number5'] = $result->evaluation_number5;
                        $data['number6'] = $result->evaluation_number6;
                        $data['number7'] = $result->evaluation_number7;
                        $data['number8'] = $result->evaluation_number8;
                        $data['number9'] = $result->evaluation_number9;
                        $data['number10'] = $result->evaluation_number10;
                        $data['comment'] = $result->paper_file_evaluation_comment_text;
                        $data['file'] = $result->paper_file_eval_hash_str;
                        $data['file_show'] = $result->paper_file_evaluation_comment_file;

                        $this->load->view('template/header/header');
                        $this->load->view('template/menuleft/menuleft_users');
                        $this->load->view('evaluation/evaluated_view',$data);
                    }else{
                        $this->load->view('template/header/header');
                        $this->load->view('template/menuleft/menuleft_users');
                        $this->load->view('permission/permission_denied');
                    }
                }
            }else{
                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft_users');
                $this->load->view('permission/error_404_not_found');
            }
        }
    }
}
