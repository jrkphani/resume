<?php
class Profile_model extends CI_Model{
	public function get_userid()
	{
		$arr=$this->session->userdata('logged_in');
		return $arr['id'];
	}
	public function get_profile()
	{
		$this->db->select('user_detail.user_id,user_detail.first_name,user_detail.last_name,user_detail.secondary_email,user_detail.mobile,user_detail.landline,user_detail.address,user_detail.website,user_detail.photo,users.email');
		$this->db->where('user_detail.user_id',$this->get_userid());
		$this->db->from('user_detail');
		$this->db->join('users','users.id = user_detail.user_id');
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function update_profile()
	{
		$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'mobile' => $this->input->post('mobile'),
					'landline' => $this->input->post('landline'),
					'website' => $this->input->post('website'),
					'address' => $this->input->post('address'),
					);
		if($this->input->post('email_toggle')=='1')
			$data['secondary_email'] = $this->input->post('primary_email');
		else
			$data['secondary_email'] = $this->input->post('secondary_email');

		if($_POST['photo_name'])
		{
			$user_id=$this->get_userid();
			$name =$this->input->post('photo_name').$this->input->post('photo_ext');
			$new_name=$user_id.$this->input->post('photo_ext');
			if(!file_exists(FCPATH.$this->config->item('path_profile_img').$user_id))
				 mkdir(FCPATH.$this->config->item('path_profile_img').$user_id);
			rename(FCPATH.$this->config->item('path_temp_img').$name,FCPATH.$this->config->item('path_profile_img').$user_id.'/'.$new_name);
			$data['photo']=$new_name;
		}

		if($data['first_name']!=NULL && $data['last_name']!=NULL && $data['secondary_email']!=NULL && $data['mobile']!=NULL)
		{
			$arr=$this->session->userdata('logged_in');
			if($arr['flag']=='1')
			{
				$data['flag']='0';
				$sess_array = array(
						         'id' => $arr['id'],
						         'email' => $arr['email'],
								 'firstname' => $arr['firstname'],
								 'lastname' => $arr['lastname'],
								 'role' => $arr['role'],
						         'limit' => $arr['limit'],
						         'flag' => '0',
						       );
				$this->session->set_userdata('logged_in', $sess_array);
			}
		}

		$this->db->where('user_id',$this->get_userid());
		$this->db->update('user_detail', $data); 
	}
}
?>