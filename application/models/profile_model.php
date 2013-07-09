<?php
class Profile_model extends CI_Model{
	public function get_profile($id)
	{
		$this->db->select('user_id,first_name,last_name,designation,secondary_email,mobile,skype,address,married,photo');
		$this->db->from('user_detail');
		$this->db->where('user_id',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	public function update_profile($id,$data)
	{
		$this->db->where('user_id',$id);
		$this->db->update('user_detail', $data); 
	}
}
?>