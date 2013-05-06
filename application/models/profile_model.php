<?php
class Profile_model extends CI_Model{
	public function get_userid()
	{
		$arr=$this->session->userdata('logged_in');
		return $arr['id'];
	}
	public function get_profile()
	{
		$this->db->select('first_name,last_name,secondary_email,mobile,landline,address,website,photo');
		$this->db->where('user_id',$this->get_userid());
		$this->db->from('user_detail');
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function update_profile()
	{
		$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'secondary_email' => $this->input->post('secondary_email'),
					'mobile' => $this->input->post('mobile'),
					'landline' => $this->input->post('landline'),
					'website' => $this->input->post('website'),
					'address' => $this->input->post('address'),
					);	
		if($_FILES['photo']['name'])
		{
			$upload=$this->upload->data();
			$new_name =$this->get_userid().$upload['file_ext'];
			$data['photo']=$new_name;
		}
		$this->db->where('user_id',$this->get_userid());
		$this->db->update('user_detail', $data); 
	}
}
?>