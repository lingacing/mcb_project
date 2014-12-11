<?php 
class Madmin extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function save_option($key,$val){
		$cek = $this->db->get_where('option',array('key'=>$key))->row();
		if(!$cek){
			$this->db->insert('option',array('key'=>$key));
		}
		
		$data['val'] = $val;
		$this->db->where('key',$key);
		$this->db->update('option',$data);
	}
	
	/* Artikel Model */
	function save_article($upload_data=''){
		$this->db->trans_start();
		$data['article_category'] = strip_tags($this->input->post('category'));
		$data['article_title'] = strip_tags($this->input->post('title'));
		$data['article_title_slug'] = strip_tags(strtolower(url_title($this->input->post('title'))));
		$data['article_summary'] = $this->input->post('article');
		#$data['article_link'] = strip_tags($this->input->post('url'));
		if(! empty($upload_data)){
			$data['article_image'] = $upload_data['file_name'];
		}
		$data['article_meta_description'] = strip_tags($this->input->post('meta_description'));
		$data['article_meta_keyword'] = strip_tags($this->input->post('meta_keyword'));
		$data['article_meta_title'] = strip_tags($this->input->post('meta_title'));
		$data['article_user_id'] = $this->session->userdata('user_id');
		$data['submited'] = 'admin';
		
		$this->db->insert('article',$data);
		$article_id = $this->db->insert_id();
		$this->db->trans_complete();
	}
	
	function update_article($article_id, $upload_data=''){
		$this->db->trans_start();
		
		$data['article_category'] = strip_tags($this->input->post('category'));
		$data['article_title'] = strip_tags($this->input->post('title'));
		#$data['article_title_slug'] = strip_tags(strtolower(url_title($this->input->post('title'))));
		$data['article_summary'] = $this->input->post('article');
		#$data['article_link'] = strip_tags($this->input->post('url'));
		if(! empty($upload_data)){
			$data['article_image'] = $upload_data['file_name'];
		}
		$data['article_meta_description'] = strip_tags($this->input->post('meta_description'));
		$data['article_meta_keyword'] = strip_tags($this->input->post('meta_keyword'));
		$data['article_meta_title'] = strip_tags($this->input->post('meta_title'));
		$data['article_user_id'] = $this->session->userdata('user_id');
		$data['submited'] = 'admin';
		
		$this->db->where('article_id',$article_id);
		$this->db->update('article',$data);
		#$article_id = $this->db->insert_id();
		
		$this->db->trans_complete();
	}
	
	function single_article($article_id){
		return $this->db->get_where('article',array('article_id'=>$article_id))->row();
	}
	
	function lastest_post($limit='',$offset=0){
		
		if(!empty($limit)) $this->db->limit($limit,$offset);
		$this->db->order_by('date','desc');
		$this->db->order_by('article_id','desc');
		$this->db->where('article_status','publish');
		$this->db->join('user', 'id_admin = article_user_id');
		return $this->db->get('article');
	}
	
	
	function get_post_stats($status,$limit,$offset){
		$this->db->limit($limit,$offset);
		$this->db->order_by('date','desc');
		$this->db->order_by('article_id','desc');
		$this->db->where('article_status',$status);
		$this->db->join('user', 'id_admin = article_user_id');
		return $this->db->get('article')->result();
	}
	
	function set_to($status,$article_id){
		$data['article_status'] = $status;
		$this->db->where('article_id',$article_id);
		$this->db->update('article',$data);
	}
	/* Artikel Model End */
	
	/* Page */
	/* page modul */
	function save_page($page_type=''){
		$data['page_author'] = $this->session->userdata('user_id');
		$data['page_title'] = $this->input->post('title');
		$data['page_slug'] = strip_tags(strtolower(url_title($this->input->post('title'))));
		$data['page_content'] = $this->input->post('page_content');
		$data['page_order'] = $this->input->post('page_order');
		$data['meta_title'] = $this->input->post('meta_title');
		$data['meta_keyword'] = $this->input->post('meta_keyword');
		$data['meta_description'] = $this->input->post('meta_description');
		$data['page_width'] = $this->input->post('page_width');
		$data['page_float'] = $this->input->post('page_float');
		$data['page_class'] = $this->input->post('page_class');
		$data['page_template'] = $this->input->post('page_template');
		$data['page_summary'] = $this->input->post('page_summary');
		$data['page_award'] = $this->input->post('page_award');
		if(!empty($page_type))  $data['page_type'] = $page_type;
		$this->db->insert('page',$data);
	}
	function update_page($page_id){
		$data['page_author'] = $this->session->userdata('user_id');
		$data['page_title'] = $this->input->post('title');
		$data['page_slug'] = strip_tags(strtolower(url_title($this->input->post('title'))));
		$data['page_content'] = $this->input->post('page_content');
		$data['page_order'] = $this->input->post('page_order');
		$data['meta_title'] = $this->input->post('meta_title');
		$data['meta_keyword'] = $this->input->post('meta_keyword');
		$data['meta_description'] = $this->input->post('meta_description');
		$data['page_width'] = $this->input->post('page_width');
		$data['page_float'] = $this->input->post('page_float');
		$data['page_class'] = $this->input->post('page_class');
		$data['page_summary'] = $this->input->post('page_summary');
		$data['page_award'] = $this->input->post('page_award');
		$data['page_template'] = $this->input->post('page_template');
		
		$this->db->where('page_id',$page_id);
		$this->db->update('page',$data);
	}
	
	function single_page($page_id){
		return $this->db->get_where('page',array('page_id' => $page_id))->row();
	}
	/* Page End */
	
	/* category */
	function category(){
		$this->db->where('category_status','publish');
		return $this->db->get('category')->result();
	}
	
	function single_category($category_id){
		$this->db->where('category_id',$category_id);
		return $this->db->get('category')->row();
	}
	
	function save_category($data){
		if($this->input->post('category_slug') != ''){
			$data['category_slug']=strip_tags(strtolower(url_title($this->input->post('category_slug'))));
		}else{
			$data['category_slug']=strip_tags(strtolower(url_title($this->input->post('category'))));
		}
		$this->db->insert('category',$data);
	}
	
	function update_category($data,$category_id){
		if($this->input->post('category_slug') != ''){
			$data['category_slug']=strip_tags(strtolower(url_title($this->input->post('category_slug'))));
		}else{
			$data['category_slug']=strip_tags(strtolower(url_title($this->input->post('category'))));
		}
		$this->db->where('category_id',$category_id);
		$this->db->update('category',$data);
	}
	
	function category_set($status,$category_id){
		$data['category_status'] = $status;
		$this->db->where('category_id',$category_id);
		$this->db->update('category',$data);
	}
	
	function category_status($status){
		$this->db->where('category_status',$status);
		return $this->db->get('category')->result();
	}
	
	/* Category End */
	
	/* User */
	function all_user($limit='',$offset=0){
		$this->db->where('user_level !=','top_admin');
		if(!empty($limit)) $this->db->limit($limit,$offset);
		return $this->db->get('user')->result();
	}
	function all_admin(){
		$this->db->where('user_level','top_admin');
		return $this->db->get('user')->result();
	}
	
	function single_user($user_id){
		return $this->db->get_where('user',array('id_admin'=>$user_id))->row();
	}
	
	function user_set($status,$user_id){
		$data['user_stats'] = $status;
		$this->db->where('id_admin',$user_id);
		$this->db->update('user',$data);
	}
	
	function update_data_user($user_id,$img_data=''){
		$data['username'] = $this->input->post('username');
		$data['email'] = $this->input->post('email');
		$data['full_name'] = $this->input->post('full_name');
		$data['user_level'] = $this->input->post('user_level');
		$data['num_post_perday'] = $this->input->post('num_post_perday');
		$data['genre'] = $this->input->post('genre');
		$data['site'] = $this->input->post('site');
		$data['about_me'] = $this->input->post('about_me');
		if($this->input->post('password') != '') $data['password'] =  sha1(do_hash($this->input->post('password'), 'md5'));
		
		if(!empty($img_data)){
			$data['avatar'] = $img_data['file_name'];
		}
	
		$this->db->where('id_admin',$user_id);
		$this->db->update('user',$data);
	}
	
	function save_data_user($img_data=''){
		$data['username'] = $this->input->post('username');
		$data['email'] = $this->input->post('email');
		$data['full_name'] = $this->input->post('full_name');
		$data['user_level'] = $this->input->post('user_level');
		$data['num_post_perday'] = $this->input->post('num_post_perday');
		$data['genre'] = $this->input->post('genre');
		$data['site'] = $this->input->post('site');
		$data['about_me'] = $this->input->post('about_me');
		if($this->input->post('password') != '') $data['password'] =  sha1(do_hash($this->input->post('password'), 'md5'));
		
		if(!empty($img_data)){
			$data['avatar'] = $img_data['file_name'];
		}
	
		$this->db->insert('user',$data);
	}
	/* User End */
	
}
?>