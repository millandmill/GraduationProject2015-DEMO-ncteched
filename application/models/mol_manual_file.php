<?php

	class mol_manual_file extends CI_Model
	{
	    function __construct()
	    {
	        parent::__construct();
	        $this->load->database();
	    }
            
            public function getManual_all($quotation) {

	        $this->db->select('file_manual_id');
	    	$this->db->from('file_manual');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			return $rows;
	    }
            
            public function getManual($id = array()){
	    	if(isset($id['file_manual_id']) && trim($id['file_manual_id'] != '')){
	    		$this->db->where('file_manual_id', $id['file_manual_id']);
	    	}
	    	$this->db->select('*');
	    	$this->db->from('file_manual');
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

            public function updateFile_manual($data){
	    	if(isset($data['file_manual_id']) && trim($data['file_manual_id'] != '')){
	    		$this->db->where('file_manual_id', $data['file_manual_id']);
	    	}
	    	$query = $this->db->update('file_manual', $data);
	    } 
            
            public function insertFile_manual($data){
	    	$this->db->insert('file_manual', $data);
	    }   
	}
?>