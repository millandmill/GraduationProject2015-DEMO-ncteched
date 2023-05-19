<?php

/**
 * Created by PhpStorm.
 * User: kong5
 * Date: 8/2/2560
 * Time: 18:55
 */
class mol_check  extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_Paper($paper_id){
//        $this->db->select('paper_detail_id');
        $this->db->select('*');
        $this->db->from('paper_detail');
        $this->db->where('paper_detail_id', $paper_id);
        return $this->db->get()->row();
    }

    public function get_Paper_evaluate($id){
//        $this->db->select('paper_detail_id');
        $this->db->select('*');
        $this->db->from('paper_file');
        $this->db->join('paper_detail', 'paper_detail.paper_detail_id = paper_file.paper_detail_id','LEFT');
        $this->db->where('paper_file.paper_file_id', $id);
        return $this->db->get()->row();
    }

    public function get_paper_with_Oid($owner_id){
        $this->db->select('*');
        $this->db->from('paper_detail_owner');
        $this->db->where('paper_detail_owner_id', $owner_id);
        return $this->db->get()->row();
    }

    public function get_public($id = array()){
        $this->db->select('*');
        $this->db->where('paper_reviewer.paper_detail_id' ,$id);
        $this->db->join('paper_reviewer', 'paper_detail.paper_detail_id = paper_reviewer.paper_detail_id');
        $this->db->from('paper_detail');
        $query = $this->db->get()->row();
        return $query;
    }

    public function check_user_type($user_id){
        $this->db->select('active_status, user_type, user_bad');
        $this->db->where('user_id',$user_id);
        $qet_active_status = $this->db->get('user');
        $data_check = array_shift($qet_active_status->result_array());
        return $data_check;
    }

    public function get_evaluation_owner($eval_id){
        $this->db->select('evaluation_id');
        $this->db->from('evaluation');
        $this->db->where('evaluation_id', $eval_id);
        return $this->db->get()->row();
    }

    public function get_evaluation($eval_id){
        $this->db->select('user_id,	paper_detail_id');
        $this->db->from('evaluation');
        $this->db->where('evaluation_id', $eval_id);
        return $this->db->get()->row();
    }

    public function get_paper_file($file_id){
        $this->db->select('*');
        $this->db->from('paper_file');
        $this->db->where('paper_file_id', $file_id);
        return $this->db->get()->row();
    }

}