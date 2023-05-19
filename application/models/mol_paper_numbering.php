<?php

/**
 * Created by PhpStorm.
 * User: kong5
 * Date: 12/2/2560
 * Time: 14:11
 */
class mol_paper_numbering extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    /**
     * @param $select
     * @return mixed
     */
    public function getLastPerperNumber($select){
        $this->db->select('paper_numbering_number');
        $this->db->from('paper_numbering');
        $this->db->where('paper_numbering_no',$select['no']);
        $this->db->where('paper_numbering_year',$select['year']);
        $this->db->where('paper_numbering_dep',$select['dep']);
        $this->db->order_by("paper_numbering_number","desc");
        $this->db->limit(1);
        $query_reviewer = $this->db->get()->row();
        return $query_reviewer;
    }

    /**
     * @param $data
     */
    public function set_paper_number($data){
        $this->db->insert('paper_numbering', $data);
    }

    /**
     * @param $data
     */
    public function update_paper_number($data){
        $this->db->where('paper_numbering_year', $data['paper_numbering_year']);
        $this->db->where('paper_numbering_dep', $data['paper_numbering_dep']);
        $this->db->update('paper_numbering', $data);
    }

    /**
     * @return mixed
     */
    public function getCurent_conferenceYear(){
        $this->db->select('conferences_select_note');
        $this->db->from('conferences_select_on');
        $this->db->where('conferences_select_status', 1);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getLastPerperFileNumber($select){
        $this->db->select('	paper_file_show');
        $this->db->from('paper_file');
        $this->db->where('paper_detail_id',$select);
        $this->db->order_by("paper_file_show","desc");
        $this->db->limit(1);
        $query_reviewer = $this->db->get()->row();
        return $query_reviewer;
    }
}