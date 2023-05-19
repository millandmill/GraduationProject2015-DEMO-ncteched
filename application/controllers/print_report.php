<?php defined('BASEPATH') OR exit('No direct script access allowed');

class print_report extends CI_Controller {
    
    public function news()
    {
        $this->load->database();
        $this->load->view('print_report/news');
    }
    
    public function important_dates()
    {
        $this->load->database();
        $this->load->view('print_report/important_dates');
    }
    
    public function program_date()
    {
        $this->load->database();
        $this->load->view('print_report/program_date');
    }
    
    public function program_date_before()
    {
        $this->load->database();
        $this->load->view('print_report/program_date_before');
    }
    
    public function paper_dates()
    {
        $this->load->database();
        $this->load->view('print_report/paper_dates');
    }
    public function paper_conference()
    {
        $this->load->database();
        $this->load->view('print_report/paper_conference');
    }
    public function paper_total1()
    {
        $this->load->database();
        $this->load->view('print_report/paper_total1');
    }
}
?>