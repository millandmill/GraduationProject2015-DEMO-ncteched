<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mol_upload_file
 *
 * @author kong
 */
class mol_upload_file extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert_file($data)
    {
        $this->load->database();
        $this->db->insert('paper_file', $data);
        return $this->db->insert_id();
    }

    public function insert_file_hash($data)
    {
        $this->load->database();
        $this->db->insert('paper_file_hash', $data);
        return $this->db->insert_id();
    }
    
    public function update_file($data , $data0)
    {
        $this->load->database();
        $where = ('`paper_file_id` ORDER BY `paper_file_id` DESC LIMIT 1');   
        return $this->db->update('paper_file',$data,$where);
    }
    
    public function get_files()
    {
		$this->load->database();
        /*return $this->db->select()
                ->from('paper_file')
                ->get()
                ->result();*/
        return $this->db->get("paper_file")->result();
    }
    
    public function get_file_by_paper_detail_id($detail_id)
    {
		$this->load->database();
        return $this->db->select()
                ->from('paper_file')
                ->join('paper_file_hash', 'paper_file_hash.paper_file_id = paper_file.paper_file_id','LEFT')
                ->where('paper_file.paper_detail_id', $detail_id)
                ->order_by("paper_file.paper_file_id", "asc")
                ->get()
                ->result();
    }

    public function get_last_file_by_paper_detail_id($detail_id)
    {
        return $this->db->select('*')
            ->from('paper_file')
            ->order_by("paper_file_id", "desc")
            ->limit(1)
            ->where('paper_detail_id', $detail_id)
            ->get()
            ->result();
    }

    public  function get_paper_reviewer_by_paper_detail_id($detail_id){
        return $this->db->select()
            ->from('paper_reviewer')
            ->where('paper_detail_id', $detail_id)
            ->get()
            ->result();
    }


    public function delete_file($file_id)
    {
		$this->load->database();
        $file = $this->get_file($file_id);
        if (!$this->db->where('id', $file_id)->delete('paper_file'))
        {
            return FALSE;
        }
        unlink('./files/' . $file->filename);    
        return TRUE;
    }
    
    public function get_file($file_id)
    {
		$this->load->database();
        return $this->db->select()
                ->from('paper_file')
                ->where('paper_file_id', $file_id)
                ->get()
                ->row();
    }

    public function get_eval_file($file_id)
    {
        $this->load->database();
        return $this->db->select()
            ->from('paper_file_evaluation_comment')
            ->where('paper_file_evaluation_comment_id', $file_id)
            ->get()
            ->row();
    }

    public function get_payment_file($file_id)
    {
        $this->load->database();
        return $this->db->select()
            ->from('payment_system')
            ->where('payment_system_id', $file_id)
            ->get()
            ->row();
    }

    public  function get_paper_file_hash($detail_id){
        return $this->db->select()
            ->from('paper_file_hash')
            ->where('paper_file_hash_str', $detail_id)
            ->get()
            ->row();
    }

    public  function get_paper_file_index_hash($detail_id){
        return $this->db->select()
            ->from('paper_file_index_hash')
            ->where('paper_file_index_hash_str', $detail_id)
            ->get()
            ->row();
    }

    public  function get_paper_file_eval_hash($detail_id){
        return $this->db->select()
            ->from('paper_file_eval_hash')
            ->where('paper_file_eval_hash_str', $detail_id)
            ->get()
            ->row();
    }

    public  function get_payment_file_hash($detail_id){
        return $this->db->select()
            ->from('payment_system_hash')
            ->where('payment_system_hash_str', $detail_id)
            ->get()
            ->row();
    }

    public  function get_att_file_hash($detail_id){
        return $this->db->select()
            ->from('news_email_logs_hash')
            ->where('news_email_logs_hash_str', $detail_id)
            ->get()
            ->row();
    }

    public function get_att_file($file_id)
    {
        $this->load->database();
        return $this->db->select()
            ->from('news_email_logs')
            ->where('news_email_logs_id', $file_id)
            ->get()
            ->row();
    }
    
}
