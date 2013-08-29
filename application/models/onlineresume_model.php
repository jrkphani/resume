<?php
class Onlineresume_model extends CI_Model
{
	function toggle_online($values,$where)
	{
		$this->db->where($where);
		return $this->db->update('user_detail',$values);
	}

	function getUserID($id_encrypt)
	{
		$where=array('users.id_encrypt' => $id_encrypt,'user_detail.online' => '1');
		$this->db->select('users.id');		
		$this->db->from('users');
		$this->db->join('user_detail', 'users.id = user_detail.user_id');
		$this->db->where($where);
		$query = $this->db->get();
		if($query -> num_rows() == 1)
		{
			$result=$query->result_array();
			return $result[0]['id'];
		}
		else
			return false;
	}

	function getDetails($column,$table,$where)
	{
		$this->db->select($column);
		$query = $this->db->get_where($table,$where);
		return $query->result_array();
	}

	function checkAvail($table,$where)
	{
		$query = $this->db->get_where($table,$where);
		if($query -> num_rows() == 1)
			return true;
		else
			return false;
	}
}
?>