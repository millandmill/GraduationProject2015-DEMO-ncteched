<?php

class time extends CI_Controller {
       
    function conferences_now()
    {
        $conferences_on ="";
        $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
        foreach ($query1112->result() as $data){
            $conferences_on  = $data->conferences_select_on;
        }
        return $conferences_on;
    }
   /*
   function cycle_time()
   {
      $this->load->model('mol_time');
      $id['user_id'] = $this->session->userdata('user_id');

      $data['time_cycle'] = $this->mol_time->getNews_public($id);
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('time/cycle_time', $data);
   }
   */
   
   function program_date()
   {
      $this->load->model('mol_time');
      $id['user_id'] = $this->session->userdata('user_id');

      $data['program_date'] = $this->mol_time->getProgram_date($id);
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('time/program_date_admin', $data);
   }

   /*
   function cycle_time_edit()
   {
                
       		$this->load->model('mol_time');
		$data['blank'] = '';
                
		if(isset($_POST['btn_submit'])){
			$insert = array(
					'time_cycle_id' => $_POST['time_cycle_id'],
					//'time_cycle_name' => $_POST['time_cycle_name'],
					'time_cycle_date_start' => $_POST['time_cycle_date_start'],
                                        'time_cycle_date_end' => $_POST['time_cycle_date_end'],
                                        'time_cycle_status' => $_POST['time_cycle_status'],
				);
                        //$this->form_validation->set_rules('time_cycle_name', 'กลุ่มที่ต้องการจัดการ', 'required');
                        $this->form_validation->set_rules('time_cycle_date_start', 'วันที่เริ่ม', 'required');
                        $this->form_validation->set_rules('time_cycle_date_end', 'วันที่สิ้นสุด', 'required');
                        $this->form_validation->set_rules('time_cycle_status', 'สถานะ', 'required');

			if($this->form_validation->run() == FALSE){               
			}
                        else{     
				if(isset($_POST['time_cycle_id']) && trim($_POST['time_cycle_id']) != ''){
					$insert['time_cycle_id'] = $_POST['time_cycle_id'];
					$this->mol_time->updateNews_public($insert);
				}else{
					$this->mol_time->insertNews_public($insert);
				}
				redirect('time/cycle_time');
                                }
		}else if(isset($_POST['btn_back'])){
			redirect('time/cycle_time');
		}
		if(isset($_GET['c_id'])){
			$id['time_cycle_id'] = $_GET['c_id'];
			$data['time_cycle_edit'] = $this->mol_time->getNews_public($id);
		}
       
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('time/cycle_time_edit', $data);
   }
   */
   function program_date_edit()
   {
                
       		$this->load->model('mol_time');
		$data['blank'] = '';
                
		if(isset($_POST['btn_submit'])){
			$insert = array(
					'program_date_id' => $_POST['time_cycle_id'],
					'program_date_day' => $_POST['program_date_day'],
					'program_date_name' => $_POST['program_date_name'],
                                        'program_date_time_start' => $_POST['program_date_time_start'],
                                        'program_date_time_end' => $_POST['program_date_time_end'],
                                        'program_date_conferences' => $this->conferences_now(),
				);
                        $this->form_validation->set_rules('program_date_name', 'กลุ่มที่ต้องการจัดการ', 'required');
                        $this->form_validation->set_rules('program_date_day', 'วันที่เริ่ม', 'required');
                        $this->form_validation->set_rules('program_date_time_start', 'วันที่เริ่ม', 'required');
                        $this->form_validation->set_rules('program_date_time_end', 'วันที่สิ้นสุด', 'required');

			if($this->form_validation->run() == FALSE){               
			}
                        else{     
				if(isset($_POST['program_date_id']) && trim($_POST['program_date_id']) != ''){
					$insert['program_date_id'] = $_POST['program_date_id'];
					$this->mol_time->updateProgram_date($insert);
				}else{
					$this->mol_time->insertProgram_date($insert);
				}
				redirect('time/program_date');
                                }
		}else if(isset($_POST['btn_back'])){
			redirect('time/program_date');
		}
		if(isset($_GET['c_id'])){
			$id['program_date_id'] = $_GET['c_id'];
			$data['program_date_edit'] = $this->mol_time->getProgram_date($id);
		}
       
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('time/program_date_admin_edit', $data);
   }
   
   
   function program_date_del()
   {
                
       	$this->load->model('mol_time');
        $data['blank'] = '';
        if(isset($_GET['c_id'])){
			$id['program_date_id'] = $_GET['c_id'];
			$data['program_date_edit'] = $this->mol_time->deleteProgram_date($id);
	}
	redirect('time/program_date');
   }
   
   
   function cycle_time_paper_add()
   {
        $this->load->database();
       	$this->load->view('time/cycle_time_paper_add');
   }
   
