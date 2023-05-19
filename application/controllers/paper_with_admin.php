<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paper_with_admin
 *
 * @author kong
 */

//สถานะของบทความ
//0 หมายถึง บทความไม่ผ่าน
//1 หมายถึง กำลังตรวจสอบหัวข้อ
//2 หมายถึง ผ่านการตรวจสอบหัวข้องานวิจัย
//3 หมายถึง รอการตรวจสอบงานวิจัย
//4 หมายถึง ผ่าน รอการตรวจสอบการชำระเงิน
//5 หมายถึง อยู่ระหว่างการตรวจสอบการขำระเงิน
//6 หมายถึง ผ่านการตรวจสอบการชำระเงิน
//7 หมายถึง รอการตีพิมพ์
//ปล. สถานะนี้อาจจะแก้ไขเพิ่มเติมได้ในอนาคต
//^ อันเก่า
// อันใหม่
// 1 สถานะเริ่มต้นตั้งแต่ส่งบทความ เป็น 1
// 2 ส่งไฟล์ของงานวิจัย สถานะ เป็น 3
// 3 การตรวงสอบไฟล์ก็จะมีอีก สาม สถานะคือ ผ่านโดยไม่ต้องแก้ไข ผ่านแต่มีการแก้ไข ไม่ผ่าน


