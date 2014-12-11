<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('simple_html_dom');
		$this->load->helper('text');
   }
	public function index()
	{
		
		$data['setting'] = $this->setting();
		$data['title'] = $data['setting']['site_name'].' - '.$data['setting']['site_description'];
		$data['slideshow'] = $this->db->get('slideshow')->result();
		$data['post'] = $this->madmin->lastest_post(4,0)->result();
		
		$this->load->view('home',$data);
	}
	
	/* function home(){
		$data = $this->setting();
		$setting = $data;
		$data['setting'] = $data;
		$data['bg'] = $this->msite->get_bg('home');
		#print_r($data['bg']);exit;
		$data['title'] = $setting['site_title'];
		$data['post'] = $this->madmin->lastest_post(4,0)->result();
		
		$this->load->view('home',$data);
	} */
	
	function archive(){
		$data = $this->setting();
		$setting = $data;
		$data['setting'] = $setting;

		$limit = 4;
		$offset = $this->uri->segment(3);
		$num_row = $this->madmin->lastest_post()->num_rows();
		#print_r($num_row);exit;
		
		$this->load->library('pagination');
		$config['base_url'] = base_url('archive/page/');
		$config['total_rows'] = $num_row;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
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

		$data['title'] = $setting['site_name'].' | Archive';
		$data['page_title'] = '<i class="icon-folder-open"></i>  Archive &raquo; '.$setting['site_name'];
		
		$this->load->view('archive',$data);
	}
	
	function category($slug){
		$data = $this->setting();
		$setting = $data;
		$data['setting'] = $setting;

		$category = $this->db->get_where('category',array('category_slug'=>$slug))->row();
		
		$limit = 4;
		$offset = $this->uri->segment(4);
		$num_row = $this->msite->post_bycategory($category->category_id)->num_rows();
		#print_r($num_row);exit;
		
		$this->load->library('pagination');
		$config['base_url'] = base_url('category/'.$slug.'/page/');
		$config['total_rows'] = $num_row;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
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
		$data['post'] = $this->msite->post_bycategory($category->category_id,$limit,$offset)->result();

		$data['title'] = $setting['site_name'].' | Archive';
		$data['page_title'] = '<i class="icon-folder-open"></i>  Category &raquo; '.(!empty($category->category_meta_title)) ? $category->category_meta_title : $category->category;
		$data['page_description'] = $category->category_description;
		
		$this->load->view('archive',$data);
	}
	
	function read($slug){
		$data = $this->setting();
		$setting = $data;
		$data['setting'] = $data;
		$post = $this->msite->single($slug)->row();
		if(!$post){
			redirect('404');
		}
		if($post->article_meta_title != ''){
			$title = $post->article_meta_title;
		}else{
			$title = $post->article_title;
		}
		
		$data['title'] = $title.' - '.$setting['site_name'];
		$data['description'] =$post->article_meta_description;
		$data['keyword'] =$post->article_meta_keyword;
		$data['post'] = $post;
		$data['super_class'] = 'news';

		$this->load->view('read',$data);
	}
	
	function page($page_slug){
		$data = $this->setting();
		$setting = $data;
		$data['setting'] = $data;
		$page = $this->msite->page_single($page_slug)->row();
		
		if(!$page){
			redirect('404');
		}
		if($page->meta_title != ''){
			$title = $page->meta_title;
		}else{
			$title = $page->page_title;
		}

		$data['title'] =$title.' - '.$setting['site_name'];
		$data['description'] =$page->meta_description;
		$data['keyword'] =$page->meta_keyword;
		$data['page'] = $page;

		$this->load->view('page',$data);
	}
	
	function contact(){
		$data = $this->setting();
		$setting = $data;
		$data['setting'] = $data;
		if($this->input->post()){
			$this->db->insert('contact',$this->input->post());
			$this->session->set_flashdata('ok','Your message has been sent!');
			redirect('contact','refresh');
		}
		$data['title'] = 'Contact - '.$setting['site_name'];

		$this->load->view('contact',$data);
	}
	
	
	function page_404(){
		$data = $this->setting();
		$setting = $data;
		$this->output->set_status_header('404');
		$data['setting'] = $data;
		$data['title'] = '404 Not Found';
		$this->load->view('404',$data);
	}
	function setting(){
		$data = $this->msite->option();
		$data['menu_list'] = $this->msite->menu();
		$data['recent_post'] = $this->madmin->lastest_post(4,0)->result();
		
		return $data;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */