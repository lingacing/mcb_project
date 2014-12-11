<?php

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('tinyauth');
		
	}
	
	public function index(){
		$this->form();
	}
	
	public function form(){
		$this->tinyauth->login();
	}
	
	public function logout(){
		$this->tinyauth->logout();
	}
}

?>