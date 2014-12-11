<?php 
class Msite extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function single($slug){
		$this->db->set('article_view', 'article_view+1', FALSE);
		$this->db->where('article_title_slug',$slug);
		$this->db->update('article'); 
	
		$this->db->join('user', 'id_admin = article_user_id');
		return $this->db->get_where('article',array('article_title_slug'=>$slug));
	}
	
	function page_single($page_slug){
		$this->db->join('user', 'id_admin = page_author');
		return $this->db->get_where('page',array('page_slug'=>$page_slug));
	}
	
	function all_page($limit='',$offset='',$page_type=''){
		if(!empty($limit)) $this->db->limit($limit,$offset);
		$this->db->order_by('page_order','asc');
		
		if(!empty($page_type)){
			$this->db->where('page_type',$page_type);
		}else{
			$this->db->where('page_type','page');
		}
		$this->db->where('page_status','publish');
		$this->db->join('user', 'id_admin = page_author');
		return $this->db->get('page');
	}
	
	function semua_page(){
		$this->db->order_by('page_type','desc');
		$this->db->order_by('page_order','asc');
		$this->db->where('page_status','publish');
		$this->db->join('user', 'id_admin = page_author');
		return $this->db->get('page');
	}
	
	function option(){
		$q = $this->db->get('option')->result();
		$i=0;
		foreach($q as $r){
			$data[$r->key] = $r->val;
			$i++;
		}
		
		return $data;
	}
	
	function get_bg($slug){
		return $this->db->get_where('background',array('background_relasi'=>$slug))->result();
	}
	
	function menu(){
		$this->db->order_by('menu_order','ASC');
		$q = $this->db->get_where('menu',array('menu_parent'=>0))->result();
		#print_r($q);exit;
		$i = 0;
		foreach($q as $r){
			$data[$i]['menu_id'] = $r->menu_id;
			$data[$i]['menu_name'] = $r->menu_name;
			$data[$i]['menu_link'] = $r->menu_link;
			$data[$i]['menu_parent'] = $r->menu_parent;
			$data[$i]['menu_order'] = $r->menu_order;
			$data[$i]['child'] = $this->menu_child($r->menu_id);
			$i++;
		}	
		#print_r($data);exit;
		return $data;
	}
	
	function menu_child($parent){
		$q = $this->db->get_where('menu',array('menu_parent'=>$parent))->result();
		#print_r($q);exit;
		$data = false;
		$i = 0;
		foreach($q as $r){
			$data[$i]['menu_id'] = $r->menu_id;
			$data[$i]['menu_name'] = $r->menu_name;
			$data[$i]['menu_link'] = $r->menu_link;
			$data[$i]['menu_parent'] = $r->menu_parent;
			#$data[$i]['child'] = $this->menu_child_sub($r->menu_id);
			$i++;
		}	
		#print_r($data);exit;
		return $data;
	}
	
	function get_category($category_id){
		$q = $this->db->get_where('category',array('category_id'=>$category_id))->row();
		if($q){
			return '<a href="'.base_url('category/'.$q->category_slug).'">'.$q->category.'</a>';
		}else{
			return 'No Category';
		}
	}
	
	function post_bycategory($category_id,$limit=0,$offset=''){
		if( !empty($limit) ) $this->db->limit($limit,$offset);
		$this->db->order_by('date','desc');
		$this->db->order_by('article_id','desc');
		$this->db->where('article_status','publish');
		$this->db->where('article_category',$category_id);
		$this->db->join('user', 'id_admin = article_user_id');
		return $this->db->get('article');
	}
}
?>