class paper_with_admin extends Core_Paper_with_admin
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("mol_paper2", "paper2");
        $this->load->model("mol_evaluation", "evaluation");
        $this->load->model("mol_paper_with_admin", "paper_admin");
        $this->load->model("mol_paper", "paper");
        $this->load->model("mol_upload_file", "upload_file");
        $this->load->model("mol_email","sys_email");
        $this->load->library('form_validation');
        $this->load->library("pagination");
    }

    public function index()
    {
        redirect('/paper_with_admin/approve_paper');

        /* old function *
        $id['user_id'] = $this->session->userdata('user_id');
        $config = array();
        $config["base_url"] = base_url() . "paper/index";

        $config["total_rows"] = $this->paper_admin->get_all($id);
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $id['per_page'] = $config["per_page"];
        $id['page'] = $page;

        $data['public'] = $this->paper_admin->get_public($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('paper-admin/index', $data);
        */
    }

    public function show_detail($id)
    {
        $this->load->database();
        $this->r = $this->paper_admin->get_one($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view("paper-admin/select", $this);
    }

    public function share_research()
    {
        $id['user_id'] = $this->session->userdata('user_id');
//        $config = array();
//        $config["base_url"] = base_url() . "paper/share_research";

//        $config["total_rows"] = $this->paper_admin->get_all($id);
//        $config["per_page"] = 20;
//        $config["uri_segment"] = 3;
//        $choice = $config["total_rows"] / $config["per_page"];
//        $config["num_links"] = round($choice);

//        $this->pagination->initialize($config);

//        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//        $data["links"] = $this->pagination->create_links();
//        $id['per_page'] = $config["per_page"];
//        $id['page'] = $page;
//        $id['paper_detail_status_start'] = '3';
        $id['paper_detail_status_end']   = '3';
//        $id['paper_file_status'] = '0';
//        $id['paper_file_flg'] = '0';

        $id['conferences_select_id'] = $this->time->conferences_now();
        $id['operate'] = '=';

        $data['public'] = $this->paper_admin->get_paper_checked($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('paper-admin/share_research', $data);
    }

    public function share_research_detail($id = null)
    {
        if(isset($id)){
            $this->load->database();
            $this->r = $this->paper_admin->get_one($id);

            $this->load->view('template/header/header');
            $this->load->view('template/menuleft/menuleft');
            $this->load->view("paper-admin/share_research_detail", $this);
        }else{
            redirect('/paper_with_admin/share_research/', 'refresh');
        }
    }

    public function select_reviewer()
    {

        if (isset($_GET['c_id'])) {
            $id = $_GET['c_id'];
            if(isset($_GET['re'])){
                $re = $_GET['re'];
                $result = $this->paper_admin->get_one($id);

                if ($result) {
                    $data['paper_detail_id'] = $result->paper_detail_id;
                    $data['paper_detail_name_th'] = $result->paper_detail_name_th;
                    $data['department_id'] = $result->department_id;
                    $data['department_name'] = $result->department_name;
                    $data['reviewer_number'] = $re;

                    $result_reviewer = $this->paper_admin->getUser_committee($data['department_name']);

                    $second_compare_reviewer = $this->paper_admin->getUser_paper_reviewer($data['paper_detail_id']);

                    $array_reviewer = json_decode(json_encode($result_reviewer), True);

                    $split_uid1 = array_map(function ($ar) {return $ar['user_id'];}, $array_reviewer);
                    $split_uid2 = array_map(function ($ar) {return $ar['user_id'];}, $second_compare_reviewer);

                    $result_diff = array_diff($split_uid1,$split_uid2);

                    $result_committee = $this->paper_admin->getUser_committee_where_in($result_diff);

                    $data['second_compare_reviewer'] = $second_compare_reviewer;
                    $data['result_reviewer'] = $result_committee;

                    $this->load->view('template/header/header');
                    $this->load->view('template/menuleft/menuleft');
                    $this->load->view('paper-admin/select_reviewer', $data);
                }
            }else{
                redirect('/paper_with_admin/share_research_detail/' . $id, 'refresh');
            }
        }else{
            redirect('/paper_with_admin/share_research/', 'refresh');
        }
    }

    public function check_paper()
    {

        $data_status = array(

            'paper_detail_id' => $_POST['paper_detail_id'],
            'paper_detail_status' => $_POST['selected_status']
        );
        $user_id = $_POST['user_id'];
        $this->status = $this->paper_admin->getPaper_status($data_status['paper_detail_status']);
        $qr_status = $this->status->paper_detail_status_name;
        //////////////////
        $this->r = $this->paper_admin->getEmail_from_user($user_id);
        if ($this->r) {

            $this->paper_admin->update($data_status);

            $email = $this->r->email;

            $this->sys_email->sendingStatus_to_Email($email, $qr_status, $data_status['paper_detail_id']);

            redirect('/paper_with_admin/show_detail/' . $data_status['paper_detail_id'], 'refresh');
        }


    }

    /**
     *
     */
    public function reviewer_check_paper()
    {

        if (isset($_POST['btn_submit'])) {
            $insert =array();

            if (isset($_POST['reviewer1']) && trim($_POST['reviewer1'] != '')) {
                $insert['paper_file_owner_comment1'] = $_POST['reviewer1'];
            }
            if (isset($_POST['reviewer2']) && trim($_POST['reviewer2'] != '')) {
                $insert['paper_file_owner_comment2'] = $_POST['reviewer2'];
            }
            if (isset($_POST['reviewer3']) && trim($_POST['reviewer3'] != '')) {
                $insert['paper_file_owner_comment3'] = $_POST['reviewer3'];
            }
            if (isset($_POST['reviewer4']) && trim($_POST['reviewer4'] != '')) {
                $insert['paper_file_owner_comment4'] = $_POST['reviewer4'];
            }

            $insert['paper_detail_id'] = $_POST['paper_detail_id'];
            $insert['user_id'] = $this->session->userdata('user_id');
        }


        if ($this->paper_admin->check_reviewer($insert['paper_detail_id']) > 0) {
            //update
            $this->paper_admin->update_reviewer($insert);
        } else {
            //insert
            $this->paper_admin->insert_reviewer($insert);
        }

        if (isset($insert['paper_file_owner_comment1']) && trim($insert['paper_file_owner_comment1'] != '')) {

            $this->r = $this->paper_admin->getEmail_from_user($insert['paper_file_owner_comment1']);
            if ($this->r) {
                $email = $this->r->email;

                $this->sys_email->sendingStatus_to_Email_reviewer_with_admin($email, $insert['paper_detail_id']);

            }
        }

        if (isset($insert['paper_file_owner_comment2']) && trim($insert['paper_file_owner_comment2'] != '')) {

            $this->r = $this->paper_admin->getEmail_from_user($insert['paper_file_owner_comment2']);
            if ($this->r) {
                $email = $this->r->email;

                $this->sys_email->sendingStatus_to_Email_reviewer_with_admin($email, $insert['paper_detail_id']);

            }
        }

        if (isset($insert['paper_file_owner_comment3']) && trim($insert['paper_file_owner_comment3'] != '')) {

            $this->r = $this->paper_admin->getEmail_from_user($insert['paper_file_owner_comment3']);
            if ($this->r) {
                $email = $this->r->email;

                $this->sys_email->sendingStatus_to_Email_reviewer_with_admin($email, $insert['paper_detail_id']);

            }
        }

        if (isset($insert['paper_file_owner_comment4']) && trim($insert['paper_file_owner_comment4'] != '')) {

            $this->r = $this->paper_admin->getEmail_from_user($insert['paper_file_owner_comment4']);
            if ($this->r) {
                $email = $this->r->email;

                $this->sys_email->sendingStatus_to_Email_reviewer_with_admin($email, $insert['paper_detail_id']);

            }
        }

//        redirect('/paper_with_admin/share_research_detail/'.$_POST['paper_detail_id'], 'refresh');
        redirect('/paper_with_admin/share_research_detail/' . $insert['paper_detail_id']);
    }


    public function update_status()
    {

        $data = array(
            'paper_file_format_status' => $this->input->post('selected_status'),


        );

        $data_status = array(

            'paper_detail_id' => $_POST['paper_detail_id'],
            'paper_detail_status' => 4
        );

        $selected_status = $this->input->post('selected_status');
        $paper_detail_id = $this->input->post('paper_detail_id');
        $file_id = $this->input->post('file_id');
        $user_id = $this->input->post('user_id');


        if ($this->paper_admin->updateFile_status($data, $file_id) >= 1) {
            $this->r = $this->paper_admin->getEmail_from_user($user_id);
            if ($this->r) {
                if ($selected_status == "ผ่าน ได้รับการพิจารณา กรุณาชำระเงิน") {
                    $this->paper_admin->update($data_status);
                }


                $email = $this->r->email;

                $this->sys_email->sendingStatus_to_Email($email, $selected_status, $paper_detail_id);

                redirect('/paper_with_admin/show_detail/' . $paper_detail_id, 'refresh');
            }
        }
    }

    public function approve_paper(){
        $id['user_id'] = $this->session->userdata('user_id');
        $config = array();
//        $config["base_url"] = base_url() . "paper/share_research";
//
//        $config["total_rows"] = $this->paper_admin->get_all($id);
//        $config["per_page"] = 20;
//        $config["uri_segment"] = 3;
//        $choice = $config["total_rows"] / $config["per_page"];
//        $config["num_links"] = round($choice);
//
//        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
//        $id['per_page'] = $config["per_page"];
        $id['page'] = $page;
        $id['paper_detail_status'] = '3';
        $id['paper_file_status'] = '0';
        $id['paper_file_flg'] = '0';

        $data_arr = $this->paper_admin->get_paper_checked($id);

        $data_arr = $this->check_evaluated_to_public_data($data_arr);

        $data['public'] = $data_arr;

        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('paper-admin/app_paper', $data);
    }

    public function paper_checked(){
//        $id['user_id'] = $this->session->userdata('user_id');
//        $config = array();
//        $config["base_url"] = base_url() . "paper/share_research";
//
//        $config["total_rows"] = $this->paper_admin->get_all($id);
//        $config["per_page"] = 20;
//        $config["uri_segment"] = 3;
//        $choice = $config["total_rows"] / $config["per_page"];
//        $config["num_links"] = round($choice);
//
//        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
//        $id['per_page'] = $config["per_page"];
        $id['page'] = $page;
        $id['paper_detail_status'] = '3';
        $id['paper_file_status'] = '2';
        $id['paper_file_flg'] = '1';

        $data_arr = $this->paper_admin->get_paper_checked($id);

//        $data_arr = $this->check_evaluated_to_public_data($data_arr);
        $data['public'] = $data_arr;

        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('paper-admin/paper_checked', $data);
    }

    public function approve_paper_detail($id = null){
        if(isset($id)){
            $check_data = $this->check_data($id);
            if($check_data == true){
                $this->r = $this->paper_admin->get_one($id);

                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft');
                $this->load->view("paper-admin/app_paper_detail", $this);
            }else{
                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft');
                $this->load->view('permission/error_404_not_found');
            }
        }else{
            redirect('/paper_with_admin/approve_paper/', 'refresh');
        }
    }

    public function paper_checked_detail($id = null){
        if(isset($id)){
            $check_data = $this->check_data($id);
            if($check_data == true){
                $this->r = $this->paper_admin->get_one($id);

                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft');
                $this->load->view("paper-admin/paper_checked_detail", $this);
            }else{
                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft');
                $this->load->view('permission/error_404_not_found');
            }
        }else{
            redirect('/paper_with_admin/approve_paper/', 'refresh');
        }
    }

    public function app_update_status()
    {
        //get paper
        $paper_detail = $this->check->get_Paper($_POST['paper_detail_id']);

        $data = array(
            'paper_file_id' => $this->input->post('paper_file_id'),
            'paper_file_format_status' => $this->input->post('paper_file_format_status'),
            'paper_file_status' => $this->input->post('selected_status'),
            'paper_file_flg' => 1,
        );

        $result = $this->paper_admin->update_status_file($data);

        $get_email = $this->paper_admin->getEmail_from_user($paper_detail->user_id);
        $email = $get_email->email;
        $data_status = array(
            'paper_detail_id' => $_POST['paper_detail_id']
        );

        if($data['paper_file_status'] == 3){

            $data_status['paper_detail_status'] = 4;

            if ($get_email) {

                $selected_status_msg = "ผ่าน ได้รับการพิจารณา กรุณาชำระเงิน";
                $this->paper_admin->update($data_status);
                $this->sys_email->sendingStatus_to_Email($email, $selected_status_msg, $data_status['paper_detail_id']);
            }
        }elseif($data['paper_file_status'] == 2){

            if ($get_email) {

                $selected_status_msg = "ผ่านแต่มีการแก้ไข";
                $this->sys_email->sendingStatus_to_Email($email, $selected_status_msg, $data_status['paper_detail_id']);
            }
        }elseif($data['paper_file_status'] == 1){

            $data_status['paper_detail_status'] = 0;

            if ($get_email) {

                $selected_status_msg = "ไม่ผ่านการพิจารณา";
                $this->paper_admin->update($data_status);
                $this->sys_email->sendingStatus_to_Email($email, $selected_status_msg, $data_status['paper_detail_id']);
            }
        }else{
            echo "ไม่พบสถานะ";
        }

        redirect('/paper_with_admin/approve_paper_detail/' . $data_status['paper_detail_id'], 'refresh');

    }

    public function result(){
        $user_id = $this->session->userdata('user_id');

        if(isset($_GET['c_id']) && trim($_GET['c_id'] != '')){
            $id = $_GET['c_id'];
            $check_eval = $this->check_evaluation($id);
            if($check_eval == true){
                $result = $this->evaluation->get_evaluation_comment_by_one($id);
                if($result){

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
                    $this->load->view('template/menuleft/menuleft');
                    $this->load->view('evaluation/evaluated_view',$data);
                }
            }else{
                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft');
                $this->load->view('permission/error_404_not_found');
            }
        }else{
            redirect('paper_with_admin');
        }
    }
    public function multi_app_update_conf(){

        if(!empty($_POST['seclected_tb'])){
            $selected_id = $_POST['seclected_tb'];
        }
        if(!empty($_POST['selected_status'])){
            $selected_status = $_POST['selected_status'];
        }

        $array_reviewer = $this->paper_admin->getPaper_select($selected_id);
        $data = json_decode(json_encode($array_reviewer), True);

        $data = $this->check_evaluated_to_public_data($data);

        $data['public'] = $data;
        $data['selected_status'] = $selected_status;

        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('paper-admin/app_paper_multi', $data);

    }

    public function multi_app_update_done(){

        if(!empty($_POST['seclected_tb'])){
            $selected_id = $_POST['seclected_tb'];
        }
        if(!empty($_POST['paper_file_format_status'])){
            $paper_file_format_status = $_POST['paper_file_format_status'];
        }
        if(!empty($_POST['selected_status'])){
            $selected_status = $_POST['selected_status'];
        }

        $array_reviewer = $this->paper_admin->getPaper_select($selected_id);
        $data = json_decode(json_encode($array_reviewer), True);

        if ($selected_status == 3){
            for($i=0;$i<count($data);$i++){
                if($data[$i]['paper_last_file_id'] !=0){

                    $data_arr = array(
                        'paper_file_id' => $data[$i]['paper_last_file_id'],
                        'paper_file_format_status' => $paper_file_format_status,
                        'paper_file_status' => $selected_status,
                        'paper_file_flg' => 1,
                    );

                    $result = $this->paper_admin->update_status_file($data_arr);
                }
                $data_status = array(
                    'paper_detail_id' => $data[$i]['paper_detail_id'],
                    'paper_detail_status' => 4
                );
                $this->r = $this->paper_admin->getEmail_from_user($data[$i]['user_id']);

                $email = $this->r->email;
                $selected_status_msg = "ผ่าน ได้รับการพิจารณา กรุณาชำระเงิน";

                $this->paper_admin->update($data_status);
                $this->sys_email->sendingStatus_to_Email($email, $selected_status_msg, $data[$i]['paper_detail_id']);
            }
        }elseif($selected_status == 2){
            for($i=0;$i<count($data);$i++){
                if($data[$i]['paper_last_file_id'] !=0){

                    $data_arr = array(
                        'paper_file_id' => $data[$i]['paper_last_file_id'],
                        'paper_file_format_status' => $paper_file_format_status,
                        'paper_file_status' => $selected_status,
                        'paper_file_flg' => 1,
                    );

                    $result = $this->paper_admin->update_status_file($data_arr);
                }

                $this->r = $this->paper_admin->getEmail_from_user($data[$i]['user_id']);

                $email = $this->r->email;
                $selected_status_msg = "ผ่านแต่มีการแก้ไข";

                $this->sys_email->sendingStatus_to_Email($email, $selected_status_msg, $data[$i]['paper_detail_id']);
            }
        }elseif($selected_status == 1){
            for($i=0;$i<count($data);$i++){
                if($data[$i]['paper_last_file_id'] !=0){

                    $data_arr = array(
                        'paper_file_id' => $data[$i]['paper_last_file_id'],
                        'paper_file_format_status' => $paper_file_format_status,
                        'paper_file_status' => $selected_status,
                        'paper_file_flg' => 1,
                    );

                    $result = $this->paper_admin->update_status_file($data_arr);
                }
                $data_status = array(
                    'paper_detail_id' => $data[$i]['paper_detail_id'],
                    'paper_detail_status' => 0
                );

                $this->r = $this->paper_admin->getEmail_from_user($data[$i]['user_id']);

                $email = $this->r->email;
                $this->paper_admin->update($data_status);
                $selected_status_msg = "ไม่ผ่านการพิจารณา";

                $this->sys_email->sendingStatus_to_Email($email, $selected_status_msg, $data[$i]['paper_detail_id']);
            }
        }else{
            echo "ไม่พบสถานะ";
        }

        redirect('/paper_with_admin/approve_paper', 'refresh');

    }

    /** จัดการการแสดงผู้ตรวจว่าตรวจแล้วหรือยังไม่ตรวจ
     * @param array $data
     * @return array
     */
    protected function check_evaluated_to_public_data($data = array()){
        //set file status show on list
        $temp_data_review = array();

        for($i=0;$i<count($data);$i++){

            $rs1 = $this->paper_admin->getUser_paper_reviewer($data[$i]['paper_detail_id']);

            if(!empty($rs1)){

                for($j=0;$j<count($rs1);$j++){
                    if($rs1[$j]['user_id'] != 0){

                        $eval1 = $this->paper_admin->getEvaluation_by_file_id($data[$i]['paper_last_file_id'],$rs1[$j]['user_id']);
                        $eval1_decode = json_decode(json_encode($eval1), True);

                        if(!empty($eval1_decode)){
                            $temp_data_review[$i][$j]['user_id'] = $rs1[$j]['user_id'];
                            $temp_data_review[$i][$j]['evaluation_id'] = $eval1_decode['evaluation_id'];
                        }else{
                            $temp_data_review[$i][$j]['user_id'] = $rs1[$j]['user_id'];
                            $temp_data_review[$i][$j]['evaluation_id'] = '0';
                        }
                    }
                    $temp_data_review[$i] = array_values($temp_data_review[$i]);
                }
            }
            else{
                $temp_data_review[$i] = null;
            }
            $data[$i]['evaluation_reviewer'] = $temp_data_review[$i];
        }

        return $data;
    }
}