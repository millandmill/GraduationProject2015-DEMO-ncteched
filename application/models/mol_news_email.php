<?php

/**
 * Created by PhpStorm.
 * User: developer
 * Date: 21/6/2560
 * Time: 10:24 น.
 */
class mol_news_email extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_user_detail_from_type($type){
        $this->db->select('user_id,username,email');
        $this->db->from('user');
        $this->db->where_in('user_type',$type);
        $query = $this->db->get()->result();

        return $query;
    }

    public function insert_news_email($data){
        $this->db->insert("news_email_logs",$data);
        return $this->db->insert_id();
    }


    public function insert_file_hash($data)
    {
        $this->db->insert('news_email_logs_hash', $data);
        return $this->db->insert_id();
    }


}