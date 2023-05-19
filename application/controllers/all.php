<?php defined('BASEPATH') OR exit('No direct script access allowed');

class all extends CI_Controller {
    public function news()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('all/news');
    }
    public function paper_conference()
    {
        $this->load->database();
        $this->load->view('template/header/header_index');
        $this->load->view('all/paper_conference');
    }
}
?>