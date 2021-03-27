<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Auth');
    }
    
	public function index()
	{
        $this->load->view('login');
    }

    public function auth(){
        $user=$_POST['username'];
        $pass=md5($_POST['password']);
        $query=$this->Auth->cek($user,$pass);
        $cek=$query->num_rows();
        $data = $query->row();
        if($cek>0){
            if($data->level=="admin"){
                $this->session->set_userdata(array('user'=>$user, 'level'=>$data->level));
                redirect('admin');
            }
            else{
                $this->session->set_userdata(array('user'=>$user, 'level'=>$data->level));
                $this->session->set_flashdata('login', 'Berhasil Melakukan Login');
                redirect('juri');
            }
        }
        else{
            redirect('login');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}