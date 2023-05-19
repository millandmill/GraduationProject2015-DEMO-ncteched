<?php

	class mol_user_detail extends CI_Model
	{
		function __construct()
	    {
	        parent::__construct();
	        $this->load->database();
	    }

	    public function getPerson($data)
	    {
	    	if(isset($data['user_detail_id']) && trim($data['user_detail_id'] != '')){
	    		$this->db->where('user_detail.user_detail_id', $data['user_detail_id']);
	    	}
	    	if(isset($data['user_id']) && trim($data['user_id'] != '')){
	    		$this->db->where('user_detail.user_id', $data['user_id']);
	    	}
	    	$this->db->select('user_detail_id, user_detail_fname, user_detail_address, user_detail_district, user_detail_county,  user_detail_road, user_detail_building, user_detail_floor, user_detail_province,'
                        . '       user_detail_zip, user_detail_tel, user_detail_fax , user_detail.user_id, user.email');
	    	//$this->db->select('*');
                $this->db->join('user', 'user_detail.user_id = user.user_id');
	    	$this->db->from('user_detail');
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
	    public function insertPerson($data = array())
	    {
	    	$query = $this->db->insert('user_detail', $data);
	    	if($query) {
	            $insert_id = $this->db->insert_id();
	            return $insert_id;
	        }
	    }

	    public function updatePerson($data = array())
	    {
	    	if(isset($data['user_detail_id']) && trim($data['user_detail_id'] != '')){
	    		$this->db->where('user_detail_id', $data['user_detail_id']);
	    	}
	    	    $query = $this->db->update('user_detail', $data);  
                    return $query;
	    }

	    public function checkPerson($id)
	    {
	    	if(isset($id) && trim($id != '')){
	    		$this->db->where('user_detail_id', $id);
	    	}
	    	$this->db->select('user_detail_id');
	    	$this->db->from('user_detail');
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