<?php

class mol_time extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function conferences_now()
    {
        $conferences_on = "";
        $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
        foreach ($query1112->result() as $data) {
            $conferences_on = $data->conferences_select_on;
        }
        return $conferences_on;
    }

    public function getRecord_all($quotation)
    {

        $this->db->select('time_cycle_id');
        $this->db->from('time_cycle');
        $query = $this->db->get();
        $rows = $query->num_rows();
        return $rows;
    }

    public function getRecord_program_date_all($quotation)
    {

        $this->db->select('program_date_id');
        $this->db->from('program_date');
        $query = $this->db->get();
        $rows = $query->num_rows();
        return $rows;
    }
    /*
    public function getNews_public($id = array())
    {
        if (isset($id['time_cycle_id']) && trim($id['time_cycle_id'] != '')) {
            $this->db->where('time_cycle_id', $id['time_cycle_id']);
        }
        $this->db->select('time_cycle_id, time_cycle_name , time_cycle_date_start ,time_cycle_date_end , time_cycle_status');
        $this->db->from('time_cycle');
        $this->db->where('time_cycle_conferences', $this->conferences_now());
        $query = $this->db->get();
        $rows = $query->num_rows();
        if ($rows > 0) {
            for ($i = 0; $i < $rows; $i++) {
                $data[$i] = $query->row_array($i);
            }
        } else {
            $data = null;
        }

        //if($rows < 4){
        //    $dt = new DateTime();
        //    $this->db->query("DELETE FROM time_cycle WHERE time_cycle_conferences=".$this->conferences_now());
        //    $this->db->query("INSERT INTO time_cycle (time_cycle_name, time_cycle_conferences, time_cycle_date_start, time_cycle_date_end) VALUES ('Regist สมัครสมาชิก','".$this->conferences_now()."','".$dt->format('Y-m-d')."','".$dt->format('Y-m-d')."')");
        //    $this->db->query("INSERT INTO time_cycle (time_cycle_name, time_cycle_conferences, time_cycle_date_start, time_cycle_date_end) VALUES ('ส่งบทความ','".$this->conferences_now()."','".$dt->format('Y-m-d')."','".$dt->format('Y-m-d')."')");
        //    $this->db->query("INSERT INTO time_cycle (time_cycle_name, time_cycle_conferences, time_cycle_date_start, time_cycle_date_end) VALUES ('การแก้ไข paper','".$this->conferences_now()."','".$dt->format('Y-m-d')."','".$dt->format('Y-m-d')."')");
        //    $this->db->query("INSERT INTO time_cycle (time_cycle_name, time_cycle_conferences, time_cycle_date_start, time_cycle_date_end) VALUES ('Payment การชำระค่าลงทะเบียน','".$this->conferences_now()."','".$dt->format('Y-m-d')."','".$dt->format('Y-m-d')."')");
        //    $this->db->query("UPDATE time_cycle SET time_cycle_status='YES' WHERE time_cycle_conferences=".$this->conferences_now());
        //}


        return $data;
    }
    */
    public function getProgram_date($id = array())
    {
        if (isset($id['program_date_id']) && trim($id['program_date_id'] != '')) {
            $this->db->where('program_date_id', $id['program_date_id']);
        }
        $this->db->select('*');
        $this->db->from('program_date');
        $this->db->where('program_date_conferences', $this->conferences_now());
        $query = $this->db->get();
        $rows = $query->num_rows();
        if ($rows > 0) {
            for ($i = 0; $i < $rows; $i++) {
                $data[$i] = $query->row_array($i);
            }
        } else {
            $data = null;
        }
        return $data;
    }

    public function insertNews_public($data)
    {
        $this->db->insert('time_cycle', $data);
    }

    public function insertProgram_date($data)
    {
        $this->db->insert('program_date', $data);
    }

    public function updateNews_public($data)
    {
        if (isset($data['time_cycle_id']) && trim($data['time_cycle_id'] != '')) {
            $this->db->where('time_cycle_id', $data['time_cycle_id']);
        }
        $query = $this->db->update('time_cycle', $data);
    }

    public function updateProgram_date($data)
    {
        if (isset($data['program_date_id']) && trim($data['program_date_id'] != '')) {
            $this->db->where('program_date_id', $data['program_date_id']);
        }
        $query = $this->db->update('program_date', $data);
    }

    public function deleteProgram_date($data)
    {
        if (isset($data['program_date_id']) && trim($data['program_date_id'] != '')) {
            $this->db->where('program_date_id', $data['program_date_id']);
        }
        $query = $this->db->delete('program_date', $data);
    }
}

?>