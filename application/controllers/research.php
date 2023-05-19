<?php

class research extends CI_Controller {

   function department()
   {
      $this->load->model('mol_research');
      $id['user_id'] = $this->session->userdata('user_id');

      $data['department'] = $this->mol_research->getResearch_type($id);
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('research/department', $data);
   }

   function department_add()
   {
       		$this->load->model('mol_research');
		$data['blank'] = '';
                
		if(isset($_POST['btn_submit'])){
			$insert = array(
					'department_id' => $_POST['department_id'],
					'department_name' => $_POST['department_name'],
					'department_status' => $_POST['department_status'],
				);
                        $this->form_validation->set_rules('department_name', 'ชื่อประเภทงานวิจัย', 'required');
                        $this->form_validation->set_rules('department_status', 'อนุญาตไหม', 'required');
                        
                        
			if($this->form_validation->run() == FALSE){
                            
			}
                        
                        else{
                        
				if(isset($_POST['department_id']) && trim($_POST['department_id']) != ''){
					$insert['department_id'] = $_POST['department_id'];
					$this->mol_research->updateResearch_type($insert);
				}else{
					$this->mol_research->insertResearch_type($insert);
				}
				redirect('research/department');
                                }
		}else if(isset($_POST['btn_back'])){
			redirect('research/department');
		}
		if(isset($_GET['c_id'])){
			$id['department_id'] = $_GET['c_id'];
			$data['department_edit'] = $this->mol_research->getResearch_type($id);
		}
       
      $this->load->view('template/header/header');
      $this->load->view('template/menuleft/menuleft');
      $this->load->view('research/department_add', $data);
   }
   
   /*
    public function check_customer($name, $data)
    {
        $data = preg_split('/,/', $data);
        $department_name = $data[0];
        $department_status = $data[1];

        if(!preg_match('/[0-9]{5}/', $department_name)){
                $this->form_validation->set_message('check_customer', 'The Zip field must be number and 5 characters only.');
                return false;
        }else if(!preg_match('/[0-9]{9,10}/', $department_status)){
                $this->form_validation->set_message('check_customer', 'The Telephone number must be number and 9-10 characters only.');
                return false;
        }
    }  */
   
   
   
}
?>

