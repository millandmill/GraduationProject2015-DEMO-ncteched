<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paper2
 *
 * @author kong
 */
class paper2 extends Core_Paper2
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("mol_paper2", "paper2");
        $this->load->model("mol_paper", "paper");
        $this->load->model("mol_upload_file", "upload_file");
        $this->load->library('form_validation');
        $this->load->library("pagination");
        $this->load->library('manage_file');
    }

    public function index()
    {
        $id['user_id'] = $this->session->userdata('user_id');
        //$config = array();
        //$config["base_url"] = base_url() . "paper2/index";

        //$config["total_rows"] = $this->paper2->get_all($id);
        //$config["per_page"] = 20;
        //$config["uri_segment"] = 3;
        //$choice = $config["total_rows"] / $config["per_page"];
        //$config["num_links"] = round($choice);

        //$this->pagination->initialize($config);

        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //$data["links"] = $this->pagination->create_links();
        //$id['per_page'] = $config["per_page"];
        //$id['page'] = $page;

        $id['conferences_select_id'] = $this->time->conferences_now();
        $id['operate'] = '=';

        $data['title'] = 'รายชื่อบทความที่ต้องตรวจ';

        $data['public'] = $this->paper2->get_public($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft_reviewer');
        $this->load->view('paper2/index', $data);

    }

    public function index_archive()
    {
        $id['user_id'] = $this->session->userdata('user_id');
        //$config = array();
        //$config["base_url"] = base_url() . "paper2/index";

        //$config["total_rows"] = $this->paper2->get_all($id);
        //$config["per_page"] = 20;
        //$config["uri_segment"] = 3;
        //$choice = $config["total_rows"] / $config["per_page"];
        //["num_links"] = round($choice);

        //$this->pagination->initialize($config);

        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //$data["links"] = $this->pagination->create_links();
        //$id['per_page'] = $config["per_page"];
        //$id['page'] = $page;

        $id['conferences_select_id'] = $this->time->conferences_now();
        $id['operate'] = '!=';

        $data['title'] = 'บทความที่เคยตรวจครั้งที่ผ่านมา';

        $data['public'] = $this->paper2->get_public($id);
        $this->load->view('template/header/header');
        $this->load->view('template/menuleft/menuleft_reviewer');
        $this->load->view('paper2/index', $data);

    }

    public function show_detail($id = null)
    {
        $this->load->database();
        $user_id = $this->session->userdata('user_id');
        if (isset($id)){
            $check_data = $this->check_data($id);
            if($check_data == true) {
                $permission = $this->check_owner_reviewer($id,$user_id);
                if($permission == true){
                    $this->r = $this->paper2->get_one($id);
                    $this->load->view('template/header/header');
                    $this->load->view('template/menuleft/menuleft_reviewer');
                    $this->load->view("paper2/select", $this);
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
            redirect('/paper2', 'refresh');
        }

    }

/* old function and use on evaluation upload
    //file upload function
    public function upload()
    {
        //set preferences
        $config['upload_path'] = './uploads/paper2-file/';
        $config['allowed_types'] = 'txt|pdf|doc|jpg|png|docx';
        //$config['max_size']    = '11102400';

        //load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('filename')) {
            // case - failure
            $upload_error = array('error' => $this->upload->display_errors());
            echo $upload_error['error'];
            echo $this->uri->uri_string();
            //$this->output->set_header('refresh:10; url='.'show_detail/'.$_POST['paper_detail_id']);

        } else {
            // case - success
            $upload_data = $this->upload->data();
            $rename_file = 'ReviewerNCTeched' . date("YmdMis") . $upload_data['file_ext'];
            $full_rename_file = $upload_data['file_path'] . $rename_file;
            $data_rename = rename($upload_data['full_path'], $full_rename_file);
            $file_comment = "";


            $paper_detail_id = $_POST['paper_detail_id'];
            $id = $_POST['file_id'];
            $user_id = $_POST['user_id'];

            //check
            $this->db->select('*');
            $this->db->where('paper_detail_id', $paper_detail_id);
            $paper_file_owner_comment = $this->db->get('paper_reviewer');
            $owner_comment = array_shift($paper_file_owner_comment->result_array());
            $owner_comment1 = $owner_comment['paper_file_owner_comment1'];
            $owner_comment2 = $owner_comment['paper_file_owner_comment2'];
            $owner_comment3 = $owner_comment['paper_file_owner_comment3'];
            $owner_comment4 = $owner_comment['paper_file_owner_comment4'];

            if ($user_id == $owner_comment1) {


                $data = array(
                    'paper_file_comment1' => $rename_file,
                    'paper_file_owner_comment1_status' => $_POST['selected_status'],
                );
                $file_id = $this->paper2->update_file($data, $id);

            } else if ($user_id == $owner_comment2) {


                $data = array(
                    'paper_file_comment2' => $rename_file,
                    'paper_file_owner_comment2_status' => $_POST['selected_status'],
                );
                $file_id = $this->paper2->update_file($data, $id);

            } else if ($user_id == $owner_comment3) {


                $data = array(
                    'paper_file_comment3' => $rename_file,
                    'paper_file_owner_comment3_status' => $_POST['selected_status'],
                );
                $file_id = $this->paper2->update_file($data, $id);

            } else if ($user_id == $owner_comment4) {


                $data = array(
                    'paper_file_comment4' => $rename_file,
                    'paper_file_owner_comment4_status' => $_POST['selected_status'],
                );
                $file_id = $this->paper2->update_file($data, $id);

            } else {
                unlink($full_rename_file);
            }

            $data['rename_file'] = $rename_file;
            $data['upload_data'] = $upload_data['full_path'];


            redirect('/paper2/show_detail/' . $paper_detail_id, 'refresh');
        }
    }
*/
}
