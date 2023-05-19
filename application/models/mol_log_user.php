<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mol_log_user
 *
 * @author kong
 */
class mol_log_user extends CI_Model {
    function __construct()
	    {
	        parent::__construct();
	        
	    }
		
    public function insertUserLog($data){
            $this->db->insert('log_user', $data);
    }
}
