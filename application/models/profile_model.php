<?php
class Profile_model extends CI_Model{
	public function get_profile($id)
	{
		$this->db->select('user_id,first_name,last_name,designation,secondary_email,mobile,skype,address,married,photo,online');
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

	public function check_password($where)
	{
		$this->db->where($where);
		$this->db->from('users');

		if($this->db->count_all_results()==1)
			return true;
		else
			return false;
	}

	public function change_password($data,$where)
	{
		$this->db->where($where);
		return $this->db->update('users', $data); 
	}
}
?>