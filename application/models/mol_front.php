<?php

	class mol_front extends CI_Model
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

	        $this->db->select('header_id');
	    	$this->db->from('header');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			return $rows;
	    }
            
            public function getConference()
	    {
	    	$this->db->select('*');
	    	$this->db->from('conferences_select_on');
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

            public function getRecordPaperbook_all($quotation) {

	        $this->db->select('downloadpaper_file_id');
	    	$this->db->from('downloadpaper_file');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			return $rows;
	    }
            
            public function getRecordindexPaperbook_all($quotation) {

	        $this->db->select('index_paper_file_id');
	    	$this->db->from('index_paper_file');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			return $rows;
	    }
            
            public function getPaperbook_all($id = array()){
	    	if(isset($id['downloadpaper_file_id']) && trim($id['downloadpaper_file_id'] != '')){
	    		$this->db->where('downloadpaper_file_id', $id['downloadpaper_file_id']);
	    	}
	    	$this->db->select('*');
	    	$this->db->from('downloadpaper_file');
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
            
            public function getindexPaperbook_all($id = array()){
	    	if(isset($id['index_paper_file_id']) && trim($id['index_paper_file_id'] != '')){
	    		$this->db->where('index_paper_file_id', $id['index_paper_file_id']);
	    	}
	    	$this->db->select('*');
	    	$this->db->from('index_paper_file');
                $this->db->order_by("index_paper_file_key","desc");
                $this->db->order_by("index_paper_file_no","desc");
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
            
            
            public function updateConferences_select($data){
                $this->db->query("UPDATE conferences_select_on SET conferences_select_status='0'");
                $this->db->query("UPDATE conferences_select_on SET conferences_select_status='1' WHERE conferences_select_on=".$data);
	    }
            
            
            public function updatePaperbook($data){
	    	if(isset($data['downloadpaper_file_id']) && trim($data['downloadpaper_file_id'] != '')){
	    		$this->db->where('downloadpaper_file_id', $data['downloadpaper_file_id']);
	    	}
	    	$query = $this->db->update('downloadpaper_file', $data);
	    }    
            
            public function updateindexPaperbook($data){
	    	if(isset($data['index_paper_file_id']) && trim($data['index_paper_file_id'] != '')){
	    		$this->db->where('index_paper_file_id', $data['index_paper_file_id']);
	    	}
	    	$query = $this->db->update('index_paper_file', $data);
	    }
            
            public function insertindexPaperbook($data){
	    	$this->db->insert('index_paper_file', $data);
	    }
            
            public function deleteindexPaperbook($data){
                if(isset($data['index_paper_file_id']) && trim($data['index_paper_file_id'] != '')){
	    		$this->db->where('index_paper_file_id', $data['index_paper_file_id']);
	    	}
	    	$query = $this->db->delete('index_paper_file', $data);
	    }
            
            public function getDepartment()
	    {
	    	$this->db->select('department_name');
                $this->db->where('department_status','YES');
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
            
            
            public function insertPaperbook($data){
	    	$this->db->insert('downloadpaper_file', $data);
	    }
            
            public function deletePaperbook($data){
                if(isset($data['downloadpaper_file_id']) && trim($data['downloadpaper_file_id'] != '')){
	    		$this->db->where('downloadpaper_file_id', $data['downloadpaper_file_id']);
	    	}
	    	$query = $this->db->delete('downloadpaper_file', $data);
	    }

            public function getFooter_all($quotation) {

	        $this->db->select('footer_id');
	    	$this->db->from('footer');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			return $rows;
	    }
            
            public function deleteFooter($data){
                if(isset($data['footer_id']) && trim($data['footer_id'] != '')){
	    		$this->db->where('footer_id', $data['footer_id']);
	    	}
	    	$query = $this->db->delete('footer', $data);
	    }
            
            public function getAnnounce_all($quotation) {

	        $this->db->select('file_announce_id');
	    	$this->db->from('file_announce');
                
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			return $rows;
	    }
            
            
            public function getSchedule_all($quotation) {

	        $this->db->select('file_schedule_id');
	    	$this->db->from('file_schedule');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			return $rows;
	    }


	    public function getheader_public($id = array()){
	    	if(isset($id['header_id']) && trim($id['header_id'] != '')){
	    		$this->db->where('header_id', $id['header_id']);
	    	}
	    	$this->db->select('*');
	    	$this->db->from('header');
                $this->db->where('header_conferences_on',$this->conferences_now());
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
            
            public function getPicHeaderOld($data){
                $this->db->select('header_pic');
                $this->db->from('header');
                $this->db->where('header_id',$data);
                $query = $this->db->get();
                $result = $query->row();
                return $result->header_pic;     
	    }
            
            public function getFooter($id = array()){
	    	if(isset($id['footer_id']) && trim($id['footer_id'] != '')){
	    		$this->db->where('footer_id', $id['footer_id']);
	    	}
	    	$this->db->select('*');
	    	$this->db->from('footer');
                $this->db->where('footer_conferences_on',$this->conferences_now());
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
            
            
            public function getAnnounce($id = array()){
	    	if(isset($id['file_announce_id']) && trim($id['file_announce_id'] != '')){
	    		$this->db->where('file_announce_id', $id['file_announce_id']);
	    	} 
	    	$this->db->select('*');
	    	$this->db->from('file_announce');
                $this->db->where('file_announce_conferences_on',$this->conferences_now());
	    	$query = $this->db->get();  
			$rows = $query->num_rows();
			if($rows > 0){
				for($i=0; $i < $rows; $i++){
					$data[$i] = $query->row_array($i);
				}
			}else{
                                if($rows == 0)
                                {
                                    $insert = array(
                                        'file_announce_conferences_on' => $this->conferences_now(),
                                        'file_announce_note' => '-',
                                        'file_announce_name' => 'NC-conferences-x-xxxx-x.pdf'
                                    );
                                    $this->db->insert('file_announce', $insert);
                                    $this->db->select('*');
                                    $this->db->from('file_announce');
                                    $this->db->where('file_announce_conferences_on',$this->conferences_now());
                                    $query = $this->db->get();
                                    $rows = $query->num_rows();
                                    for($i=0; $i < $rows; $i++)
                                    {
                                        $data[$i] = $query->row_array($i);
                                    }
                                }
                                else
                                { 
                                    $data = null;
                                }
			}
			return $data;
	    }
            
            public function update_announce_file_status_NO($id)
            {
                $this->db->query("UPDATE file_announce SET file_announce_status = 'NO' WHERE file_announce_id=".$id);
            }
            
            public function update_announce_file_status_YES($id)
            {
                $this->db->query("UPDATE file_announce SET file_announce_status = 'YES' WHERE file_announce_id=".$id);
            }
            
            public function getSchedule($id = array()){
	    	if(isset($id['file_schedule_id']) && trim($id['file_schedule_id'] != '')){
	    		$this->db->where('file_schedule_id', $id['file_schedule_id']);
	    	}
	    	$this->db->select('*');
	    	$this->db->from('file_schedule');
                $this->db->where('file_schedule_conferences_on',$this->conferences_now());
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			if($rows > 0){
				for($i=0; $i < $rows; $i++){
					$data[$i] = $query->row_array($i);
				}
			}else{
                                if($rows == 0)
                                {
                                    $insert = array(
                                        'file_schedule_conferences_on' => $this->conferences_now(),
                                        'file_schedule_note' => '-',
                                        'file_schedule_name' => 'NCtechEd-X-2XXX-Conference-Session-Schedule-XX.pdf'
                                    );
                                    $this->db->insert('file_schedule', $insert);
                                    $this->db->select('*');
                                    $this->db->from('file_schedule');
                                    $this->db->where('file_schedule_conferences_on',$this->conferences_now());
                                    $query = $this->db->get();
                                    $rows = $query->num_rows();
                                    for($i=0; $i < $rows; $i++)
                                    {
                                        $data[$i] = $query->row_array($i);
                                    }
                                }
                                else
                                { 
                                    $data = null;
                                }				
			}
			return $data;
	    }
            
	    public function insertNews_public($data){
	    	$this->db->insert('header', $data);
	    }

	    public function updateNews_public($data){
	    	if(isset($data['header_id']) && trim($data['header_id'] != '')){
	    		$this->db->where('header_id', $data['header_id']);
	    	}
	    	$query = $this->db->update('header', $data);
	    }     
            
            public function updateFooter($data){
	    	if(isset($data['footer_id']) && trim($data['footer_id'] != '')){
	    		$this->db->where('footer_id', $data['footer_id']);
	    	}
	    	$query = $this->db->update('footer', $data);
	    } 
            
            public function insertFooter($data){
	    	$this->db->insert('footer', $data);
	    }
            
            public function getPicFooterOld($data){
                $this->db->select('footer_pic');
                $this->db->from('footer');
                $this->db->where('footer_id',$data);
                $query = $this->db->get();
                $result = $query->row();
                return $result->footer_pic;     
	    }
            
            public function updateFile_announce($data){
	    	if(isset($data['file_announce_id']) && trim($data['file_announce_id'] != '')){
	    		$this->db->where('file_announce_id', $data['file_announce_id']);
	    	}
	    	$query = $this->db->update('file_announce', $data);
	    } 
            
            public function insertFile_announce($data){
	    	$this->db->insert('file_announce', $data);
	    }
            
            public function updateFile_schedule($data){
	    	if(isset($data['file_schedule_id']) && trim($data['file_schedule_id'] != '')){
	    		$this->db->where('file_schedule_id', $data['file_schedule_id']);
	    	}
	    	$query = $this->db->update('file_schedule', $data);
	    } 
            
            public function insertFile_schedule($data){
	    	$this->db->insert('file_schedule', $data);
	    }
            
	}
?>