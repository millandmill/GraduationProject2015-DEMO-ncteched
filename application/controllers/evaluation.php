<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of evaluation
 *
 * @author Kong
 */
class evaluation extends Core_Evaluation {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("mol_evaluation", "evaluation");
        $this->load->model("mol_paper2", "paper2");
        $this->load->library('form_validation');
        $this->load->library("pagination");
        $this->load->library('manage_file');
    }
    
    public function index(){
        $user_id = $this->session->userdata('user_id');
        $check_permission  = $this->check_type_evaluation($user_id);

        if($check_permission['user_type'] == 2){
            redirect('paper2');
        }elseif ($check_permission['user_type'] == 1){
            redirect('paper_with_admin');
        }elseif($check_permission['user_type'] == 0){
            redirect('paper');
        }
    }
    
    public function evaluation_add()
    {

        $data['blank'] = '';

        if (isset($_POST['btn_submit'])) {
            $insert = array(
                'paper_detail_id' => $_POST['paper_id'],
                'paper_file_id' => $_POST['file_id'],
                'evaluation_number1' => $_POST['number1'],
                'evaluation_number2' => $_POST['number2'],
                'evaluation_number3' => $_POST['number3'],
                'evaluation_number4' => $_POST['number4'],
                'evaluation_number5' => $_POST['number5'],
                'evaluation_number6' => $_POST['number6'],
                'evaluation_number7' => $_POST['number7'],
                'evaluation_number8' => $_POST['number8'],
                'evaluation_number9' => $_POST['number9'],
                'evaluation_number10' => $_POST['number10'],
                'user_id' => $this->session->userdata('user_id')
            );

            $this->form_validation->set_rules('number1', 'ข้อที่ 1', 'required');
            $this->form_validation->set_rules('number2', 'ข้อที่ 2', 'required');
            $this->form_validation->set_rules('number3', 'ข้อที่ 3', 'required');
            $this->form_validation->set_rules('number4', 'ข้อที่ 4', 'required');
            $this->form_validation->set_rules('number5', 'ข้อที่ 5', 'required');
            $this->form_validation->set_rules('number6', 'ข้อที่ 6', 'required');
            $this->form_validation->set_rules('number7', 'ข้อที่ 7', 'required');
            $this->form_validation->set_rules('number8', 'ข้อที่ 8', 'required');
            $this->form_validation->set_rules('number9', 'ข้อที่ 9', 'required');
            $this->form_validation->set_rules('number10', 'ข้อที่ 10', 'required');


            if ($this->form_validation->run() == FALSE) {

            } else {
                $return_id = $this->evaluation->insert($insert);

                redirect('evaluation/add_result?c_id=' . $return_id);
            }
        } else if (isset($_POST['btn_back'])) {
            redirect('evalualion/index');
        }

        if (isset($_GET['c_id']) and trim($_GET['c_id']) != '') {
            $id = $_GET['c_id'];
            $user_id = $this->session->userdata('user_id');
            if (isset($id)) {
                $check_data = $this->check_data_evaluate($id);
                if ($check_data == true) {

                    $result = $this->paper2->get_file_by_paper($id);
                    $permission = $this->check_owner_reviewer($result->paper_detail_id, $user_id);
                    if ($permission == true) {

                        if ($result) {
                            $data['paper_file_id'] = $result->paper_file_id;
                            $data['paper_detail_id'] = $result->paper_detail_id;
                            $data['paper_detail_name_th'] = $result->paper_detail_name_th;

                            $owner = $this->paper2->getPeperOwnerPresent_by_paper_id($result->paper_detail_id);
                            $data['paper_detail_owner_name'] = $owner->paper_detail_owner_name;

                            $user_id = $this->session->userdata('user_id');
                            $reviewer_detail = $this->paper2->getUser_detail($user_id);
                            $data['commeettee_fname'] = $reviewer_detail->commeettee_fname;

                            $this->load->view('template/header/header');
                            $this->load->view('template/menuleft/menuleft_reviewer');
                            $this->load->view('evaluation/add_evaluation', $data);
                        }
                    } else {
                        $this->load->view('template/header/header');
                        $this->load->view('template/menuleft/menuleft_reviewer');
                        $this->load->view('permission/permission_denied');
                    }
                } else {
                    $this->load->view('template/header/header');
                    $this->load->view('template/menuleft/menuleft_reviewer');
                    $this->load->view('permission/error_404_not_found');
                }
            } else {
                redirect('paper2/index');
            }
        }
    }
    
    public function add_result(){
        
        $data['blank'] = '';

        if(isset($_POST['btn_submit'])){
            


//                $this->paper->update($data_status);


//                $data['success_msg'] = '<div class="alert alert-success text-center">Your file <strong>' . $upload_data['file_name'] . '</strong> was successfully uploaded!</div>';
//                $data['rename_file'] = $rename_file;
//                $data['upload_data'] = $upload_data['full_path'];
                //$this->load->view('paper/select', $data);
                //redirect($this->uri->uri_string());
//                redirect('/paper/show_detail/'.$data['paper_detail_id'], 'refresh');
            

        }else if(isset($_POST['btn_back'])){
                redirect('evaluation/index');
        }

        if (isset($_GET['c_id']) and trim($_GET['c_id']) != '') {


            $id = $_GET['c_id'];
            $result = $this->evaluation->get_one($id);

            if($result) {

                $user_id = $this->session->userdata('user_id');

                $permission = $this->check_owner_reviewer($result->paper_detail_id, $user_id);
                if ($permission == true) {

                    $owner = $this->paper2->getPeperOwnerPresent_by_paper_id($result->paper_detail_id);
                    $data['paper_detail_owner_name'] = $owner->paper_detail_owner_name;


                    $reviewer_detail = $this->paper2->getUser_detail($user_id);
                    $data['commeettee_fname'] = $reviewer_detail->commeettee_fname;


                    $data['evaluation_id'] = $result->evaluation_id;
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

                    $this->load->view('template/header/header');
                    $this->load->view('template/menuleft/menuleft_reviewer');
                    $this->load->view('evaluation/result_evaluation', $data);
                } else {
                    $this->load->view('template/header/header');
                    $this->load->view('template/menuleft/menuleft_reviewer');
                    $this->load->view('permission/permission_denied');
                }
            }else{
                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft_reviewer');
                $this->load->view('permission/error_404_not_found');
            }
        }else{
            redirect('paper2/index');
        }
        
    }
    public function result(){
        $user_id = $this->session->userdata('user_id');
        if(isset($_GET['c_id'])){
            $id = $_GET['c_id'];
            $result = $this->evaluation->get_evaluation_comment_by_one($id);
            
            if($result){
                $check_owner = $this->check_owner_evaluation($id,$user_id);
                if($check_owner == true){
                    $owner = $this->paper2->getPeperOwnerPresent_by_paper_id($result->paper_detail_id);
                    $data['paper_detail_owner_name'] = $owner->paper_detail_owner_name;

                    $user_id = $this->session->userdata('user_id');
                    $reviewer_detail = $this->paper2->getUser_detail($user_id);
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
                    $this->load->view('template/menuleft/menuleft_reviewer');
                    $this->load->view('evaluation/evaluated',$data);
                }else{
                    $this->load->view('template/header/header');
                    $this->load->view('template/menuleft/menuleft_reviewer');
                    $this->load->view('permission/permission_denied');
                }

            }else{
                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft_reviewer');
                $this->load->view('permission/error_404_not_found');
            }
        }
    }

    public function result_view(){
        $user_id = $this->session->userdata('user_id');

        if(isset($_GET['c_id']) && trim($_GET['c_id'] != '')){
            $id = $_GET['c_id'];
            $check_eval = $this->check_evaluation($id);
            if($check_eval == true){
                $check_owner = $this->check_owner_evaluation($id,$user_id);
                if($check_owner == true){
                    $result = $this->evaluation->get_evaluation_comment_by_one($id);
                    if($result){

                        $owner = $this->paper2->getPeperOwnerPresent_by_paper_id($result->paper_detail_id);
                        $data['paper_detail_owner_name'] = $owner->paper_detail_owner_name;

//                        $user_id = $this->session->userdata('user_id');
                        $reviewer_detail = $this->paper2->getUser_detail($result->user_id);
                        $data['commeettee_fname'] = @$reviewer_detail->commeettee_fname;

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
                        $this->load->view('template/menuleft/menuleft_reviewer');
                        $this->load->view('evaluation/evaluated_view',$data);
                    }
                }else{
                    $this->load->view('template/header/header');
                    $this->load->view('template/menuleft/menuleft_reviewer');
                    $this->load->view('permission/permission_denied');
                }
            }else{
                $this->load->view('template/header/header');
                $this->load->view('template/menuleft/menuleft_reviewer');
                $this->load->view('permission/error_404_not_found');
            }
        }else{
            redirect('evaluation/index');
        }
    }
    
    public function upload(){

        //check dir
        $dirname = date("Y_m");
        $filename = "./uploads/evaluation-file/" . $dirname . "/";
        $this->manage_file->check_dir($filename);

        //set preferences
        $config['upload_path'] = $filename;
        $config['allowed_types'] = 'pdf|doc|docx|zip|rar|7z|jpg';
        //$config['max_size']    = '11102400';

        //load upload class library
        $this->load->library('upload', $config);

        $evaluation_id = $_POST['evaluation_id'];
        $paper_comment = $_POST['comment'];
        $user_id = $this->session->userdata('user_id');


        $result_eval = $this->evaluated_count($user_id,$evaluation_id);

        if($result_eval < 4){
            if (!$this->upload->do_upload('filename'))
            {
                // case - failure
                $upload_error = array('error' => $this->upload->display_errors());
                echo $upload_error['error'];
                echo $this->uri->uri_string();
                //$this->load->view('paper/select', $upload_error);
                //sleep(10);
                //redirect('/paper/show_detail/'.$_POST['paper_detail_id'], 'refresh');
                $this->output->set_header('refresh:3; url='.'add_result?c_id='.$_POST['evaluation_id']);

            }
            else
            {
                // case - success
                $upload_data = $this->upload->data();
                $rename_file = 'Rev_NCTECHED_'  .date("Ymdmis");
                $set_hash_file_name = sha1(time().$rename_file)."_r";
                $full_rename_file = $upload_data['file_path']. $set_hash_file_name. $upload_data['file_ext'];
                $data_rename = rename($upload_data['full_path'], $full_rename_file);

                $insert = array(
                    'evaluation_id' => $_POST['evaluation_id'],
                    'paper_file_evaluation_comment_text' => $_POST['comment'],
                    'paper_file_evaluation_comment_file' => $rename_file,
                    'paper_file_evaluation_comment_hash' => $set_hash_file_name,
                    'paper_file_evaluation_comment_type' => $upload_data['file_ext'],
                    'paper_file_evaluation_comment_year_dir' => $dirname,
                    'user_id' => $this->session->userdata('user_id')
                );

                $this->form_validation->set_rules('comment', 'ข้อความ', 'required');

                if($this->form_validation->run() == FALSE){
                    echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("กรุณาไปใส่ความคิดเห็นเพิ่มเติ่ม"); }'
                . '</script></body></html>';
                    redirect('evaluation/add_result?c_id='.$_POST['evaluation_id'], 'refresh');
                }
                else{

                    $return_id = $this->evaluation->insert_comment($insert);

                    $data_hash = array(
                        'paper_file_evaluation_comment_id'  => $return_id,
                        'paper_file_eval_hash_str'          => sha1(time().$return_id),
                    );
                    $file_hash_id = $this->evaluation->insert_file_hash($data_hash);

                    //}
                    redirect('evaluation/result?c_id='.$_POST['evaluation_id']);
                }
            }
        }else{
            $insert = array(
                'evaluation_id' => $_POST['evaluation_id'],
                'paper_file_evaluation_comment_text' => $_POST['comment'],
                'paper_file_evaluation_comment_file' => '',
                'paper_file_evaluation_comment_hash' => '',
                'paper_file_evaluation_comment_type' => '',
                'paper_file_evaluation_comment_year_dir' => '',
                'user_id' => $this->session->userdata('user_id')
            );

            $this->form_validation->set_rules('comment', 'ข้อความ', 'required');

            if($this->form_validation->run() == FALSE){

            }
            else{

                $return_id = $this->evaluation->insert_comment($insert);

                redirect('evaluation/result?c_id='.$_POST['evaluation_id']);
            }
        }
    }

    private function evaluated_count($user_id,$evaluation_id){
        $get_evaluation = $this->evaluation->get_evaluation_by_user($user_id,$evaluation_id);

        $result_number = ($get_evaluation->evaluation_number1 + $get_evaluation->evaluation_number2 + $get_evaluation->evaluation_number3 + $get_evaluation->evaluation_number4 + $get_evaluation->evaluation_number5 + $get_evaluation->evaluation_number6 + $get_evaluation->evaluation_number7 + $get_evaluation->evaluation_number8 + $get_evaluation->evaluation_number9 + $get_evaluation->evaluation_number10) / 10 ;

        return $result_number;

    }

}
