<?php

	class mol_commeettee extends CI_Model
	{
		function __construct()
	    {
	        parent::__construct();
	        $this->load->database();
	    }

	    public function getPerson($data)
	    {
	    	if(isset($data['commeettee_id']) && trim($data['commeettee_id'] != '')){
	    		$this->db->where('commeettee.commeettee_id', $data['commeettee_id']);
	    	}
	    	if(isset($data['user_id']) && trim($data['user_id'] != '')){
	    		$this->db->where('commeettee.user_id', $data['user_id']);
	    	}
	    	$this->db->select('commeettee_id, commeettee_fname, commeettee_type_name, commeettee_address, commeettee_district, commeettee_county,  commeettee_road, commeettee_building, commeettee_floor, commeettee_province, 
	    		commeettee_zip, commeettee_tel, commeettee_fax, commeettee_pic, commeettee.user_id, user.email, commeettee_department');
	    	$this->db->join('user', 'commeettee.user_id = user.user_id');
	    	$this->db->from('commeettee');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			if($rows > 0){
				for($i=0; $i < $rows; $i++){
					$data[$i] = $query->row_array($i);
				}
			}else{
				$data = null;
			}
			return $data;
	    }

	    public function getProvince()
	    {
	    	$this->db->select('province_name');
	    	$this->db->from('province');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			if($rows > 0){
				for($i=0; $i < $rows; $i++){
					$data[$i] = $query->row_array($i);
				}
			}else{
				$data = null;
			}
			return $data;
	    }
            
            public function getDepartment()
	    {
                $query = $this->db->query("SELECT * FROM department where department_status='YES'");
			$rows = $query->num_rows();
			if($rows > 0){
				for($i=0; $i < $rows; $i++){
					$data[$i] = $query->row_array($i);
				}
			}else{
				$data = null;
			}
			return $data;
	    }
            
            public function getCommeettee_type()
	    {
                $query = $this->db->query("SELECT * FROM commeettee_type where commeettee_type_status='YES'");
			$rows = $query->num_rows();
			if($rows > 0){
				for($i=0; $i < $rows; $i++){
					$data[$i] = $query->row_array($i);
				}
			}else{
				$data = null;
			}
			return $data;
	    }
            
            
	    public function insertPerson($data = array())
	    {
	    	$query = $this->db->insert('commeettee', $data);
	    	if($query) {
	            $insert_id = $this->db->insert_id();
	            return $insert_id;
	        }
	    }

	    public function updatePerson($data = array())
	    {
	    	if(isset($data['commeettee_id']) && trim($data['commeettee_id'] != '')){
	    		$this->db->where('commeettee_id', $data['commeettee_id']);
	    	}
	    	$query = $this->db->update('commeettee', $data);
	    }

	    public function checkPerson($id)
	    {
	    	if(isset($id) && trim($id != '')){
	    		$this->db->where('commeettee_id', $id);
	    	}
	    	$this->db->select('commeettee_id');
	    	$this->db->from('commeettee');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			if($rows > 0){
				for($i=0; $i < $rows; $i++){
					$data[$i] = $query->row_array($i);
				}
			}else{
				$data = null;
			}
			return $data;
	    }
	}
?>