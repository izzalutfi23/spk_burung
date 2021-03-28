<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        $event = $this->Madmin->get_event()->result();
        $kriteria = $this->Madmin->get_kriteria()->result();
        $data = [
            'event' => $event,
            'kriterias' => $kriteria
        ];
        $this->load->view('home', $data);
    }

}