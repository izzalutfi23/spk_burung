<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        $post = $this->Madmin->get_post()->result();
        $data = [
            'title' => 'Post',
            'post' => $post
        ];
        $this->load->view('utama', $data);
    }

    public function hasil(){
        $event = $this->Madmin->get_event()->result();
        $kriteria = $this->Madmin->get_kriteria()->result();
        $jml_kriteria = count($kriteria);

        $kriteriaa = count($this->Madmin->get_kriteria()->result());
        $events = count($this->Madmin->get_event()->result());
        $pesertas = count($this->Madmin->get_peserta()->result());
        $users = count($this->Madmin->get_user()->result());
        
        $data = [
            'event' => $event,
            'kriterias' => $kriteria,
            'jml_kriteria' => $jml_kriteria,
            
            'kriteriaa' => $kriteriaa,
            'events' => $events,
            'pesertas' => $pesertas,
            'users' => $users
        ];
        $this->load->view('home', $data);
    }

    public function detail($id){
        $post = $this->Madmin->get_post($id)->row();
        $data = [
            'title' => 'Post',
            'post' => $post
        ];
        $this->load->view('detail', $data);
    }

}