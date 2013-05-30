<?php
Class Admin_model extends CI_Model{
function pendingUsers()
{
  $this-> db ->select('users.id,users.email,user_detail.first_name,user_detail.last_name');
  $where=array('users.active !='=>'1','user_detail.role'=>'member');
  $this -> db -> where ($where);
  $this -> db -> from('users');
  $this ->  db -> join('user_detail','user_detail.user_id=users.id');
  return $this -> db -> get()->result();
}
function activateUser($id)
{
  $this->db->set('active','1');
  $this->db->where('id',$id);
  return $this->db->update('users');
}

}//end
?>