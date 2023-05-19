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
class uploadfile extends CI_Controller {
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
    function download($file_id){
        $path_file = './uploads/paper-file/';
        $file = $this->upload_file->get_file($file_id); //getting all the file details
                                                      //for $file_id (all details are stored in DB)
        $data = file_get_contents($path_file.$file->paper_file_show); // Read the file's contents
        $name = $file->paper_file_show;

        force_download($name, $data);
    }
}
