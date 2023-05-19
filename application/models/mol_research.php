<?php

	class mol_research extends CI_Model
	{
		function __construct()
	    {
	        parent::__construct();
	        $this->load->database();
	    }

	    public function getRecord_all($quotation) {

	        $this->db->select('department_id');
	    	$this->db->from('department');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			return $rows;
	    }

	    public function getResearch_type($id = array()){
	    	if(isset($id['department_id']) && trim($id['department_id'] != '')){
	    		$this->db->where('department_id', $id['department_id']);
	    	}
	    	$this->db->select('department_id, department_name ,department_status');
	    	$this->db->from('department');
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
	    public function insertResearch_type($data){
	    	$this->db->insert('department', $data);
	    }

	    public function updateResearch_type($data){
	    	if(isset($data['department_id']) && trim($data['department_id'] != '')){
	    		$this->db->where('department_id', $data['department_id']);
	    	}
	    	$query = $this->db->update('department', $data);
	    }
            
	}
?>