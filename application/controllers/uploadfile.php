<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of uploadfile
 *
 * @author kong
 */
class uploadfile extends Core_Upload {
    public function __construct() {
        parent::__construct();
        $this->load->model("mol_upload_file","upload_file");
        $this->load->helper('download');
    }
    
      //index function
    function index()
    {
        //load file upload form
        //$this->rs = $this->upload_file->get_files();
        //$this->load->view('uploadfile/upload_file_view', $this);
        $this->load->view('uploadfile/upload_file_view');
    }

    //file upload function
    function upload()
    {
        //set preferences
        $config['upload_path'] = './uploads/paper-file/';
        $config['allowed_types'] = 'txt|pdf|doc|jpg|png|docx';
        //$config['max_size']    = '666602400mb';

        //load upload class library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('filename'))
        {
            // case - failure
            $upload_error = array('error' => $this->upload->display_errors());
            $this->load->view('uploadfile/upload_file_view', $upload_error);
        }
        else
        {
            // case - success
            $upload_data = $this->upload->data();
            $rename_file = 'NCTeched'  .date("YmdMis").$upload_data['file_ext'];
            $full_rename_file = $upload_data['file_path']. $rename_file;
            $data_rename = rename($upload_data['full_path'], $full_rename_file);
            
            $data = array(

                    'paper_detail_id' => '20',
                    'paper_file_name' => $upload_data['file_name'],
                    'paper_file_show' => $rename_file,
                    'paper_file_ip' => $_SERVER['REMOTE_ADDR'],
                    'user_id' => '1',


                );


            $file_id = $this->upload_file->insert_file($data);
            
            
            $data['success_msg'] = '<div class="alert alert-success text-center">Your file <strong>' . $upload_data['file_name'] . '</strong> was successfully uploaded!</div>';
            $data['rename_file'] = $rename_file;
            $data['upload_data'] = $upload_data['full_path'];
            //$this->load->view('uploadfile/upload_file_view', $data);
            redirect($this->uri->uri_string());
        }
        
        
    }
    /*
    public function showfiles()
    {
      
       $this->rs = $this->upload_file->get_files();
       $this->load->view('uploadfile/showfile', $this);
    }
    */
    function download($file_show = null){
        $path_file = './uploads/paper-file/';
        //$file = $this->upload_file->get_file($file_show); //getting all the file details
                                                      //for $file_id (all details are stored in DB)
        //$data = file_get_contents($path_file.$file->paper_file_show); // Read the file's contents
//        $data = @file_get_contents($path_file.$file_show);
        //$name = $file->paper_file_show;

        $file_hash = $this->upload_file->get_paper_file_hash(@$file_show);
        if(!empty($file_hash)){
            $file = $this->upload_file->get_file($file_hash->paper_file_id);
            if(!empty($file)){
                //check permission
                $var = $this->check_permission_paper($file->paper_detail_id);
                if($var == true){
                    $set_file_name = $file->paper_file_name_hash.$file->paper_file_type;
                    $set_path_file = $path_file . $file->paper_file_year_dir . "/";
                    if(!empty($set_file_name)){
                        try{
                            $data = $this->file_contents($set_path_file,$set_file_name);
                        }catch (Exception $e){
                            echo "Error: " , $e->getMessage();
                        }
                        $name = $file->paper_file_show.$file->paper_file_type;
                        if(!empty($data)){
                            force_download($name, $data);
                            echo "<script>window.close();</script>";
                        }
                    }else{
                        echo "Error: ID not found";
                    }
                }else{
                    echo "Error: Denied";
                }
            }else{
                echo "Error: ID not found";
            }
        }else{
            echo "Error: ID not found";
        }
    }

