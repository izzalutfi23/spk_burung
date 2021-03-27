<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Juri extends CI_Controller {

    function __construct(){
        parent::__construct();
        if($this->session->userdata('user') && $this->session->userdata('level')=="juri"){
            
        }
        else{
            redirect('login');
        }
    }

	public function index()
	{
		echo "juri";
	}
}
