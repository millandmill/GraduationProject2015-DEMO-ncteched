<?php

/**
 * Created by PhpStorm.
 * User: developer
 * Date: 16/2/2560
 * Time: 17:23 น.
 */
class mol_auth_evaluation extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUser_by_Eval($eval_id){
        $this->db->select('user_id');
        $this->db->from('evaluation');
        $this->db->where('evaluation_id', $eval_id);
        return $this->db->get()->row();
    }
}