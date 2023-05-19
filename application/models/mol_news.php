<?php

	class mol_news extends CI_Model
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

	        $this->db->select('news_public_id');
	    	$this->db->from('news_public');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			return $rows;
	    }

	    public function getNews_public($id = array()){
	    	if(isset($id['news_public_id']) && trim($id['news_public_id'] != '')){
	    		$this->db->where('news_public_id', $id['news_public_id']);
	    	}
	    	$this->db->select('news_public_id, news_name ,news_description ,news_type_status ,news_public_date,news_public_times ,news_public_conferences');
	    	$this->db->from('news_public');
                $this->db->where('news_public_conferences',$this->conferences_now());
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
	    	$this->db->insert('news_public', $data);
	    }

	    public function updateNews_public($data){
	    	if(isset($data['news_public_id']) && trim($data['news_public_id'] != '')){
	    		$this->db->where('news_public_id', $data['news_public_id']);
	    	}
	    	$query = $this->db->update('news_public', $data);
	    }
            
            public function deleteNews_public($data){
                if(isset($data['news_public_id']) && trim($data['news_public_id'] != '')){
	    		$this->db->where('news_public_id', $data['news_public_id']);
	    	}
	    	$query = $this->db->delete('news_public', $data);
	    }
            
	}
?>