    function download_file_index($file_show = null){
        $path_file = './uploads/paper-file/';

        $file_hash = $this->upload_file->get_paper_file_index_hash(@$file_show);
        if(!empty($file_hash)){
            $file = $this->upload_file->get_file($file_hash->paper_file_id);
            if(!empty($file)){
                //check permission
                $var = $this->check_permission_paper_index($file->paper_detail_id);
                if($var == true){
                    $get_paper_detail = $this->check->get_Paper($file->paper_detail_id);
                    $set_file_name = $file->paper_file_name_hash.$file->paper_file_type;
                    $set_path_file = $path_file . $file->paper_file_year_dir . "/";
                    if(!empty($set_file_name)){
                        try{
                            $data = $this->file_contents($set_path_file,$set_file_name);
                        }catch (Exception $e){
                            echo "Error: " , $e->getMessage();
                        }
                        $name = $get_paper_detail->paper_numbering_code.$file->paper_file_type;
                        if(!empty($data)){
                            force_download($name, $data);
                            echo "<script>window.close();</script>";
                        }
                    }else{
                        echo "Error: ID not found";
                    }
                }else{
                    echo "Error: Denied";
                }
            }else{
                echo "Error: ID not found";
            }
        }else{
            echo "Error: ID not found";
        }
    }
    /* old function not use this
    function download_review($file_show){
        $path_file = './uploads/paper2-file/';
        //$file = $this->upload_file->get_file($file_show); //getting all the file details
                                                      //for $file_id (all details are stored in DB)
        //$data = file_get_contents($path_file.$file->paper_file_show); // Read the file's contents
//        $data = file_get_contents($path_file.$file_show);
        try{
            $data = $this->file_contents($path_file,$file_show);
        }catch (Exception $e){
            echo "Error: " , $e->getMessage();
        }

        //$name = $file->paper_file_show;
        $name = $file_show;
        if(!empty($data)){
            force_download($name, $data);
        }
    }
    */
    function download_payment($file_show = null){
        $path_file = './uploads/payment-file/';
        //$file = $this->upload_file->get_file($file_show); //getting all the file details
                                                      //for $file_id (all details are stored in DB)
        //$data = file_get_contents($path_file.$file->paper_file_show); // Read the file's contents
//        $data = file_get_contents($path_file.$file_show);
        $file_hash = $this->upload_file->get_payment_file_hash(@$file_show);
        if(!empty($file_hash)){
            $file = $this->upload_file->get_payment_file($file_hash->payment_system_id);
            if(!empty($file)){
                //check permission
                $var = $this->check_permission_payment($file->paper_detail_id);
                if($var == true){
                    $set_file_name = $file->payment_system_hash_file.$file->payment_system_file_type;
                    $set_path_file = $path_file . $file->payment_system_file_dir . "/";
                    if(!empty($set_file_name)){
                        try{
                            $data = $this->file_contents($set_path_file,$set_file_name);
                        }catch (Exception $e){
                            echo "Error: " , $e->getMessage();
                        }
                        //$name = $file->paper_file_show;
                        $name = $file->payment_system_showslip_filename.$file->payment_system_file_type;
                        if(!empty($data)){
                            force_download($name, $data);
                            echo "<script>window.close();</script>";
                        }
                    }else{
                        echo "Error: ID not found";
                    }
                }else{
                    echo "Error: Denied";
                }
            }else{
                echo "Error: ID not found";
            }
        }else{
            echo "Error: ID not found";
        }

    }
    
    function download_evaluation_file($file_show = null){
        $path_file = './uploads/evaluation-file/';
        //$file = $this->upload_file->get_file($file_show); //getting all the file details
                                                      //for $file_id (all details are stored in DB)
        //$data = file_get_contents($path_file.$file->paper_file_show); // Read the file's contents
//        $data = file_get_contents($path_file.$file_show);

        $file_hash = $this->upload_file->get_paper_file_eval_hash(@$file_show);
        if(!empty($file_hash)){
            $file = $this->upload_file->get_eval_file($file_hash->paper_file_evaluation_comment_id);
            if(!empty($file)){
                //check permission
                $var = $this->check_permission_paper_eval($file->paper_file_evaluation_comment_id);
                if($var == true){
                    $set_file_name = $file->paper_file_evaluation_comment_hash.$file->paper_file_evaluation_comment_type;
                    $set_path_file = $path_file . $file->paper_file_evaluation_comment_year_dir . "/";
                    if(!empty($set_file_name)){
                        try{
                            $data = $this->file_contents($set_path_file,$set_file_name);
                        }catch (Exception $e){
                            echo "Error: " , $e->getMessage();
                        }
                        //$name = $file->paper_file_show;
                        $name = $file->paper_file_evaluation_comment_file.$file->paper_file_evaluation_comment_type;
                        if(!empty($data)){
                            force_download($name, $data);
                            echo "<script>window.close();</script>";
                        }
                    }else{
                        echo "Error: ID not found";
                    }
                }else{
                    echo "Error: Denied";
                }
            }else{
                echo "Error: ID not found";
            }
        }else{
            echo "Error: ID not found";
        }
    }

    function download_attachment_file($file_show = null){
        $path_file = './uploads/attachment-file/';

        $file_hash = $this->upload_file->get_att_file_hash(@$file_show);

        if(!empty($file_hash)) {
            $file = $this->upload_file->get_att_file($file_hash->news_email_logs_id);
            if (!empty($file)) {
                //check permission
                // if have permission in future modify this line
//                $var = $this->check_permission_paper_eval($file->paper_file_evaluation_comment_id);
//                if($var == true){
                if(true){
                    $set_file_name = $file->news_email_logs_file_name_hash.$file->news_email_logs_file_type;
                    $set_path_file = $path_file.$file->news_email_logs_year_dir."/";
                    if(!empty($set_file_name)){
                        try{
                            $data = $this->file_contents($set_path_file,$set_file_name);
                        }catch (Exception $e){
                            echo "Error: " , $e->getMessage();
                        }
                        //$name = $file->paper_file_show;
                        $name = $file->news_email_logs_file_name.$file->news_email_logs_file_type;
                        if(!empty($data)){
                            force_download($name, $data);
                            echo "<script>window.close();</script>";
                        }
                    }else{
                        echo "Error: ID not found";
                    }
                }else{
                    echo "Error: Denied";
                }
            }else{
                echo "Error: ID not found";
            }
        }else{
            echo "Error: ID not found";
        }

    }

    private function file_contents($path_file,$file_show) {
        $data = @file_get_contents($path_file.$file_show);
        if ($data === FALSE) {
            throw new Exception("No such file or directory.");
        } else {
            return $data;
        }
    }
}
