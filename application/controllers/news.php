<?php

class news extends CI_Controller {

    function conferences_now()
    {
        $conferences_on ="";
        $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
        foreach ($query1112->result() as $data){
            $conferences_on  = $data->conferences_select_on;
        }
        return $conferences_on;
    }
            
   function news_public()
   {
      $this->load->model('mol_news');
      $id['user_id'] = $this->session->userdata('user_id');

      $data['news_public'] = $this->mol_news->getNews_public($id);
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('news/news_public', $data);
   }

   function news_public_add()
   {
       		$this->load->model('mol_news');
		$data['blank'] = '';
                
		if(isset($_POST['btn_submit'])){
			$insert = array(
					'news_public_id' => $_POST['news_public_id'],
					'news_name' => $_POST['news_name'],
					'news_description' => $_POST['news_description'],
                                        'news_type_status' => $_POST['news_type_status'],
                                        'news_public_date' => $_POST['news_public_date'],
                                        'news_public_times' => $_POST['news_public_times'],
                                        'news_public_conferences' => $this->conferences_now(),
				);
                        $this->form_validation->set_rules('news_name', 'ชื่อประเภทงานวิจัย', 'required');
                        $this->form_validation->set_rules('news_description', 'รายละเอียด', 'required');
                        $this->form_validation->set_rules('news_type_status', 'สถานะให้แสดงหน้าเว็บ', 'required');
                        $this->form_validation->set_rules('news_public_date', 'ปี-เดือน-วัน', 'required');
                        $this->form_validation->set_rules('news_public_times', 'เวลา', 'required');

			if($this->form_validation->run() == FALSE){
                            
			}
                        
                        else{
                        
				if(isset($_POST['news_public_id']) && trim($_POST['news_public_id']) != ''){
					$insert['news_public_id'] = $_POST['news_public_id'];
					$this->mol_news->updateNews_public($insert);
				}else{
					$this->mol_news->insertNews_public($insert);
				}
				redirect('news/news_public');
                                }
		}else if(isset($_POST['btn_back'])){
			redirect('news/news_public');
		}
		if(isset($_GET['c_id'])){
			$id['news_public_id'] = $_GET['c_id'];
			$data['news_public_edit'] = $this->mol_news->getNews_public($id);
		}
       
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('news/news_public_add', $data);
   }
   
   function news_public_del()
   {
                
       	$this->load->model('mol_news');
        $data['blank'] = '';
        if(isset($_GET['c_id'])){
			$id['news_public_id'] = $_GET['c_id'];
			$data['news_public_edit'] = $this->mol_news->deleteNews_public($id);
	}
	redirect('news/news_public');
   }
   
   
}
?>

