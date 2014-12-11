<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mgallery extends CI_Model {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
    }
	
	function get_image($type){
		$this->db->order_by('upload_date','desc');
		$this->db->where('type_for',$type);
		$query = $this->db->get('gallery');
		
		return $query;
	}
	
	function save_info($img_data,$type){
		
		$data['gallery_title']=$this->input->post('gallery_title');
		$data['gallery_description']=$this->input->post('gallery_description');
		$data['gallery_file_name']=$img_data['raw_name'];
		$data['gallery_extension']=$img_data['file_ext'];
		$data['file_size']=$img_data['file_size'];
		$data['upload_date']=date("Y-m-d H:i:s",strtotime("now"));
		$data['type_for']=$type;
		
		$this->db->insert('gallery',$data);
	}
	function save_image_post($name){
		$this->db->where('gallery_file_name',$name);
		$query = $this->db->get('gallery');

		if($query->num_rows() == 0){
			$data['gallery_title']=$this->input->post('gallery_title');
			$data['gallery_description']=$this->input->post('gallery_description');
			$data['gallery_file_name']=$name;
			$data['upload_date']=date("Y-m-d H:i:s",strtotime("now"));
			$data['type_for']='post';
			
			$this->db->insert('gallery',$data);
		}
	}
	
	function update_gallery($img_data,$gallery_id){
	
		$data['gallery_title']=$this->input->post('gallery_title');
		$data['gallery_description']=$this->input->post('gallery_description');
		
		if($img_data != ''){
			$data['gallery_file_name']=$img_data['raw_name'];
			$data['gallery_extension']=$img_data['file_ext'];
			$data['file_size']=$img_data['file_size'];
		}
		
		$data['upload_date']=date("Y-m-d H:i:s",strtotime("now"));
		$data['type_for']='gallery';
		
		$this->db->where('gallery_id', $gallery_id);
		$this->db->update('gallery', $data); 
	}
	
	function get_gallery($id){
		$this->db->where('gallery_id',$id);
		$query = $this->db->get('gallery');
		
		return $query;
	}
	
	function delete($id){
		$this->db->where('gallery_id',$id);
		$query = $this->db->get('gallery');
		$row = $query->row();
		
		unlink("./uploads/$row->gallery_file_name$row->gallery_extension");
		unlink("./uploads/thumbs/$row->gallery_file_name$row->gallery_extension");
		
		$this->db->delete('gallery', array('gallery_id' => $id)); 
	}
	
}
?>