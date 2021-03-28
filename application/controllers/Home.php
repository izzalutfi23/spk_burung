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
        $jml_kriteria = count($kriteria);
        $data = [
            'event' => $event,
            'kriterias' => $kriteria,
            'jml_kriteria' => $jml_kriteria
        ];
        $this->load->view('home', $data);
    }

}