   function cycle_time_paper()
   {
      $this->load->model('mol_time_paper');
      $id['user_id'] = $this->session->userdata('user_id');
      
      if(isset($_POST['btn_submit'])){

                    $query11 = $this->db->query('SELECT * FROM time_cycle_paper WHERE time_cycle_conferences='.$this->conferences_now());        
                    $query20 = $this->db->query('SELECT time_cycle_paper_id FROM time_cycle_paper WHERE time_cycle_conferences='.$this->conferences_now().' LIMIT 1');                     
                    $query12=0;
                    foreach ($query20->result() as $row)
                    {
                        $query12 = $row->time_cycle_paper_id;
                    }
                    
                    for ($x =1; $x <= $query11->num_rows(); $x++) {  
                        if(($_POST['time_cycle_paper_date_start'.$query12])<=($_POST['time_cycle_paper_date_end'.$query12]))
                        {
                            if(empty($_POST['time_cycle_paper_date_start'.$query12])){
                                $_POST['time_cycle_paper_date_start'.$query12] = '0000-00-00';
                                $insert = array( 'time_cycle_paper_date_start' => $_POST['time_cycle_paper_date_start'.$query12],
                                );
                            }

                            if(empty($_POST['time_cycle_paper_date_end'.$query12])){
                                $_POST['time_cycle_paper_date_end'.$query12] = '0000-00-00';
                                $insert = array( 'time_cycle_paper_date_end' => $_POST['time_cycle_paper_date_end'.$query12],
                                );
                            }
                        
                            $insert = array(
                                            'time_cycle_paper_id' => $_POST['time_cycle_paper_id'.$query12],
                                            'time_cycle_paper_date_start' => $_POST['time_cycle_paper_date_start'.$query12],
                                            'time_cycle_paper_date_end' => $_POST['time_cycle_paper_date_end'.$query12],
                            );
                  
                            $this->mol_time_paper->updateNews_public($insert);   
                            $query12++;
                        }
                    }
                    echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("ได้ทำการแก้ไขกำหนดการเป็นที่เรียบร้อยแล้ว"); }'
                                        . '</script></body></html>';   

                        //var_dump($_POST); 
			redirect('time/cycle_time_paper', 'refresh');   
                        
	}
      $data['time_cycle_paper'] = $this->mol_time_paper->getNews_public($id);
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('time/cycle_time_paper', $data);
   }
   
   function cycle_time_paper_edit()
   {
                
       		$this->load->model('mol_time_paper');
		$data['blank'] = '';
                
		if(isset($_POST['btn_submit'])){
			$insert = array(
					'time_cycle_paper_id' => $_POST['time_cycle_paper_id'],
					//'time_cycle_paper_name' => $_POST['time_cycle_paper_name'],
					'time_cycle_paper_date_start' => $_POST['time_cycle_paper_date_start'],
                                        'time_cycle_paper_date_end' => $_POST['time_cycle_paper_date_end'],
                                        'time_cycle_paper_status' => $_POST['time_cycle_paper_status'],
				);
                        //$this->form_validation->set_rules('time_cycle_paper_name', 'กลุ่มที่ต้องการจัดการ', 'required');
                        $this->form_validation->set_rules('time_cycle_paper_date_start', 'วันที่เริ่ม', 'required');
                        $this->form_validation->set_rules('time_cycle_paper_date_end', 'วันที่สิ้นสุด', 'required');
                        $this->form_validation->set_rules('time_cycle_paper_status', 'สถานะ', 'required');

			if($this->form_validation->run() == FALSE){               
			}
                        else{     
				if(isset($_POST['time_cycle_paper_id']) && trim($_POST['time_cycle_paper_id']) != ''){
					$insert['time_cycle_paper_id'] = $_POST['time_cycle_paper_id'];
					$this->mol_time_paper->updateNews_public($insert);
				}else{
					$this->mol_time_paper->insertNews_public($insert);
				}
				redirect('time/cycle_time_paper');
                                }
		}else if(isset($_POST['btn_back'])){
			redirect('time/cycle_time_paper');
		}
		if(isset($_GET['c_id'])){
			$id['time_cycle_paper_id'] = $_GET['c_id'];
			$data['time_cycle_paper_edit'] = $this->mol_time_paper->getNews_public($id);
		}
       
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('time/cycle_time_paper_edit', $data);
   }
}
?>

