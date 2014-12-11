<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Model{

	function register(){
		$this->db->trans_start();
		$num_post = 5;
		if($this->input->post('coupon') != ''){
			$this->db->where('coupon',$this->input->post('coupon'));
			$this->db->where('coupon_limit !=',0);
			$coupon = $this->db->get('coupon')->row();
			
			if($coupon){
				$this->db->set('coupon_limit', 'coupon_limit-1', FALSE);
				$this->db->where('coupon',$this->input->post('coupon'));
				$this->db->update('coupon');
				
				$num_post = $coupon->coupon_count;
			}else{
				$this->db->set('num_post_perday', 'num_post_perday+1', FALSE);
				$this->db->where('id_admin',$this->input->post('coupon'));
				$this->db->update('user');
			}
		}
	
		$data = array(
				'username' => $this->input->post('username'),
				'password' =>  sha1(do_hash($this->input->post('password'), 'md5')),
				'email' => $this->input->post('email'),
				'user_level' => 'user',
				'full_name' => $this->input->post('full-name'),
				'num_post_perday' => $num_post,
				);
		$this->db->insert('user',$data);
		$user_id = $this->db->insert_id();
		
		foreach($this->input->post('interest') as $interest){
			$data2['interest_user_id'] = $user_id;
			$data2['interest_tag_id'] = $interest;
			
			$this->db->insert('interest',$data2);
		}
		
		$this->db->trans_complete();
	}
	
	function data($user_id){
		$q = $this->db->get_where('user',array('id_admin'=>$user_id))->row();
		
		return $q;
	}
}
?>