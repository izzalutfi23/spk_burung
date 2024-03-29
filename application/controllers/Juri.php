<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Juri extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
        if($this->session->userdata('user') && $this->session->userdata('level')=="juri"){
            
        }
        else{
            redirect('login');
        }
    }

	public function index()
	{
        $username = $this->session->userdata('user');
        $user = $this->db->get_where('user', ['username'=>$username])->row();
        $event = $this->Madmin->get_event_byiduser($user->id_user)->result();
		$data = [
            'title' => 'Penilaian',
            'event' => $event
        ];

        $this->load->view('juri/_header', $data);
        $this->load->view('juri/event');
        $this->load->view('juri/_footer');
	}

    public function penilaian($id){
        $kriteria = $this->Madmin->get_kriteria()->result();
        $peserta = $this->Madmin->get_pesertan($id)->result();
        $jml_kriteria = count($kriteria);
        $data = [
            'title' => 'Penilaian',
            'kriteria' => $kriteria,
            'peserta' => $peserta,
            'jml_kriteria' => $jml_kriteria
        ];
        $this->load->view('juri/_header', $data);
        $this->load->view('juri/penilaian');
        $this->load->view('juri/_footer');
    }

    public function create_penilaian($id){
        $kriteria = $this->Madmin->get_kriteria()->result();
        $peserta = $this->Madmin->get_pesertan($id)->result();
        $nilai = $this->db->get('nilai')->result();
        $idnil = [];
        foreach($nilai as $n){
            array_push($idnil, $n->id_peserta);
        }
        $data = [
            'title' => 'Penilaian',
            'kriteria' => $kriteria,
            'peserta' => $peserta,
            'id_nil' => $idnil
        ];
        $this->load->view('juri/_header', $data);
        $this->load->view('juri/add_penilaian');
        $this->load->view('juri/_footer');
    }

    public function store_penilaian(){
        $data = [
            'nilai' => $this->input->post('nilai'),
            'id_kriteria' => $this->input->post('id_kriteria'),
            'id_peserta' => $this->input->post('id_peserta')
        ];
        $id = $this->input->post('id');
        $this->Madmin->store_nilai($data);
        redirect('juri/penilaian/'.$id);
    }

    public function del_nilai($id, $id_event){
        $this->Madmin->del_n($id);
        redirect('juri/penilaian/'.$id_event);
    }

    public function hasilevent()
	{
        $username = $this->session->userdata('user');
        $user = $this->db->get_where('user', ['username'=>$username])->row();
        $event = $this->Madmin->get_event_byiduser($user->id_user)->result();
		$data = [
            'title' => 'Hasil Lomba',
            'event' => $event
        ];

        $this->load->view('juri/_header', $data);
        $this->load->view('juri/hasil_event');
        $this->load->view('juri/_footer');
	}

    public function hasil($id){
        $username = $this->session->userdata('user');
        $user = $this->db->get_where('user', ['username'=>$username])->row();
        $event = $this->Madmin->get_event_byiduser($user->id_user)->row();

        $kriteria = $this->Madmin->get_kriteria()->result();
        $peserta = $this->Madmin->get_pesertan($id)->result();
        $jml_kriteria = count($kriteria);
        $data = [
            'title' => 'Penilaian',
            'kriterias' => $kriteria,
            'peserta' => $peserta,
            'jml_kriteria' => $jml_kriteria,
            'event' => $event
        ];
        $this->load->view('juri/_header', $data);
        $this->load->view('juri/hasil');
        $this->load->view('juri/_footer');
    }

    public function cetak(){
        $hasil = $this->input->post('hasil');
        $data = [
            'hasil' => json_decode($hasil),
            'event' => $this->input->post('event')
        ];
        $this->load->view('juri/print', $data);
    }
}
