<?php

	class mol_welcome extends CI_Model
	{
		function __construct()
	    {
	        parent::__construct();
	        $this->load->database();
	    }

	    public function insertUser($data = array())
	    {
	    	$this->db->insert('user', $data);
                $this->db->query('INSERT INTO user_detail(user_id) SELECT MAX(user.user_id) FROM user WHERE user_type=0');
	    }

	    public function checkRegister($user, $email)
	    {
	    	if(isset($user) && trim($user != '')){
	    		$this->db->where('username', $user);
	    	}
	    	if(isset($email) && trim($email != '')){
	    		$this->db->or_where('email', $email);
	    	}
	    	$this->db->select('username, email');
	    	$this->db->from('user');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			if($rows > 0){
				for ($i=0; $i < $rows; $i++) { 
					$data[$i] = $query->row_array($i);
				}
			}else{
				$data = null;
			}
			return $data;
	    }

	    public function checkChangePassword($user, $pass)
	    {
	    	if(isset($user) && trim($user != '')){
	    		$this->db->where('username', $user);
	    	}
	    	if(isset($pass) && trim($pass != '')){
	    		$this->db->where('password', $pass);
	    	}
	    	$this->db->select('username, password');
	    	$this->db->from('user');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			if($rows > 0){
				for ($i=0; $i < $rows; $i++) { 
					$data[$i] = $query->row_array($i);
				}
			}else{
				$data = null;
			}
			return $data;
	    }

	    public function updateNewPass($user, $data, $oldPass)
	    {
	    	if(isset($user) && trim($user != '')){
	    		$this->db->where('username', $user);
	    	}
	    	if(isset($oldPass) && trim($oldPass != '')){
	    		$this->db->or_where('password', $oldPass);
	    	}
	    	$this->db->update('user', $data);
	    }

	    public function checkLogin($user)
	    {
	    	if(isset($user) && trim($user != '')){
	    		$this->db->where('username', $user);
	    	}
	    	$this->db->select('user_id, username, user_type, password');
	    	$this->db->from('user');
	    	$query = $this->db->get();
			$rows = $query->num_rows();
			if($rows == 1){
				for ($i=0; $i < $rows; $i++) { 
					$data[$i] = $query->row_array($i);
				}
			}else{
				$data = null;
			}
			return $data;
	    }
	}
?>