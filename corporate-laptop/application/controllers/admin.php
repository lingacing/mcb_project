<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('tinyauth');
		$this->load->helper('text');
		$this->tinyauth->restrict();
		$this->load->model('user');
		
   }
	public function index()
	{
		$data['setting'] = $this->setting();
		$data['title'] = 'Dashboard';	
		$data['active'] = 'home';	
		$data['is_admin'] = TRUE;
		$data['sub_title'] = 'Dashboard';	
		$data['template'] = 'dashboard';	
		$this->load->view('admin/template',$data);
	}
	
	public function contact()
	{
		$data['setting'] = $this->setting();
		
		$limit = 15;
		$offset = $this->uri->segment(4);
		$num_row = $this->db->get('contact')->num_rows();
		#print_r($num_row);exit;
		
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/contact/page/');
		$config['total_rows'] = $num_row;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['next_link'] = '&rsaquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lsaquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		#$config['use_page_numbers'] = TRUE;

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		
		$data['title'] = 'Contact';	
		$data['active'] = 'home';	
		$data['sub_title'] = 'Contact';	
		$data['is_contact'] = true;
		
		$this->db->limit($limit,$offset);
		$this->db->order_by('contact_date','DESC');
		$data['contact'] = $this->db->get('contact')->result();	
		
		$data['template'] = 'contact';	
		$this->load->view('admin/template',$data);
	}
	
	function home(){
		$this->load->view('home');
	}
	
	function save_option(){
		$active = $_POST['active'];
		$redirect = $_POST['redirect'];
		unset($_POST['redirect']);
		unset($_POST['active']);
		
		foreach($this->input->post() as $key => $val){
			$this->madmin->save_option($key,$val);
		}
		
		$this->session->set_flashdata('yes','Setting has been saved!');
		$this->session->set_flashdata('active',$active);
		redirect($redirect,'refresh');
	}
	function setting(){
		$data = $this->msite->option();
		
		return $data;
	}
	
	function article(){
		$limit = 15;
		$offset = $this->uri->segment(4);
		$num_row = $this->madmin->lastest_post()->num_rows();
		#print_r($num_row);exit;
		
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/article/page/');
		$config['total_rows'] = $num_row;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['next_link'] = '&rsaquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lsaquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		#$config['use_page_numbers'] = TRUE;

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		
		$data['title'] ='Article';
		$data['sub_title'] ='Article List';
		$data['is_article'] = TRUE;
		$data['post'] = $this->madmin->lastest_post($limit,$offset)->result();
		$data['template'] = 'article';	
		$this->load->view('admin/template',$data);
	}
	
	function create_article(){
		if($this->input->post()){
			$this->load->library('form_validation');

			if ($this->article_validation() == FALSE){
				$data['error'] = 'Oops Something Wrongz !!';
			}else{
				if(!empty($_FILES['userfile']['name'])){
					$config['upload_path'] = FCPATH.'images';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']	= '1000';

					$config['file_name']  = strip_tags(strtolower(url_title($this->input->post('title')))).'.png';

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload())
					{
						$data['error'] = 'Oops Something Wrong !!';
						$data['upload_error'] = $this->upload->display_errors();
					}
					else
					{
						$upload_data = $this->upload->data();
						$this->madmin->save_article($upload_data);
						$this->session->set_flashdata('yes','Article has been saved');
						redirect('admin/article','refresh');
					}
				}else{
					$this->madmin->save_article('');
					$this->session->set_flashdata('yes','Article has been saved');
					redirect('admin/article','refresh');
				}
				#redirect('admin/article','refresh');
			}
		}
	
		$data['title'] ='Article';
		$data['is_article'] = TRUE;
		$data['sub_title'] ='Create New Article';
		$data['category'] = $this->madmin->category();
		$data['template'] = 'create_article';	
		$this->load->view('admin/template',$data);
	}
	
	function edit_article($article_id=''){
		$post = $this->madmin->single_article($article_id);
		if(empty($article_id) or !$post){
			$this->session->set_flashdata('no','OOps Something Wrong');
			redirect('admin/article','refresh');
		}
		
		if($this->input->post()){
			$this->load->library('form_validation');
			if ($this->article_validation($article_id) == FALSE){
				$data['error'] = 'Oops Something Wrong !!';
			}else{
				if($_FILES['userfile']['name'] != ''){
					$config['upload_path'] = FCPATH.'images';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']	= '1000';

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload())
					{
						$data['error'] = 'Oops Something Wrong !!';
						$data['upload_error'] = $this->upload->display_errors();
					}
					else
					{
						$url = FCPATH.'images/'.$post->article_image;
						if (file_exists($url) && ! empty($post->article_image)) {
							unlink($url);
						}
						
						$upload_data = $this->upload->data();
						$this->madmin->update_article($article_id,$upload_data);
						$this->session->set_flashdata('yes','Article has been Update');
						redirect('admin/article','refresh');
					}
				}else{
					$this->madmin->update_article($article_id,$upload_data='');
					$this->session->set_flashdata('yes','Article has been Update');
					redirect('admin/article','refresh');
				}
			}
		}
		
		$data['post'] =$post;
		$data['title'] ='Edit Article';
		$data['is_article'] = TRUE;
		$data['sub_title'] ='Edit Article';
		$data['category'] = $this->madmin->category();
		$data['template'] = 'create_article';	
		$this->load->view('admin/template',$data);
	}
	
	private function article_validation($article_id=''){
		$this->form_validation->set_rules('category', 'category', 'required|xss_clean');
		if(empty($article_id)){
			#$this->form_validation->set_rules('url', 'url', 'required|xss_clean|prep_url|is_unique[article.article_link]');
			$this->form_validation->set_rules('title', 'title', 'required|xss_clean|is_unique[article.article_title]');
		}else{
			$this->form_validation->set_rules('title', 'title', 'required|xss_clean');
		}
		
		$this->form_validation->set_rules('article', 'article', 'required');
		
		return $this->form_validation->run();
	}
	
	function article_set($status='',$article_id=''){
		$post = $this->madmin->single_article($article_id);
		if(empty($article_id) or empty($status) or !$post){
			$this->session->set_flashdata('no','OOps Something Wrong');
			if(isset($_GET['redirect'])){
				redirect($_GET['redirect'],'refresh');
			}else{
				redirect('admin/article','refresh');
			}
		}
		$this->madmin->set_to($status,$article_id);
		$this->session->set_flashdata('yes','Article set to '.$status);
		
		if(isset($_GET['redirect'])){
			redirect($_GET['redirect'],'refresh');
		}else{
			redirect('admin/article_status/'.$status,'refresh');
		}
	}
	
	function article_status($status=''){
		if(empty($status)){
			$this->session->set_flashdata('no','OOps Something Wrong');
			redirect('admin/article','refresh');
		}
		
		$limit = 15;
		$offset = $this->uri->segment(4);
		$num_row = $this->db->where('article_status',$status)->count_all_results('article');
		#print_r($num_row);exit;
		
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/article/page/');
		$config['total_rows'] = $num_row;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['next_link'] = '&rsaquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lsaquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		#$config['use_page_numbers'] = TRUE;

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		
		$data['title'] ='Article';
		$data['sub_title'] ='Article List '.$status;
		$data['is_article'] = TRUE;
		$data['post'] = $this->madmin->get_post_stats($status,$limit,$offset);
		$data['template'] = 'article';	
		$this->load->view('admin/template',$data);
	}
	
	/* Page Manajament */
	function page($page_type=''){
		$limit = 15;
		$uri_segment = 3;
		$pg_type = '';
		if(!empty($page_type)) {
			$uri_segment = 4;
			$pg_type = $page_type.'/';
		}
		$offset = $this->uri->segment($uri_segment);
		$num_row = $this->msite->all_page('','',$page_type)->num_rows();
		#print_r($num_row);exit;
		
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/page/'.$pg_type);
		$config['total_rows'] = $num_row;
		$config['per_page'] = $limit;
		$config['uri_segment'] = $uri_segment;
		$config['next_link'] = '&rsaquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lsaquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		#$config['use_page_numbers'] = TRUE;

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		
		$data['title'] ='Page';
		$data['sub_title'] ='Page List';
		if(!empty($page_type)) {
			$data[$page_type] = TRUE;
			$data['page_type'] = $page_type;
		}else{
			$data['is_page'] = TRUE;
			$data['page_type'] = '';
		}
		$data['post'] = $this->msite->all_page($limit,$offset,$page_type)->result();
		$data['template'] = 'page/page';	
		$this->load->view('admin/template',$data);
	}
	
	function create_page($page_type=''){
		if($this->input->post()){
			$this->load->library('form_validation');
			if ($this->page_validation() == FALSE){
				$data['error'] = 'Oops Something Wrong !!';
			}else{
				$this->madmin->save_page($page_type);
				$this->session->set_flashdata('yes','Page has been saved');
				redirect('admin/page/'.$page_type,'refresh');
			}
		}
		if(!empty($page_type)) {
			$data[$page_type] = TRUE;
			$data['page_type'] = $page_type;
		}else{
			$data['is_page'] = TRUE;
			$data['page_type'] = '';
		}
		$data['title'] ='Page';
		$data['sub_title'] ='Create New Page';
		$data['template'] = 'page/create_page';	
		$this->load->view('admin/template',$data);
	}
	
	function edit_page($page_id='',$page_type=''){	
		$page = $this->madmin->single_page($page_id);

		if(empty($page_id) or !$page){
			$this->session->set_flashdata('no','OOps Something Wrong');
			redirect('admin/page','refresh');
		}
		
		if($this->input->post()){
			$this->load->library('form_validation');
			if ($this->page_validation($page_id) == FALSE){
				$data['error'] = 'Oops Something Wrong !!';
			}else{
				$this->madmin->update_page($page_id);
				$this->session->set_flashdata('yes','Page has been saved');
				redirect('admin/page/'.$page_type,'refresh');
			}
		}
		if(!empty($page_type)) {
			$data[$page_type] = TRUE;
			$data['page_type'] = $page_type;
		}else{
			$data['is_page'] = TRUE;
			$data['page_type'] = '';
		}
		$data['title'] ='Page';
		$data['page'] = $page;
		$data['sub_title'] ='Edit Page';
		$data['template'] = 'page/create_page';	
		$this->load->view('admin/template',$data);
	}
	
	private function page_validation($page_id=''){
		if(empty($page_id)){
			$this->form_validation->set_rules('title', 'title', 'required|xss_clean|is_unique[article.article_title]');
		}
		/* $this->form_validation->set_rules('page_content', 'page', 'required');
		$this->form_validation->set_rules('page_order', 'Order', 'required|xss_clean');
		$this->form_validation->set_rules('meta_title', 'meta title', 'required|xss_clean');
		$this->form_validation->set_rules('meta_keyword', 'meta keyword', 'required|xss_clean');
		$this->form_validation->set_rules('meta_description', 'meta description', 'required|xss_clean'); */
		$this->form_validation->set_rules('page_width', 'width', '');
		$this->form_validation->set_rules('page_float', 'float', '');
		
		return $this->form_validation->run();
		
	}
	
	function page_delete($id,$page_type=''){
		$this->db->delete('page',array('page_id'=>$id));
		$this->session->set_flashdata('yes','Page has been Deleted');
		redirect('admin/page/'.$page_type,'refresh');
	}
	
	/* page manajemen end */
	
	/* Slideshow */
	function slideshow(){
		$data['title'] ='Slideshow';
		$data['sub_title'] ='Slideshow List';
		$data['is_slideshow'] = TRUE;
		
		$data['slideshow'] = $this->db->get('slideshow')->result();
		
		$data['template'] = 'slideshow/slideshow_list';	
		$this->load->view('admin/template',$data);
	}
	
	function add_slideshow(){
		if($this->input->post()){
			$config['upload_path'] = './uploads/images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload()) {
				$data['error'] = $this->upload->display_errors();
			} else {
				$image_date = $this->upload->data();
				
				$slideshow_data = $this->input->post();
				$slideshow_data['slideshow_image'] =  $image_date['file_name'];
				
				$this->db->insert('slideshow',$slideshow_data);
				
				$this->session->set_flashdata('yes','Slideshow has been saved');
				redirect('admin/slideshow','refresh');
			}
		}
	
		$data['title'] ='Add Slideshow';
		$data['sub_title'] ='Add Slideshow';
		$data['is_slideshow'] = TRUE;
		
		$data['template'] = 'slideshow/slideshow_form';	
		$this->load->view('admin/template',$data);
	}
	
	function edit_slideshow($ss_id){
		$slideshow = $this->db->get_where('slideshow',array('slideshow_id'=>$ss_id))->row();
		if($this->input->post()){
			if($_FILES['userfile']['name'] != ''){
				$config['upload_path'] = './uploads/images/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']	= '1000';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload()) {
					$data['error'] = $this->upload->display_errors();
				} else {
					$url = FCPATH.'uploads/images/'.$slideshow->slideshow_image;
					if (file_exists($url)) {
						unlink($url);
					}
				
					$image_date = $this->upload->data();
					$slideshow_data = $this->input->post();
					$slideshow_data['slideshow_image'] =  $image_date['file_name'];
					
					$this->db->where('slideshow_id',$ss_id);
					$this->db->update('slideshow',$slideshow_data);
					
					$this->session->set_flashdata('yes','Slideshow has been update');
					redirect('admin/slideshow','refresh');
				}
			}else{
				$slideshow_data = $this->input->post();
				$this->db->where('slideshow_id',$ss_id);
				$this->db->update('slideshow',$slideshow_data);
				
				$this->session->set_flashdata('yes','Slideshow has been update');
				redirect('admin/slideshow','refresh');
			}
		}
		$data['title'] ='Edit Slideshow';
		$data['sub_title'] ='Edit Slideshow';
		$data['is_slideshow'] = TRUE;
		
		$data['slideshow'] = $slideshow;
		
		$data['template'] = 'slideshow/slideshow_form';	
		$this->load->view('admin/template',$data);
	}
	
	function delete_slideshow($ss_id){
		$slideshow = $this->db->get_where('slideshow',array('slideshow_id'=>$ss_id))->row();
		
		$url = FCPATH.'uploads/images/'.$slideshow->slideshow_image;
		if (file_exists($url)) {
			unlink($url);
		}
		
		$this->db->delete('slideshow',array('slideshow_id'=>$ss_id));
		
		$this->session->set_flashdata('yes','Slideshow has been delete');
		redirect('admin/slideshow','refresh');
	}
	function delete_background($id){
		$bg = $this->single_bg($id);
		
		$url = FCPATH.'assets/background/'.$bg->background_name;
		if (file_exists($url)) {
			unlink($url);
		}
		$this->db->delete('background',array('background_id'=>$id));
		
		$this->session->set_flashdata('yes','Background hasbeen deleted');
		if(isset($_GET['r'])){
			redirect($_GET['r'],'refresh');
		}else{
			redirect('admin/background','refresh');
		}
	}
	/* Background End*/
	
	/* categori */
	function category(){
		if($this->input->post()){
			if ($this->category_validation() == FALSE)
			{
				$data['error'] = 'OOps something wrong!';
			}
			else
			{
				$this->madmin->save_category($this->input->post());
				$data['succes'] = 'OOps Data has been added!';
			}
		}
		$data['title'] ='Category';
		$data['sub_title'] ='Category Modul';
		$data['is_category'] = TRUE;
		$data['allcategory'] = $this->madmin->category();
		$data['template'] = 'category/category_page';	
		$this->load->view('admin/template',$data);
	}
	
	function category_edit($category_id=''){
		$category = $this->madmin->single_category($category_id);
		if(empty($category_id) or !$category){
			$this->session->set_flashdata('no','OOps Something Wrong');
			redirect('admin/category','refresh');
		}
		
		if($this->input->post()){
			if ($this->category_validation($category_id) == FALSE)
			{
				$data['error'] = 'OOps something wrong!';
			}
			else
			{
				$this->madmin->update_category($this->input->post(),$category_id);
				$data['succes'] = 'Yoz Data has been Update!';
				redirect('admin/category','refresh');
			}
		}
		
		$data['title'] ='Edit Category';
		$data['sub_title'] ='Edit Category';
		$data['is_category'] = TRUE;
		$data['allcategory'] = $category;
		$data['template'] = 'category/category_edit';	
		$this->load->view('admin/template',$data);
	}
	
	function category_validation($category_id=''){
		$this->load->library('form_validation');
		if(empty($category_id)){
			$this->form_validation->set_rules('category', 'category', 'required|xss_clean|is_unique[category.category]');
			$this->form_validation->set_rules('category_slug', 'category slug', 'xss_clean|is_unique[category.category_slug]');
		}
		$this->form_validation->set_rules('category_description', 'category description', 'xss_clean');
		$this->form_validation->set_rules('category_meta_title', 'meta title', 'xss_clean');
		$this->form_validation->set_rules('category_meta_keyword', 'meta keyword', 'xss_clean');
		return $this->form_validation->run();
	}
	
	function category_status($status=''){
		if(empty($status)){
			$this->session->set_flashdata('no','OOps Something Wrong');
			redirect('admin/category','refresh');
		}
		$data['title'] ='Category status';
		$data['sub_title'] ='Category status '.$status;
		$data['is_category'] = TRUE;
		$data['allcategory'] = $this->madmin->category_status($status);
		$data['template'] = 'category/category_list';	
		$this->load->view('admin/template',$data);
	}
	
	function category_set($status='',$category_id=''){
		$category = $this->madmin->single_category($category_id);
		if(empty($category_id) or empty($status) or !$category){
			$this->session->set_flashdata('no','OOps Something Wrong');
			redirect('admin/category','refresh');
		}
		$this->madmin->category_set($status,$category_id);
		$this->session->set_flashdata('yes','Article set to '.$status);
		redirect('admin/category_status/'.$status,'refresh');
	}
	
	function category_delete($id){
		
		$this->session->set_flashdata('yes','Category has been delete');
	}
	/* categori End*/
	
	/* User */
	function user(){
		$limit = 20;
		$offset = $this->uri->segment(4);
		
		$num_row = $this->db->where('user_level !=','top_admin')->get('user')->num_rows();
		#print_r($num_row);exit;
		
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/user/page/');
		$config['total_rows'] = $num_row;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['next_link'] = '&rsaquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lsaquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		#$config['use_page_numbers'] = TRUE;

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['user'] = $this->madmin->all_user($limit,$offset);
		$data['admin'] = $this->madmin->all_admin();
		$data['title'] ='User';
		$data['is_user'] = TRUE;
		$data['sub_title'] ='User List';
		$data['template'] = 'user/user';	
		$this->load->view('admin/template',$data);
	}
	
	function add_user(){
		if($this->input->post()){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'username', 'trim|xss_clean|required|min_length[5]|max_length[16]|is_unique[user.username]');
			$this->form_validation->set_rules('email', 'email', 'trim|xss_clean|valid_email|required|min_length[5]|max_length[50]|is_unique[user.email]');
			$this->form_validation->set_rules('full_name', 'full name', 'trim|xss_clean|required|min_length[5]|max_length[30]');
			$this->form_validation->set_rules('about_me', 'about', 'trim|xss_clean|max_length[500]');
			$this->form_validation->set_rules('site', 'site', 'trim|xss_clean|max_length[100]');
			$this->form_validation->set_rules('user_level', 'user level', 'required');
			$this->form_validation->set_rules('genre', 'genre', 'required');
			$this->form_validation->set_rules('password', 'Password', 'matches[conf_password]|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('conf_password', 'Password Confirmation', 'min_length[5]|max_length[12]');
			$this->form_validation->set_rules('num_post_perday', 'Number Post', 'int|greater_than[4]');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = 'OOps Something wrong!';
			}
			else
			{
				if($_FILES['userfile']['name'] != ''){
					$config['upload_path'] = FCPATH.'images/avatar/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']	= '500';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload()){
						$data['errors'] = 'Oops Something Wrong !!';
						$data['upload_error'] = $this->upload->display_errors();
					}
					else{
						if(file_exists(FCPATH.'images/avatar/'.$user->avatar)) unlink(FCPATH.'images/avatar/'.$user->avatar);
						$upload_data = $this->upload->data();

						$this->madmin->save_data_user($upload_data);
						$this->session->set_flashdata('yes','User has been saved');
						redirect('admin/user','refresh');
					}
				}else{
					$this->madmin->save_data_user();
					$this->session->set_flashdata('yes','User has been saved');
					redirect('admin/user','refresh');
				}
			}
		}
		
		$data['title'] ='User';
		$data['is_user'] = TRUE;
		$data['sub_title'] ='User List';
		$data['template'] = 'user/add_user';	
		$this->load->view('admin/template',$data);
	}
	
	function user_edit($user_id=''){
		$user = $this->madmin->single_user($user_id);
		if(!$user or empty($user_id)){
			$this->session->set_flashdata('no','Error Brader');
			redirect('admin/user','refresh');
		}
		
		if($this->input->post()){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('full_name', 'full name', 'trim|xss_clean|required|min_length[5]|max_length[30]');
			$this->form_validation->set_rules('about_me', 'about', 'trim|xss_clean|max_length[500]');
			$this->form_validation->set_rules('site', 'site', 'trim|xss_clean|max_length[100]');
			$this->form_validation->set_rules('user_level', 'user level', 'required');
			$this->form_validation->set_rules('genre', 'genre', 'required');
			$this->form_validation->set_rules('password', 'Password', 'matches[conf_password]|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('conf_password', 'Password Confirmation', 'min_length[5]|max_length[12]');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = 'OOps Something wrong!';
			}
			else
			{
				if($_FILES['userfile']['name'] != ''){
					$config['upload_path'] = FCPATH.'images/avatar/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']	= '500';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload()){
						$data['errors'] = 'Oops Something Wrong !!';
						$data['upload_error'] = $this->upload->display_errors();
					}
					else{
						if(file_exists(FCPATH.'images/avatar/'.$user->avatar)) unlink(FCPATH.'images/avatar/'.$user->avatar);
						$upload_data = $this->upload->data();

						$this->madmin->update_data_user($user_id,$upload_data);
						$this->session->set_flashdata('yes','Profil has been saved');
						redirect('admin/user','refresh');
					}
				}else{
					$this->madmin->update_data_user($user_id);
					$this->session->set_flashdata('yes','Profil has been saved');
					redirect('admin/user','refresh');
				}
			}
		}
		
		$data['user'] =$user;
		$data['title'] ='User';
		$data['is_user'] = TRUE;
		$data['sub_title'] ='User List';
		$data['template'] = 'user/edit_user';	
		$this->load->view('admin/template',$data);
	}
	
	function user_status($status='',$user_id=''){
		$user = $this->madmin->single_user($user_id);
		if(empty($user) or empty($status) or !$user){
			$this->session->set_flashdata('no','OOps Something Wrong');
			redirect('admin/user','refresh');
		}
		if($user->user_level != 'top_admin'){
			$this->madmin->user_set($status,$user_id);
			$this->session->set_flashdata('yes','User set to '.$status);
		}else{
			$this->session->set_flashdata('no','Admin Can not change status!');
		}
		
		if(isset($_GET['redirect'])){
			redirect($_GET['redirect'],'refresh');
		}else{
			redirect('admin/user','refresh');
		}
	}
	
	function user_delete($user_id=''){
		$user = $this->madmin->single_user($user_id);
		if(empty($user) or !$user){
			$this->session->set_flashdata('no','OOps Something Wrong');
			redirect('admin/user','refresh');
		}
		if($user->user_level != 'top_admin'){
			$this->db->delete('user', array('id_admin' => $user_id)); 
			$this->session->set_flashdata('yes','User delete succes');
		}else{
			$this->session->set_flashdata('no','Admin Can not delete!');
		}
		if(isset($_GET['redirect'])){
			redirect($_GET['redirect'],'refresh');
		}else{
			redirect('admin/user','refresh');
		}
	}
	/* User end */
	
	/* Menu */
	function menu(){
		if($this->input->post()){
			$data2['menu_name'] = $this->input->post('menu_name');
			$data2['menu_link'] = $this->input->post('menu_link');
			$data2['menu_parent'] = $this->input->post('parent');
			
			$this->db->insert('menu',$data2);
		}
		$data['is_menu'] = TRUE;
		$data['title'] ='Menu';
		$data['sub_title'] ='Menu Management';
		$data['page'] =  $this->msite->all_page('','','page')->result();
		$data['our_people_page'] =  $this->msite->all_page('','','our_people')->result();
		$data['menu'] =  $this->db->get('menu')->result();
		$data['menu_list'] = $this->msite->menu();
		
		$data['template'] = 'menu/menu_list';	
		$this->load->view('admin/template',$data);
	}
	
	function menu_edit($id){
		if($this->input->post()){
			$data2['menu_name'] = $this->input->post('menu_name');
			$data2['menu_link'] = $this->input->post('menu_link');
			$data2['menu_parent'] = $this->input->post('parent');
			
			$this->db->where('menu_id',$id);
			$this->db->update('menu',$data2);
			
			$this->session->set_flashdata('yes','Menu has been saved!');
			redirect('admin/menu','refresh');
		}
		$data['is_menu'] = TRUE;
		$data['title'] ='Menu';
		$data['sub_title'] ='Menu Management';
		$data['menu'] = $this->db->get_where('menu',array('menu_id'=>$id))->row();
		$data['menus'] =  $this->db->get('menu')->result();
		
		$data['template'] = 'menu/menu_edit';	
		$this->load->view('admin/template',$data);
	}
	
	function menu_order(){
		$menu_id = $this->input->post('menu_id');
		$menu_order = $this->input->post('menu_order');
		
		$i=0;
		foreach($menu_id as $r){
			$data['menu_order'] = $menu_order[$i];
			$this->db->where('menu_id',$r);
			$this->db->update('menu',$data);
			$i++;
		}
	
		$this->session->set_flashdata('yes','Menu order has been saved!');
		redirect('admin/menu','refresh');
	}
	
	function menu_delete($id){
		$this->db->delete('menu',array('menu_id'=>$id));
		$this->session->set_flashdata('yes','Menu has been deleted!');
		redirect('admin/menu','refresh');
	}
	/* Menu End */
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */