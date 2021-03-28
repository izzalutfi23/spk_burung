<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
        if($this->session->userdata('user') && $this->session->userdata('level')=="admin"){
            
        }
        else{
            redirect('login');
        }
    }

	public function index()
	{
        $kriteria = count($this->Madmin->get_kriteria()->result());
        $event = count($this->Madmin->get_event()->result());
        $peserta = count($this->Madmin->get_peserta()->result());
        $user = count($this->Madmin->get_user()->result());

		$data = [
            'title' => 'Dashboard',
            'kriteria' => $kriteria,
            'event' => $event,
            'peserta' => $peserta,
            'user' => $user
        ];
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/home');
        $this->load->view('admin/_footer');
	}

    // Kriteria
    public function kriteria(){
        $kriteria = $this->Madmin->get_kriteria()->result();
        $data = [
            'title' => 'Kriteria',
            'kriteria' => $kriteria
        ];
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/kriteria');
        $this->load->view('admin/_footer');
    }

    public function kriteria_create(){
        $data = [
            'title' => 'Add Kriteria'
        ];
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/add_kriteria');
        $this->load->view('admin/_footer');
    }

    public function kriteria_store(){
        $param = [
            'nama_kriteria' => $this->input->post('nama_kriteria'),
            'jenis' => $this->input->post('jenis'),
            'bobot' => $this->input->post('bobot')
        ];
        $this->Madmin->store_k($param);
        redirect('admin/kriteria');
    }

    public function edit_kriteria($id){
        $kriteria = $this->Madmin->get_kriteria($id)->row();
        $data = [
            'title' => 'Edit Kriteria',
            'kriteria' => $kriteria
        ];
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/edit_kriteria');
        $this->load->view('admin/_footer');
    }

    public function update_kriteria(){
        $param = [
            'nama_kriteria' => $this->input->post('nama_kriteria'),
            'jenis' => $this->input->post('jenis'),
            'bobot' => $this->input->post('bobot')
        ];
        $id = $this->input->post('id');
        $this->Madmin->update_k($param, $id);
        redirect('admin/kriteria');
    }

    public function del_kriteria($id){
        $this->Madmin->del_k($id);
        redirect('admin/kriteria');
    }

    // Event
    public function event(){
        $event = $this->Madmin->get_event()->result();
        $data = [
            'title' => 'Event',
            'event' => $event
        ];
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/event');
        $this->load->view('admin/_footer');
    }

    public function event_create(){
        $juri = $this->Madmin->get_juri()->result();
        $data = [
            'title' => 'Tambah Event',
            'juri' => $juri
        ];
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/add_event');
        $this->load->view('admin/_footer');
    }

    public function event_store(){
        $param = [
            'nama_event' => $this->input->post('nama_event'),
            'id_user' => $this->input->post('id_user')
        ];
        $this->Madmin->store_e($param);
        redirect('admin/event');
    }

    public function edit_event($id){
        $event = $this->Madmin->get_event($id)->row();
        $juri = $this->Madmin->get_juri()->result();
        $data = [
            'title' => 'Edit Event',
            'event' => $event,
            'juri' => $juri
        ];
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/edit_event');
        $this->load->view('admin/_footer');
    }

    public function event_update(){
        $param = [
            'nama_event' => $this->input->post('nama_event'),
            'id_user' => $this->input->post('id_user')
        ];
        $id = $this->input->post('id');
        $this->Madmin->update_e($param, $id);
        redirect('admin/event');
    }

    public function del_event($id){
        $this->Madmin->del_e($id);
        redirect('admin/event');
    }

    // Peserta
    public function peserta(){
        $peserta = $this->Madmin->get_peserta()->result();
        $data = [
            'title' => 'Peserta',
            'peserta' => $peserta
        ];
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/peserta');
        $this->load->view('admin/_footer');
    }

    public function peserta_create(){
        $event = $this->Madmin->get_event()->result();
        $data = [
            'title' => 'Tambah Peserta',
            'event' => $event
        ];
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/add_peserta');
        $this->load->view('admin/_footer');
    }

    public function peserta_store(){
        $param = [
            'id_event' => $this->input->post('id_event'),
            'nama_peserta' => $this->input->post('nama_peserta'),
            'no_hp' => $this->input->post('no_hp'),
            'nama_burung' => $this->input->post('nama_burung')
        ];
        $this->Madmin->store_pes($param);
        redirect('admin/peserta');
    }

    public function edit_peserta($id){
        $peserta = $this->Madmin->get_peserta($id)->row();
        $event = $this->Madmin->get_event()->result();
        $data = [
            'title' => 'Peserta',
            'peserta' => $peserta,
            'event' => $event
        ];
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/edit_peserta');
        $this->load->view('admin/_footer');
    }

    public function peserta_update(){
        $param = [
            'id_event' => $this->input->post('id_event'),
            'nama_peserta' => $this->input->post('nama_peserta'),
            'no_hp' => $this->input->post('no_hp'),
            'nama_burung' => $this->input->post('nama_burung')
        ];
        $id = $this->input->post('id');
        $this->Madmin->update_pes($param, $id);
        redirect('admin/peserta');
    }

    public function del_peserta($id){
        $this->Madmin->del_pes($id);
        redirect('admin/peserta');
    }

    // User
    public function user(){
        $user = $this->Madmin->get_user()->result();
        $data = [
            'title' => 'User',
            'user' => $user
        ];
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/user');
        $this->load->view('admin/_footer');
    }

    public function user_create(){
        $data = [
            'title' => 'Tambah User'
        ];
        $this->load->view('admin/_header', $data);
        $this->load->view('admin/add_user');
        $this->load->view('admin/_footer');
    }

    public function user_store(){
        $param = [
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level')
        ];
        $this->Madmin->store_u($param);
        redirect('admin/user');
    }

    public function del_user($id){
        $this->Madmin->del_u($id);
        redirect('admin/user');
    }
    
}
