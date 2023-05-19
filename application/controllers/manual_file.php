<?php

class manual_file extends CI_Controller {

   function manual_file_all()
   {
      $this->load->model('mol_manual_file');
      $id['user_id'] = $this->session->userdata('user_id');

      $data['manual'] = $this->mol_manual_file->getManual($id);
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('manual_file/manual_file_all', $data);
   }
   
   function manual_file_add()
   {
       		$this->load->model('mol_manual_file');
                $this->load->helper('url');
                
                
		$data['blank'] = '';
                
		if(isset($_POST['btn_submit'])){
			$insert = array(
					'file_manual_id' => $_POST['file_manual_id'],
					'file_manual_name' => '',
                                        'file_manual_note' => $_POST['file_manual_note'],
				);
                            
                        //upload file
                        
                        //config file
                $name_type="";
                if($_POST['file_manual_id']=="1")
                {
                    $name_type="user";
                }
                else if($_POST['file_manual_id']=="2")
                {
                    $name_type="reviewer";
                }
                else if($_POST['file_manual_id']=="3")
                {
                    $name_type="admin_or_board";
                }else{
                    $name_type="other";
                }

                $config['upload_path'] = './public/download/manual/';
                $config['allowed_types'] = 'jpg|png|doc|docx|pdf';
                $config['file_name'] = 'NC-manual-'.$name_type.'-'.date("Y")."-V0";

		$this->load->library('upload', $config);     
                        
                                if($this->upload->do_upload('file_manual_name')) {
                                $data = array('upload_data' => $this->upload->data());
                                $file_name = $data['upload_data']['file_name'];
                                $insert['file_manual_name'] = $file_name;
                            
                                }
                        
				if(isset($_POST['file_manual_id']) && trim($_POST['file_manual_id']) != ''){
					$insert['file_manual_id'] = $_POST['file_manual_id'];
					$this->mol_manual_file->updateFile_manual($insert);
				}else{
					$this->mol_manual_file->insertFile_manual($insert);
				}
				redirect('manual_file/manual_file_all');            
                                
                                }
		
                if(isset($_POST['btn_back'])){
			redirect('manual_file/manual_file_all');
		}
		if(isset($_GET['c_id'])){
			$id['file_manual_id'] = $_GET['c_id'];
			$data['file_manual_edit'] = $this->mol_manual_file->getManual($id);
		}

      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('manual_file/manual_file_add', $data);
   }
}
?>

