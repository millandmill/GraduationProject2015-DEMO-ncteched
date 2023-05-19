<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mol_paper_file
 *
 * @author kong
 */
class mol_paper_file extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function insert_file($data)
   {
      
      $this->db->insert('paper_file', $data);
      return $this->db->insert_id();
   }

   public function get_files()
    {
       return $this->db->select()
             ->from('paper_file')
             ->get()
             ->result();
    }

    public function get_files_by_paper_detail($paper_detail_id)
    {
       return $this->db->select()
             ->from('paper_file')
             ->where('paper_detail_id', $paper_detail_id)
             ->get()
             ->row();
    }

    public function delete_file($file_id)
    {
       $file = $this->get_file($file_id);
       if (!$this->db->where('id', $file_id)->delete('files'))
       {
          return FALSE;
       }
       unlink('./files/' . $file->filename);  
       return TRUE;
    }

    public function get_file($file_id)
    {
       return $this->db->select()
             ->from('files')
             ->where('id', $file_id)
             ->get()
             ->row();
    }
}
