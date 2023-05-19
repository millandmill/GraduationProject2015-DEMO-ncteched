<?php

/**
 * Created by PhpStorm.
 * User: kong5
 * Date: 6/2/2560
 * Time: 19:33
 */
class mol_auth_paper extends CI_Model
{
    public function __construct() {

        parent::__construct();
    }

    public function getUser_by_Paper($paper_id){
        $this->db->select('user_id');
        $this->db->from('paper_detail');
        $this->db->where('paper_detail_id', $paper_id);
        return $this->db->get()->row();
    }
}