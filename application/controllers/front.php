<?php

class front extends CI_Controller {

   function header()
   {
	$this->load->model('mol_front');
	$id['user_id'] = $this->session->userdata('user_id');
	
      $data['header'] = $this->mol_front->getheader_public($id);
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('front_new/header', $data);
   }
   
   function downloadpaper_file_all()
   {
      $this->load->model('mol_front');
      $id['user_id'] = $this->session->userdata('user_id');
	
      $data['paper_book'] = $this->mol_front->getPaperbook_all($id);
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('front_new/downloadpaper_file_all', $data);
   }
   
   
   function index_paper_file_all()
   {
      $this->load->model('mol_front');
      $id['user_id'] = $this->session->userdata('user_id');
      
      $data['index_paper_book'] = $this->mol_front->getindexPaperbook_all($id);
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('front_new/index_paper_file_all', $data);
   }
   
   function index_paper_file_add()
   {
       		$this->load->model('mol_front');
                $this->load->helper('url');
		
		$data['blank'] = '';
                
		if(isset($_POST['btn_submit'])){
			$insert = array(
					'index_paper_file_id' => $_POST['index_paper_file_id'],
					'index_paper_file_name' => $_POST['index_paper_file_name'],
                                        'index_paper_file_year' => $_POST['index_paper_file_year'],
                                        'index_paper_file_no' => $_POST['index_paper_file_no'],
                                        'index_paper_file_key' => $_POST['index_paper_file_key'],
                                        'index_paper_file_author' => $_POST['index_paper_file_author'],
                                        'index_paper_file_page' => $_POST['index_paper_file_page'],
                                        'index_paper_file_department_name' => $_POST['index_paper_file_department_name'],
				);
                        
				if(isset($_POST['index_paper_file_id']) && trim($_POST['index_paper_file_id']) != ''){
					$insert['index_paper_file_id'] = $_POST['index_paper_file_id'];
					$this->mol_front->updateindexPaperbook($insert);
				}else{
					$this->mol_front->insertindexPaperbook($insert);
				}
				redirect('front/index_paper_file_all');
                                }
		
                if(isset($_POST['btn_back'])){
			redirect('front/index_paper_file_all');
		}
		if(isset($_GET['c_id'])){
			$id['index_paper_file_id'] = $_GET['c_id'];
			$data['index_paper_file_edit'] = $this->mol_front->getindexPaperbook_all($id);
		}
      $data['forDepartment'] = $this->mol_front->getDepartment();
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('front_new/index_paper_file_add', $data);
   }
   
   function index_paper_file_del()
   {     
       	$this->load->model('mol_front');
        $data['blank'] = '';
        if(isset($_GET['c_id'])){
			$id['index_paper_file_id'] = $_GET['c_id'];
			$data['index_paper_file_edit'] = $this->mol_front->deleteindexPaperbook($id);
	}
	redirect('front/index_paper_file_all');
   }
   
   
   
   
   function downloadpaper_file_add()
   {
       
       		$this->load->model('mol_front');
                $this->load->helper('url');
		
		$data['blank'] = '';
                
		if(isset($_POST['btn_submit'])){
			$insert = array(
					'downloadpaper_file_id' => $_POST['downloadpaper_file_id'],
					'downloadpaper_file_name' => '',
                                        'downloadpaper_file_year' => $_POST['downloadpaper_file_year'],
                                        'downloadpaper_file_no' => $_POST['downloadpaper_file_no'],
				);
                        
                        //config flie
                        $config['upload_path'] = './public/download/DBPass/';
                        $config['allowed_types'] = 'pdf|doc|docx';
                        $config['overwrite'] = TRUE; //ทับไฟล์ถ้าชื่อซ้ำ
                        $config['file_name'] = 'NCTechEd'.sprintf("%03s",$_POST['downloadpaper_file_no']);
                        $this->load->library('upload', $config);
                        
                        
                        
                            
                            //upload file image.
                               if($this->upload->do_upload('downloadpaper_file_name')) {
                                $data = array('upload_data' => $this->upload->data());
                                $file_name = $data['upload_data']['file_name'];
                                $insert['downloadpaper_file_name'] = $file_name;
                                }
                                
  
                        
				if(isset($_POST['downloadpaper_file_id']) && trim($_POST['downloadpaper_file_id']) != ''){
					$insert['downloadpaper_file_id'] = $_POST['downloadpaper_file_id'];
					$this->mol_front->updatePaperbook($insert);
				}else{
					$this->mol_front->insertPaperbook($insert);
				}
				redirect('front/downloadpaper_file_all');
                                
                                
                                }
		
                if(isset($_POST['btn_back'])){
			redirect('front/downloadpaper_file_all');
		}
		if(isset($_GET['c_id'])){
			$id['downloadpaper_file_id'] = $_GET['c_id'];
			$data['downloadpaper_file_edit'] = $this->mol_front->getPaperbook_all($id);
		}
                
 
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('front_new/downloadpaper_file_add', $data);
   }
   
