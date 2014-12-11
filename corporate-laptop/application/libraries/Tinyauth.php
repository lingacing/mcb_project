<?php

class Tinyauth
{
	var $CI = NULL;
	var $_valid = NULL;
	
	public function __construct(){
		$this->CI =& get_instance();
		
		$this->CI->load->database();
		$this->CI->load->library('session');
		$this->CI->load->library('form_validation');
		$this->CI->load->helper('url');
		$this->CI->load->helper('security');
		$this->_valid = $this->CI->form_validation;
	}
	
	//fuction login buat masukkin data username password
	public function login(){
		$this->restrict(TRUE);
		
		$config = array(
				  array(
					'field' => 'username',
					'label' => 'Administrator',
					'rules' => 'trim|required|xss_clean|min_length[3]|max_length[20]'
					),
				  array(
					'field' => 'password',
					'label' => 'sandi',
					'rules' => 'trim|required|min_length[6]'
					)
				);
		$this->_valid->set_rules($config);
		
		//ngecek apakah data yang masuk dan data tersebut valid
		if($this->_valid->run() !== FALSE AND $this->CI->input->post('submit_login') != ''){
			$login = array (
						'user'=> $this->CI->input->post('username'),
						'pass'=> $this->CI->input->post('password')
					);
					
			if ($this->_validate_login($login))
			{
				$this->redirect();
			}
		}
		$data['title'] = 'Login';
		$this->CI->load->view('admin/form_login',$data);
	}
	
	//validasi data masuk
	private function _validate_login($login=NULL){
		$this->CI->load->helper('array');
		
		if ( ! isset($login) && ! is_array($login)){
			return FALSE;
		}
		
		if (count ($login) != 2){
			return FALSE;
		}
		
		$query = $this->CI->db->get_where('user', array('user_stats'=>'active','username'=>$login['user'],'password'=>sha1(do_hash($login['pass'], 'md5'))));
		
		if ($query->num_rows() == 1){
			foreach($query->result() as $val){
				$uname = $val->username;
				$uid = $val->id_admin;
				$ulevel = $val->user_level;
			}
			$this->CI->session->set_userdata('user_id',$uid);
			$this->CI->session->set_userdata('user_level',$ulevel);
			
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	//ngecek apakah pengguna sukses masuk apa kagak
	public function logged_in(){
		if($this->CI->session->userdata('user_id') == ""){
			#$this->CI->session->set_flashdata('no','OOps User name or Password Doesn\'t match');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	
	//logout
	public function logout(){
		$this->CI->session->sess_destroy();
		redirect('/');
	}
	
	//pengarahan halaman terakhir yang akan diakses
	public function redirect(){
		if ($this->CI->session->userdata('redirector') ==""){
			redirect('admin/');
		}
		
		else {
			redirect($this->CI->session->userdata('redirector'));
		}
	}
	
	//pembatasan hak akses setelah login maupun log out
	public function restrict($logged_out = FALSE){
		if($logged_out AND $this->logged_in()){
			$this->redirect();
		}
		
		if ( ! $logged_out AND ! $this->logged_in())
		{
			$this->CI->session->set_userdata('redirector',$this->CI->uri->uri_string());
			redirect('porta/form');
		}
	}
	
	public function just_admin(){
		if($this->CI->session->userdata('user_level') != 'top_admin'){
			redirect('404');
		}
	}

}

?>