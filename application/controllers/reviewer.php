<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class reviewer extends CI_Controller {

   public function reviewer_detail()
	{
		$this->load->model('mol_commeettee');
		$id['user_id'] = $this->session->userdata('user_id');
		$data['commeettee'] = $this->mol_commeettee->getPerson($id);

		$this->load->view('template/header/header');
		$this->load->view('template/menuleft/menuleft_reviewer');
		$this->load->view('reviewer/reviewer_detail', $data);//2
	}

	public function reviewer_detail_add()
	{
               
		$this->load->model('mol_commeettee');
		//config image.
		$config['upload_path'] = './uploads/img/';
                $config['allowed_types'] = 'gif|jpg|png';
                //$config['max_size']	= '2048';                        //2048KB

		$this->load->library('upload', $config);

		$data['blank'] = "";
		if(isset($_POST['btn_submit'])){
			$insert = array(
					'commeettee_fname' => $_POST['name'],
                                        'commeettee_type_name' => $_POST['commeettee_type_name'],
					'commeettee_address' => $_POST['address'],
					'commeettee_district' => $_POST['district'],
					'commeettee_county' => $_POST['county'],
					'commeettee_road' => $_POST['road'],
					'commeettee_building' => $_POST['building'],
					'commeettee_floor' => $_POST['floor'],
					'commeettee_province' => $_POST['sltprovince'],
					'commeettee_zip' => $_POST['zip'],
					'commeettee_tel' => $_POST['tel'],
                                        'commeettee_department' => '',                    
					'commeettee_fax' => $_POST['fax'],
                                        //'commeettee_pic' => '',
					'user_id' => $this->session->userdata('user_id')
                                        );

                        
                        $this->form_validation->set_rules('name', 'name', 'required');
                        $this->form_validation->set_rules('commeettee_type_name', 'commeettee_type_name', 'required');
                        $this->form_validation->set_rules('address', 'commeettee_address', 'required');
                        $this->form_validation->set_rules('district', 'commeettee_district', 'required');
                        $this->form_validation->set_rules('county', 'commeettee_county', 'required');
                        $this->form_validation->set_rules('sltprovince', 'commeettee_province', 'required');
                        $this->form_validation->set_rules('zip', 'commeettee_zip', 'required');
                        $this->form_validation->set_rules('tel', 'commeettee_tel', 'required');
                        
			//$this->form_validation->set_rules('name', 'name', 'callback_check_company['.$insert["commeettee_address"].','.$insert["commeettee_district"].','.$insert["commeettee_county"].','
			//	.$insert["commeettee_province"].','.$insert["commeettee_zip"].','.$insert["commeettee_tel"].','.$insert["commeettee_fax"].','.'image'.']');
			if($this->form_validation->run() == FALSE){
                            
                            echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("กรุณาตรวจสอบข้อมูลที่กรอกในข้อมูลส่วนตัวอีกครั้งว่าถูกต้องตามรูปแบบหรือไม่ ?"); }'
                                        . '</script></body></html>';            
                            redirect(base_url().'/commeettee/commeettee_detail_add?c_id='.$_POST['commeettee_id'], 'refresh');               
			}else{        
                    //submit checkbox department         
                        $insert['commeettee_department'] = join(", ", $_POST['department']);    
	            //upload file image.
	            if($this->upload->do_upload('image')) {
	                $data = array('upload_data' => $this->upload->data());
	                $file_name = $data['upload_data']['file_name'];
	                $insert['commeettee_pic'] = $file_name;
	            }
	            
	            if(isset($_POST['commeettee_id']) && trim($_POST['commeettee_id']) != ''){
	                    $insert['commeettee_id'] = $_POST['commeettee_id'];
	                    $commeettee_id = $this->mol_commeettee->updatePerson($insert);
	            }else{
	                    $commeettee_id = $this->mol_commeettee->insertPerson($insert);
	                    //$this->session->set_userdata('commeettee_id', $commeettee_id);
	            }
	            redirect('reviewer/reviewer_detail');
			}
		}else if(isset($_POST['btn_back'])){
			redirect('reviewer/reviewer_detail');
		}
		if(isset($_GET['c_id'])){
			$id['commeettee_id'] = $_GET['c_id'];
			$data['commeettee_edit'] = $this->mol_commeettee->getPerson($id);
		}
                
		$data['forProvince'] = $this->mol_commeettee->getProvince();
                $data['forDepartment'] = $this->mol_commeettee->getDepartment();
                $data['forCommeettee_type'] = $this->mol_commeettee->getCommeettee_type();
		$this->load->view('template/header/header');
		$this->load->view('template/menuleft/menuleft_reviewer');
		$this->load->view('reviewer/reviewer_detail_add', $data);
                
	}

	public function check_company($name, $data)
	{
		$data = preg_split('/,/', $data);
	    $address = $data[0];
	    $district = $data[1];
	    $county = $data[2];
	    $province = $data[3];
	    $zip = $data[4];
	    $tel = $data[5];

	    $fax = $data[6];
	    $image = $data[7];
	    //$logo = $data[8];
            
		$this->load->model('mol_commeettee');

		if($name == ""){
			$this->form_validation->set_message('check_company', 'The name field is required.');
			return false;
		}else if($address == ""){
			$this->form_validation->set_message('check_company', 'The Address field is required.');
			return false;
		}else if($district == ""){
			$this->form_validation->set_message('check_company', 'The District field is required.');
			return false;
		}else if($county == ""){
			$this->form_validation->set_message('check_company', 'The County field is required.');
			return false;
		}else if($province == ""){
			$this->form_validation->set_message('check_company', 'The Province field is required.');
			return false;
		}else if($zip == ""){
			$this->form_validation->set_message('check_company', 'The Zip field is required.');
			return false;
		}else if($tel == ""){
			$this->form_validation->set_message('check_company', 'The Telephone number field is required.');
			return false;
		}else if(!preg_match('/[0-9]{5}/', $zip)){
			$this->form_validation->set_message('check_company', 'The Zip field must be number and 5 characters only.');
			return false;
		}else{
			//check upload image.
			if(isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
		    	if($this->upload->do_upload('image')) {
			        // set a $_POST value for 'image' that we can use later
			        $upload_data = $this->upload->data();
			        $_POST['image'] = $upload_data['file_name'];
			        return true;
		      	}else if($_FILES['image']['type'] !== "image/jpeg" || $_FILES['image']['type'] !== "image/png") {
		      		$this->form_validation->set_message('check_company', "You must upload an image only.");
		      		return false;
		      	}else{
			        // possibly do some clean up ... then throw an error
			        $this->form_validation->set_message('check_company', 'Size of image more than 2 MB.');
			        return false;
		      	}
		    }else if(!isset($_FILES['image'])){
			    // throw an error because nothing was uploaded
			    $this->form_validation->set_message('check_company', "Image file error.");
			    return false;
		    }

			if(isset($_POST['commeettee_id']) && trim($_POST['commeettee_id']) != ''){
				return true;
			}
                        
                        
                        
			$check = $this->mol_commeettee->checkPerson($this->session->userdata('user_id'));
			if($check != null){
				$this->form_validation->set_message('check_company', 'Your company is already.');
				return false;
			}else{
				return true;
			}
		}
	}
   
   

}
?>