   function downloadpaper_file_del()
   {
                
       	$this->load->model('mol_front');
        $data['blank'] = '';
        if(isset($_GET['c_id'])){
			$id['downloadpaper_file_id'] = $_GET['c_id'];
			$data['downloadpaper_file_edit'] = $this->mol_front->deletePaperbook($id);
	}
	redirect('front/downloadpaper_file_all');
   }

   
   function footer()
   {
      $this->load->model('mol_front');
      $id['user_id'] = $this->session->userdata('user_id');

      $data['footer'] = $this->mol_front->getFooter($id);
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('front_new/footer', $data);
   }
   
   function footer_add()
   {
       		$this->load->model('mol_front');
                $this->load->helper('url');
                
                //config image
                $config['upload_path'] = './uploads/pic-footer/';
                $config['allowed_types'] = 'jpg|png';
                $config['file_name'] = 'footerwebNC-'.date("Y").'-'.$this->db->insert_id();

		$this->load->library('upload', $config);
		$data['blank'] = '';
                
		if(isset($_POST['btn_submit'])){
			$insert = array(
					'footer_id' => $_POST['footer_id'],
					'footer_pic' => '',
                                        'footer_status' => $_POST['footer_status'],
                                        'footer_conferences_on' => $this->mol_front->conferences_now()
				);
                            
                            //upload file image.
                                if($this->upload->do_upload('image')) {
                                $data = array('upload_data' => $this->upload->data());
                                $file_name = $data['upload_data']['file_name'];
                                $insert['footer_pic'] = $file_name;
                                }  else {
                                        
                                    $picresult = $this->mol_front->getPicFooterOld($_POST['footer_id']);
                                    $namepic = $picresult;
                                    $insert['footer_pic'] = $namepic;
                                    //var_dump($namepic);
                                }
                        
				if(isset($_POST['footer_id']) && trim($_POST['footer_id']) != ''){
					$insert['footer_id'] = $_POST['footer_id'];
					$this->mol_front->updateFooter($insert);
				}else{
					$this->mol_front->insertFooter($insert);
				}
				redirect('front/footer');
                                }
		
                if(isset($_POST['btn_back'])){
			redirect('front/footer');
		}
		if(isset($_GET['c_id'])){
			$id['footer_id'] = $_GET['c_id'];
			$data['footer_edit'] = $this->mol_front->getFooter($id);
		}
                
 
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('front_new/footer_add', $data);
   }
   
