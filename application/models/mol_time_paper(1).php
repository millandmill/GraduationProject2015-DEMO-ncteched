<?php

	class mol_time_paper extends CI_Model
	{
		function __construct()
	    {
	        parent::__construct();
	        $this->load->database();
	    }
            
            function conferences_now()
            {
                $conferences_on ="";
                $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
                foreach ($query1112->result() as $data){
                    $conferences_on  = $data->conferences_select_on;
                }
                return $conferences_on;
            }

	    public function getRecord_all($quotation) {

	        $this->db->select('time_cycle_paper_id');
	    	$this->db->from('time_cycle_paper');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			return $rows;
	    }
            
	    public function getNews_public($id = array()){
	    	if(isset($id['time_cycle_paper_id']) && trim($id['time_cycle_paper_id'] != '')){
	    		$this->db->where('time_cycle_paper_id', $id['time_cycle_paper_id']);
	    	}
	    	$this->db->select('*');
	    	$this->db->from('time_cycle_paper');
                $this->db->where('time_cycle_conferences',$this->conferences_now());
                $this->db->order_by("time_cycle_conferences", "DESC");
                
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

	    public function updateNews_public($data){
	    	if(isset($data['time_cycle_paper_id']) && trim($data['time_cycle_paper_id'] != '')){
	    		$this->db->where('time_cycle_paper_id', $data['time_cycle_paper_id']);
	    	}
	    	return $this->db->update('time_cycle_paper', $data);
	    } 
            

	}
?>