<?php

	class mol_time extends CI_Model
	{
		function __construct()
	    {
	        parent::__construct();
	        $this->load->database();
	    }

	    public function getRecord_all($quotation) {

	        $this->db->select('time_cycle_id');
	    	$this->db->from('time_cycle');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			return $rows;
	    }
            
            public function getRecord_program_date_all($quotation) {

	        $this->db->select('program_date_id');
	    	$this->db->from('program_date');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			return $rows;
	    }
            
	    public function getNews_public($id = array()){
	    	if(isset($id['time_cycle_paper_id']) && trim($id['time_cycle_paper_id'] != '')){
	    		$this->db->where('time_cycle_paper_id', $id['time_cycle_paper_id']);
	    	}
	    	$this->db->select('time_cycle_paper_id, time_cycle_paper_name , time_cycle_paper_date_start , time_cycle_paper_date_end , time_cycle_paper_status');
	    	$this->db->from('time_cycle_paper');
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
            
            public function getProgram_date($id = array()){
	    	if(isset($id['program_date_id']) && trim($id['program_date_id'] != '')){
	    		$this->db->where('program_date_id', $id['program_date_id']);
	    	}
	    	$this->db->select('*');
	    	$this->db->from('program_date');
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
  
            public function insertNews_public($data){
	    	$this->db->insert('time_cycle_paper', $data);
	    }
            
            public function insertProgram_date($data){
	    	$this->db->insert('program_date', $data);
	    }

	    public function updateNews_public($data){
	    	if(isset($data['time_cycle_paper_id']) && trim($data['time_cycle_paper_id'] != '')){
	    		$this->db->where('time_cycle_paper_id', $data['time_cycle_paper_id']);
	    	}
	    	$query = $this->db->update('time_cycle_paper', $data);
	    } 
            
            public function updateProgram_date($data){
	    	if(isset($data['program_date_id']) && trim($data['program_date_id'] != '')){
	    		$this->db->where('program_date_id', $data['program_date_id']);
	    	}
	    	$query = $this->db->update('program_date', $data);
	    }
            
            public function deleteProgram_date($data){
                if(isset($data['program_date_id']) && trim($data['program_date_id'] != '')){
	    		$this->db->where('program_date_id', $data['program_date_id']);
	    	}
	    	$query = $this->db->delete('program_date', $data);
	    }
	}
?>