   function footer_del()
   {
                
       	$this->load->model('mol_front');
        $data['blank'] = '';
        if(isset($_GET['c_id'])){
			$id['footer_id'] = $_GET['c_id'];
			$data['footer_edit'] = $this->mol_front->deleteFooter($id);
	}
	redirect('front/footer');
   }
   
   
   function header_add()
   {
       		$this->load->model('mol_front');
                $this->load->helper('url');
                
                //config image
                $config['upload_path'] = './uploads/pic-header/';
                $config['allowed_types'] = 'jpg|png';
                $config['file_name'] = 'haedwebNC-'.date("Y").'-'.$this->db->insert_id();

		$this->load->library('upload', $config);
		$data['blank'] = '';
                
		if(isset($_POST['btn_submit'])){
			$insert = array(
					'header_id' => $_POST['header_id'],
					'header_pic' => '',
                                        'header_status' => $_POST['header_status'],
                                        'header_url' => $_POST['header_url'],
				);
                            
                            //upload file image.
                                if($this->upload->do_upload('image')) {
                                $data = array('upload_data' => $this->upload->data());
                                $file_name = $data['upload_data']['file_name'];
                                $insert['header_pic'] = $file_name;
                            
                                }
                                else 
                                {        
                                    $picresult = $this->mol_front->getPicHeaderOld($_POST['header_id']);
                                    $namepic = $picresult;
                                    $insert['header_pic'] = $namepic;
                                    //var_dump($namepic);
                                }
                        
				if(isset($_POST['header_id']) && trim($_POST['header_id']) != ''){
					$insert['header_id'] = $_POST['header_id'];
					$this->mol_front->updateNews_public($insert);
				}else{
					$this->mol_front->insertNews_public($insert);
				}
				redirect('front/header');
                                
                                
                                }
		
                if(isset($_POST['btn_back'])){
			redirect('front/header');
		}
		if(isset($_GET['c_id'])){
			$id['header_id'] = $_GET['c_id'];
			$data['header_edit'] = $this->mol_front->getheader_public($id);
		}
                
 
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('front_new/header_add', $data);
   }
   
   
   function announce_file_all()
   {
      $this->load->library("pagination");
      $this->load->model('mol_front');
      $id['user_id'] = $this->session->userdata('user_id');

      $data['footer'] = $this->mol_front->getAnnounce($id);
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('front_new/announce_file_all', $data);
   }
   
