<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('madmin');
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '2048';
		$config['max_height']  = '1024';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->session->set_flashdata('no',$this->upload->display_errors());
			$this->session->set_flashdata('active',$this->input->post('active'));
			redirect($this->input->post('redirect'),'refresh');
		}
		else
		{
			$img['upload_data'] = $this->upload->data();
			
			$key = $this->input->post('img_status');
			$val = $img['upload_data']['file_name'];
			
			$cek = $this->db->get_where('option',array('key'=>$key))->row();
			$image_content = "./uploads/images/$cek->val";
			if (file_exists($image_content) && $cek->val != '') {
				unlink($image_content);
			}
			
			$this->madmin->save_option($key,$val);
			$this->session->set_flashdata('yes','Image has been saved!');
			$this->session->set_flashdata('active',$this->input->post('active'));
			redirect($this->input->post('redirect'),'refresh');
		}
	}
}
?>