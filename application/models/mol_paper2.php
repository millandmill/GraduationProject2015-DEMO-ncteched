<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mol_paper
 *
 * @author kong
 */
class mol_paper2 extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_all($quotation) {

        $this->db->select('paper_detail_id');
        $this->db->from('paper_detail');
        $query = $this->db->get();
        $rows = $query->num_rows();
        return $rows;
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

    public function get_public($id = array()){
        if(isset($id['paper_detail_id']) && trim($id['paper_detail_id'] != '')){
                $this->db->where('paper_detail_id', $id['paper_detail_id']);
        }
        if(isset($id['conferences_select_id']) && trim($id['conferences_select_id'] != '')){
            $this->db->where('conferences_select_id '.$id['operate'], $id['conferences_select_id']);
        }
        
        $this->db->select('*');
        $this->db->join('paper_reviewer', 'paper_detail.paper_detail_id = paper_reviewer.paper_detail_id');
        $this->db->from('paper_detail');
        $this->db->where('conferences_select_id',$this->conferences_now());
        $this->db->where('paper_reviewer.paper_file_owner_comment1',$this->session->userdata('user_id'));
        $this->db->or_where('paper_reviewer.paper_file_owner_comment2',$this->session->userdata('user_id'));
        $this->db->or_where('paper_reviewer.paper_file_owner_comment3',$this->session->userdata('user_id'));
        $this->db->or_where('paper_reviewer.paper_file_owner_comment4',$this->session->userdata('user_id'));
        
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
    
    public function get_one($id){

        $this->db->select('*');
        $this->db->from('paper_detail');
        $this->db->join('department', 'department.department_id = paper_detail.department_id','LEFT');
        $this->db->join('paper_detail_status', 'paper_detail_status.paper_detail_status_id = paper_detail.paper_detail_status','LEFT');
        $this->db->join('conferences_select_on', 'conferences_select_on.conferences_select_id = paper_detail.conferences_select_id','LEFT');
        $this->db->where('paper_detail.paper_detail_id', $id);
        return $this->db->get()->row();
    }
    
    public function get_result_evaluation($p_id,$f_id,$user_id){

        $this->db->select('*');
        $this->db->from('evaluation');
        $this->db->where('paper_detail_id', $p_id);
        $this->db->where('paper_file_id', $f_id);
        $this->db->where('user_id', $user_id);
        $result = $this->db->get()->row();
        return $result;
    }
    public function get_numrow_evaluation($p_id,$f_id,$user_id){
        
        $this->db->where('paper_detail_id', $p_id);
        $this->db->where('paper_file_id', $f_id);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('evaluation');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function get_numrow_evaluation_comment($e_id,$user_id){

        $this->db->where('evaluation_id', $e_id);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('paper_file_evaluation_comment');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }

    }
    
    public function get_file_by_paper($id){
        
        $this->db->select('*');
        $this->db->from('paper_file');
        $this->db->join('paper_detail', 'paper_detail.paper_detail_id = paper_file.paper_detail_id','LEFT');
        $this->db->where('paper_file.paper_file_id', $id);
        return $this->db->get()->row();
    }
    
    public function create($data){
        $this->db->insert('paper_detail', $data);
    }
    
    public function update($data){
	    	if(isset($data['paper_detail_id']) && trim($data['paper_detail_id'] != '')){
	    		$this->db->where('paper_detail_id', $data['paper_detail_id']);
	    	}
	    	$query = $this->db->update('paper_detail', $data);
	    }
    
            
    public function update_file($data , $file_id)
    {
        $this->db->trans_start();
        $this->db->where('paper_file_id', $file_id);
        $this->db->update('paper_file', $data); 
        
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    public function getPeperOwnerPresent_by_paper_id($paper_id){
        $this->db->select('*');
        $this->db->from('paper_detail_owner');
        $this->db->where('paper_detail_id', $paper_id);
        $this->db->where('paper_detail_owner_flg', 1);
        $query = $this->db->get()->row();

        return $query;
    }

    public function getUser_detail($user_id){
        $this->db->select('*');
        $this->db->from('commeettee');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get()->row();

        return $query;
    }
}