   function disable_announce_file()
   {
      $this->load->model('mol_front');
      if (isset($_GET['c_id'])) {
            $this->mol_front->update_announce_file_status_NO($_GET['c_id']);
            echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("แก้ไขสถานะเรียบร้อยแล้ว"); }'
                . '</script></body></html>';
        }
        redirect('front/announce_file_all', 'refresh');
   }

   function enabled_announce_file()
   {
      $this->load->model('mol_front');
      if (isset($_GET['c_id'])) {
            $this->mol_front->update_announce_file_status_YES($_GET['c_id']);
            echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("แก้ไขสถานะเรียบร้อยแล้ว"); }'
                . '</script></body></html>';
        }
        redirect('front/announce_file_all', 'refresh');
   }
 
   function announce_file_add()
   {
       		$this->load->model('mol_front');
                $this->load->helper('url');
                
                
		$data['blank'] = '';
                
		if(isset($_POST['btn_submit'])){
			$insert = array(
					'file_announce_id' => $_POST['file_announce_id'],
					'file_announce_name' => '',
                                        'file_announce_note' => $_POST['file_announce_note'],
                                        'file_announce_conferences_on' => $_POST['file_announce_conferences_on']
				);
                            
                            //upload file image.
                        
                        //config image
                $config['upload_path'] = './public/download/announce/';
                $config['allowed_types'] = 'jpg|png|doc|docx|pdf';
                $config['file_name'] = 'NC-conferences-'.$_POST['file_announce_conferences_on'].'-'.date("Y").'-'.$this->db->insert_id();

		$this->load->library('upload', $config);
                        
                        
                                if($this->upload->do_upload('file_announce_name')) {
                                $data = array('upload_data' => $this->upload->data());
                                $file_name = $data['upload_data']['file_name'];
                                $insert['file_announce_name'] = $file_name;
                            
                                }
                        
				if(isset($_POST['file_announce_id']) && trim($_POST['file_announce_id']) != ''){
					$insert['file_announce_id'] = $_POST['file_announce_id'];
					$this->mol_front->updateFile_announce($insert);
				}else{
					$this->mol_front->insertFile_announce($insert);
				}
				redirect('front/announce_file_all');
                                
                                
                                }
		
                if(isset($_POST['btn_back'])){
			redirect('front/announce_file_all');
		}
		if(isset($_GET['c_id'])){
			$id['file_announce_id'] = $_GET['c_id'];
			$data['file_announce_edit'] = $this->mol_front->getAnnounce($id);
		}
                
 
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('front_new/announce_file_add', $data);
   }
   
   function schedule_file_all()
   {	
      $this->load->model('mol_front');
      $id['user_id'] = $this->session->userdata('user_id');

      $data['schedule'] = $this->mol_front->getSchedule($id);
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('front_new/schedule_file_all', $data);
   }
   
   function schedule_file_add()
   {
       		$this->load->model('mol_front');
                $this->load->helper('url');
                
                
		$data['blank'] = '';
                
		if(isset($_POST['btn_submit'])){
			$insert = array(
					'file_schedule_id' => $_POST['file_schedule_id'],
					'file_schedule_name' => '',
                                        'file_schedule_note' => $_POST['file_schedule_note'],
                                        'file_schedule_conferences_on' => $_POST['file_schedule_conferences_on']
				);
                            
                            //upload file image.
                        
                        //config image
                $config['upload_path'] = './public/download/schedule/';
                $config['allowed_types'] = 'jpg|png|doc|docx|pdf';
                $config['file_name'] = 'NCtechEd-'.$_POST['file_schedule_conferences_on'].'-'.date("Y").'-Conference-Session-Schedule-'.$this->db->insert_id();

		$this->load->library('upload', $config);
                        
                        
                                if($this->upload->do_upload('file_schedule_name')) {
                                $data = array('upload_data' => $this->upload->data());
                                $file_name = $data['upload_data']['file_name'];
                                $insert['file_schedule_name'] = $file_name;
                            
                                }
                        
				if(isset($_POST['file_schedule_id']) && trim($_POST['file_schedule_id']) != ''){
					$insert['file_schedule_id'] = $_POST['file_schedule_id'];
					$this->mol_front->updateFile_schedule($insert);
				}else{
					$this->mol_front->insertFile_schedule($insert);
				}
				redirect('front/schedule_file_all');
                                
                                
                                }
		
                if(isset($_POST['btn_back'])){
			redirect('front/schedule_file_all');
		}
		if(isset($_GET['c_id'])){
			$id['file_schedule_id'] = $_GET['c_id'];
			$data['file_schedule_edit'] = $this->mol_front->getSchedule($id);
		}
                
 
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('front_new/schedule_file_add', $data);
   }
   
   
   function conference_on()
   {
       		$this->load->model('mol_front');
                $this->load->helper('url');
		$data['blank'] = '';
                
		if(isset($_POST['btn_submit'])){
                    
			$this->mol_front->updateConferences_select($_POST['conferences_select_on']);
				echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("ได้ทำการตั้งค่าระบบ\nให้เป็นประชุมครั้งที่ '.$_POST['conferences_select_on'].'\nเป็นที่เรียบร้อยแล้ว"); }'
                                        . '</script></body></html>';
				redirect('front/conference_on','refresh');
                }
      $data['forConference'] = $this->mol_front->getConference();
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('front_new/conference_on', $data);
   }
   
   function conference_on_note()
   {
       		$this->load->model('mol_front');
                $this->load->helper('url');
		$data['blank'] = ''; 
      if(isset($_GET['c_id'])){
			$id_conf = $_GET['c_id'];
      }
      if(isset($_POST['btn_submit'])){

          $this->db->query("UPDATE conferences_select_on SET conferences_select_note='".$_POST['conferences_select_note']."' WHERE conferences_select_on='".$id_conf."'");
          echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("ได้ทำการใส่ Note การประชุมครั้งที่ '.$id_conf.'\nเป็นที่เรียบร้อยแล้ว"); }'
                                        . '</script></body></html>';
          redirect('front/conference_on','refresh');
      }

      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('front_new/conference_on_note', $data);
   }
   
}
?>

