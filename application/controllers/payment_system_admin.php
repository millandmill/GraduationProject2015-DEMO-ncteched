<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of payment_system_admin
 *
 * @author kong
 */
class payment_system_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        $this->load->model("mol_payment_system_admin", "payment_system_admin");


        //$this->load->model("mol_upload_file", "upload_file");
        $this->load->library('form_validation');
        $this->load->library("pagination");
    }

    public function index()
    {
        $this->app_payment_index();

        /**
         * old index
         */
        /*
        $id['user_id'] = $this->session->userdata('user_id');
        $data['public'] = $this->payment_system_admin->get_public($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('payment-system-admin/index', $data);
        */
    }

    public function app_payment_index(){
        $id['user_id'] = $this->session->userdata('user_id');



        $data_arr = $this->payment_system_admin->get_public($id);

        for ($i=0;$i<count($data_arr);$i++){
            $array_file_temp = $this->payment_system_admin->getPayment_last($data_arr[$i]['paper_detail_id']);

            $array_file_temp = json_decode(json_encode($array_file_temp), True);

            $data_arr[$i]['payment_system_id'] = @$array_file_temp[0]['payment_system_id'];
            $data_arr[$i]['payment_system_showslip_filename'] = @$array_file_temp[0]['payment_system_showslip_filename'];
            $data_arr[$i]['payment_flg'] = @$array_file_temp[0]['payment_flg'];
            $data_arr[$i]['payment_system_hash_str'] = @$array_file_temp[0]['payment_system_hash_str'];
            $data_arr[$i]['payment_system_date'] = @$array_file_temp[0]['payment_system_date'];
        }

        $data['public'] = $data_arr;

        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('payment-system-admin/app_payment_index', $data);
    }

    function downloadFilePayment($id){

        $this->load->helper('download');

        $path_file = './uploads/payment-file/';
        $file = $this->payment_system_admin->getPayment_last($id);
        $file = json_decode(json_encode($file), True);

        $data = file_get_contents($path_file.$file[0]['payment_system_showslip_filename']);
        $name = $file[0]['payment_system_showslip_filename'];
        force_download($name, $data);
    }

    public function multi_app_update_conf(){
        $selected_id="";
        $selected_status="";
        if(!empty($_POST['seclected_tb'])){
            $selected_id = $_POST['seclected_tb'];
        }
        if(!empty($_POST['selected_status'])){
            $selected_status = $_POST['selected_status'];
        }

//        $data_arr = $this->payment_system_admin->get_public($selected_id);

        $data_arr = $this->payment_system_admin->getPaper_select($selected_id);
        $data_arr = json_decode(json_encode($data_arr), True);

        $data['public'] = $data_arr;
        $data['selected_status'] = $selected_status;

        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('payment-system-admin/app_payment_index_conf', $data);

    }

    public function multi_app_update_done(){
        if(!empty($_POST['seclected_tb'])){
            $selected_id = $_POST['seclected_tb'];
        }
        if(!empty($_POST['selected_status'])){
            $selected_status = $_POST['selected_status'];
        }

        $data_paper = array(
            'paper_detail_status' => 6,
        );


        $data_detail = array(
            'payment_system_status' => $selected_status,
            'payment_flg' => 1,
        );

        //สถานะของบทความ
        //1 หมายถึง กำลังตรวจสอบหัวข้อ
        //2 หมายถึง ผ่านการตรวจสอบหัวข้องานวิจัย
        //3 หมายถึง รอการตรวจสอบงานวิจัย
        //4 หมายถึง ผ่าน รอการตรวจสอบการชำระเงิน
        //5 หมายถึง อยู่ระหว่างการตรวจสอบการขำระเงิน
        //6 หมายถึง ผ่านการตรวจสอบการชำระเงิน
        //7 หมายถึง รอการตีพิมพ์
        //ปล. สถานะนี้อาจจะแก้ไขเพิ่มเติมได้ในอนาคต

        for($i=0;$i<count($selected_id);$i++){

           $data =  $this->payment_system_admin->getPaper_select($selected_id[$i]);
           $data = json_decode(json_encode($data), True);
            if ($this->payment_system_admin->updateFileDetail_status($data_detail, $selected_id[$i]) >= 1) {

                if ($selected_status == 'ชำระเงินเรียบร้อยแล้ว') {
                    $this->payment_system_admin->update_paper_detail_status($data_paper, $selected_id[$i]);

                    $this->update_paper_index($selected_id[$i]);

                }

                $this->r = $this->payment_system_admin->getEmail_from_user($data[0]['user_id']);
                if ($this->r) {

                    $email = $this->r->email;

                    $this->payment_system_admin->sendingStatus_to_Email($email, $selected_status, $selected_id[$i]);
                }
            }
        }
        redirect('/payment_system_admin/app_payment_index/', 'refresh');

    }

    private function update_paper_index($id){
        $get_data = $this->payment_system_admin->get_one($id);
        $get_owner = $this->payment_system_admin->getOwner($id);

        $all_owner = array();
        foreach ($get_owner as $ower){
            array_push($all_owner,$ower->paper_detail_owner_name);
        }
        $set_owner = implode(" และ ", $all_owner);

        $get_conference = $this->payment_system_admin->select_conference($get_data->conferences_select_id);

        $ex_conference = explode("/",$get_conference->conferences_select_note);

        $insert_index = array(
            'index_paper_file_key'      => $get_data->paper_numbering_code,
            'index_paper_file_name'     => $get_data->paper_detail_name_th,
            'index_paper_file_author'   => $set_owner,
            'index_paper_file_year'     => $ex_conference[0],
            'index_paper_file_no'       => $ex_conference[1],
            'index_paper_file_department_name'  => $get_data->department_name,
        );
        $last_id = $this->payment_system_admin->copyPaperToIndex($insert_index);

        $insert_hash_file = array(
            'paper_file_id'             => $get_data->paper_last_file_id,
            'index_paper_file_id'       => $last_id,
            'paper_file_index_hash_str' => sha1('index'.time().$last_id),
        );

        $file_hash_id = $this->payment_system_admin->insert_file_index_hash($insert_hash_file);
    }

    public function index2()
    {
        $id['user_id'] = $this->session->userdata('user_id');
        $data['public'] = $this->payment_system_admin->get_public2($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view('payment-system-admin/index2', $data);
    }

    public function show_detail2($id)
    {
        $this->load->database();
        $this->r = $this->payment_system_admin->get_one($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view("payment-system-admin/select2", $this);
    }

    public function show_detail($id)
    {
        $this->load->database();
        $this->r = $this->payment_system_admin->get_one($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft');
        $this->load->view("payment-system-admin/select", $this);
    }


    public function update_status()
    {

        $data = array(
            'payment_system_status' => $this->input->post('selected_status'),
        );

        $data_detail = array(
            'payment_flg' => 1,
        );

        $data_paper = array(
            'paper_detail_status' => 6,
        );
        //สถานะของบทความ
        //1 หมายถึง กำลังตรวจสอบหัวข้อ
        //2 หมายถึง ผ่านการตรวจสอบหัวข้องานวิจัย
        //3 หมายถึง รอการตรวจสอบงานวิจัย
        //4 หมายถึง ผ่าน รอการตรวจสอบการชำระเงิน
        //5 หมายถึง อยู่ระหว่างการตรวจสอบการขำระเงิน
        //6 หมายถึง ผ่านการตรวจสอบการชำระเงิน
        //7 หมายถึง รอการตีพิมพ์
        //ปล. สถานะนี้อาจจะแก้ไขเพิ่มเติมได้ในอนาคต

        $selected_status = $this->input->post('selected_status');
        $paper_detail_id = $this->input->post('paper_detail_id');
        $file_id = $this->input->post('file_id');
        $user_id = $this->input->post('user_id');

        //$this->paper_admin->updateFile_status($data,$file_id);

        if ($this->payment_system_admin->updateFile_status($data, $file_id) >= 1) {

            $this->payment_system_admin->updateFileDetail_status($data_detail, $paper_detail_id);

            if ($selected_status == 'ชำระเงินเรียบร้อยแล้ว') {
                $this->payment_system_admin->update_paper_detail_status($data_paper, $paper_detail_id);

                //จัดการคัดลอกข้อมูลขึ้นโชว์หน้า index หลังจากแจกการจ่ายเงินเรียบร้อย
                $this->update_paper_index($paper_detail_id);
            }

            $this->r = $this->payment_system_admin->getEmail_from_user($user_id);
            if ($this->r) {

                $email = $this->r->email;

                $this->payment_system_admin->sendingStatus_to_Email($email, $selected_status, $paper_detail_id);

                redirect('/payment_system_admin/show_detail/' . $paper_detail_id, 'refresh');
            }
        }

    }
}
