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
class mol_paper extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_all($id) {

        $this->db->select('paper_detail_id');
        $this->db->from('paper_detail');
        $this->db->where('user_id',$id['user_id']);
        $query = $this->db->get();
        $rows = $query->num_rows();
        return $rows;
    }

    public function get_public($id = array()){
        if(isset($id['paper_detail_id']) && trim($id['paper_detail_id'] != '')){
                $this->db->where('paper_detail_id', $id['paper_detail_id']);
        }
        if(isset($id['user_id']) && trim($id['user_id'] != '')){
                $this->db->where('user_id', $id['user_id']);
        }
        if(isset($id['conferences_select_id']) && trim($id['conferences_select_id'] != '')){
            $this->db->where('conferences_select_id '.$id['operate'], $id['conferences_select_id']);
        }
        $this->db->select('*');
        $this->db->from('paper_detail');
        //$this->db->where('user_id',$id['user_id']);
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
    
    public function getPaper_detail_status($id){
        $this->db->select('paper_detail_status');
        $this->db->from('paper_detail');
        $this->db->where('paper_detail_id', $id);
        return $this->db->get()->row();
    }
    
    public function get_paper_owner($id){
        $this->db->select('*');
        $this->db->from('paper_detail_owner');
        $this->db->where('paper_detail_id',$id);
        $this->db->order_by("paper_detail_owner_flg","desc");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_one_paper_owner($id){
        $this->db->select('*');
        $this->db->from('paper_detail_owner');
        $this->db->where('paper_detail_owner_id', $id);
        return $this->db->get()->row();
    }

    public function create($data){
        $this->db->insert('paper_detail', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    	
    public function create_batch($data){
        $count = count($data['count']);
        
        for($i = 0; $i<$count; $i++){
            $entries[] = array(
                'paper_detail_id' => $data['jpaper_id'][$i],
                'paper_detail_owner_name' => $data['jname'][$i],
                'paper_detail_owner_email' => $data['jemail'][$i],
                'paper_detail_owner_address' => $data['jaddress'][$i],
                'paper_detail_owner_tel' => $data['jtel'][$i],
                'paper_detail_owner_status' => $data['status'][$i],
                'user_id' => $this->session->userdata('user_id'),
                );
        }
        $this->db->insert_batch('paper_detail_owner', $entries); 
        if($this->db->affected_rows() > 0)
            return 1;
        else
            return 0;
    }

    public function add_owner($data){
        if($this->db->insert('paper_detail_owner', $data)){
            return true;
        }else{
            return false;
        }


    }

    public function update_owner($data){
        if(isset($data['paper_detail_owner_id']) && trim($data['paper_detail_owner_id'] != '')){
            $this->db->where('paper_detail_owner_id', $data['paper_detail_owner_id']);
        }
        $query = $this->db->update('paper_detail_owner', $data);
        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function delete_owner($data){
        if(isset($data) && trim($data != '')){
            $this->db->where('paper_detail_owner_id', $data);
            $this->db->delete('paper_detail_owner');
        }
    }

    public function update($data){
            if(isset($data['paper_detail_id']) && trim($data['paper_detail_id'] != '')){
                    $this->db->where('paper_detail_id', $data['paper_detail_id']);
            }
            $query = $this->db->update('paper_detail', $data);
        }
    
            
    public function update_paper_status($data){
                 $this->db->where('paper_detail_id', $data['paper_detail_id']);
        $query = $this->db->update('paper_detail', $data);
    }

    public function getUser_paper_reviewer($paper_detail_id){
        //22222222222222222222222222222222222222222222222222222
        $this->db->select('*');
        $this->db->from('paper_reviewer');
        $this->db->where('paper_detail_id',$paper_detail_id);
        $query_r = $this->db->get();
        $second_compare_reviewer = array();

        foreach ($query_r->result() as $obj_rss){
            $second_compare_reviewer[0]['user_id'] = $obj_rss->paper_file_owner_comment1 ;
            $second_compare_reviewer[1]['user_id'] = $obj_rss->paper_file_owner_comment2 ;
            $second_compare_reviewer[2]['user_id'] = $obj_rss->paper_file_owner_comment3 ;
            $second_compare_reviewer[3]['user_id'] = $obj_rss->paper_file_owner_comment4 ;
        }

        return $second_compare_reviewer;
    }

    public function getEvaluation_by_file_id($file_id,$user_id){

        $this->db->select('*');
        $this->db->from('evaluation');
        $this->db->where('evaluation.paper_file_id', $file_id);
        $this->db->where('evaluation.user_id', $user_id);
        $this->db->join('paper_file_evaluation_comment', 'evaluation.evaluation_id = paper_file_evaluation_comment.evaluation_id','LEFT');

        $query = $this->db->get()->row();

        return $query;
    }

    public function getPeperOwner_by_paper_id($paper_id){
        $this->db->select('paper_detail_owner_id');
        $this->db->from('paper_detail_owner');
        $this->db->where('paper_detail_id', $paper_id);
        $query = $this->db->get()->result();
        return $query;
    }

    public function updatePaper_owner_flg($insert,$id){
        $this->db->where('paper_detail_owner_id', $id);
        $query = $this->db->update('paper_detail_owner', $insert);
    }

    public function getCurent_conference(){
        $this->db->select('conferences_select_id');
        $this->db->from('conferences_select_on');
        $this->db->where('conferences_select_status', 1);
        $query = $this->db->get()->row();
        return $query;
    }
}
