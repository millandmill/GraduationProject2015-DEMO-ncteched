<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mol_evaluation
 *
 * @author Kong
 */
class mol_evaluation extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all(){
        
    }
    
    public function get_one($id){
        $this->db->select('*');
        $this->db->from('evaluation');
        $this->db->join('paper_detail', 'evaluation.paper_detail_id = paper_detail.paper_detail_id','LEFT');
        $this->db->where('evaluation.evaluation_id', $id);
        return $this->db->get()->row();
    }

    public function get_evaluation_by_user($user_id,$eval_id){
        $this->db->select('*');
        $this->db->from('evaluation');
        $this->db->where('evaluation_id', $eval_id);
        $this->db->where('user_id', $user_id);
        return $this->db->get()->row();
    }
    
    public function get_evaluation_comment_by_one($id){
        $select_eval = "paper_file_evaluation_comment.paper_file_evaluation_comment_id, paper_file_evaluation_comment.paper_file_evaluation_comment_text,paper_file_evaluation_comment.paper_file_evaluation_comment_file,paper_file_evaluation_comment.paper_file_evaluation_comment_hash,paper_file_evaluation_comment.paper_file_evaluation_comment_type,paper_file_evaluation_comment.paper_file_evaluation_comment_year_dir,paper_file_evaluation_comment.paper_file_evaluation_comment_status, evaluation.user_id";
        $select_file_hash = "paper_file_eval_hash.paper_file_eval_hash_id, paper_file_eval_hash.paper_file_eval_hash_str, paper_file_eval_hash.flag";

        $this->db->select('evaluation.*, paper_detail.*,'.$select_eval.', '.$select_file_hash);
        $this->db->from('evaluation');
        $this->db->join('paper_detail', 'evaluation.paper_detail_id = paper_detail.paper_detail_id','left outer');
        $this->db->join('paper_file_evaluation_comment', 'evaluation.evaluation_id = paper_file_evaluation_comment.evaluation_id','left outer');
        $this->db->join('paper_file_eval_hash', 'paper_file_evaluation_comment.paper_file_evaluation_comment_id = paper_file_eval_hash.paper_file_evaluation_comment_id','left outer');
        $this->db->where('evaluation.evaluation_id', $id);
        return $this->db->get()->row();
    }

    public function insert($data){
        $this->db->insert("evaluation",$data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    
    public function insert_comment($data){
        $this->db->insert("paper_file_evaluation_comment",$data);
        return $this->db->insert_id();
    }

    public function insert_file_hash($data)
    {
        $this->db->insert('paper_file_eval_hash', $data);
        return $this->db->insert_id();
    }

    public function update(){
        
    }
    
    public function calculate(){
        
    }
}
