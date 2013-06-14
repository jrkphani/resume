<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('users.id,users.email,user_detail.first_name,user_detail.last_name,user_detail.role,user_detail.limit,user_detail.flag');
   $this -> db -> from('users');
   $this -> db -> where('users.email', $username);
   $this -> db -> where('users.password', MD5($password));
   $this -> db -> where('users.active', 1);
   $this -> db -> limit(1);
   $this -> db -> join('user_detail','users.id=user_detail.user_id');

   $query = $this -> db -> get();
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 function add_user($data)
 {
	// $code=sha1(mt_rand(10000,99999).time().$this->input->post('email_address'));
	$this->db->set('email',$data['email']);
	$this->db->set('password',$data['password']);
	$this->db->set('active',$data['active']);
	$newuser=$this->db->insert('users'); 
  
	$this->db->set('first_name',$data['firstname']);
	$this->db->set('last_name',$data['lastname']);
	$this->db->set('role',$data['role']);
	$this->db->set('secondary_email',$data['email']);
  $this->db->set('flag','1');
	$this->db->set('user_id',$this->db->insert_id());
	$this->db->insert('user_detail');
	
	
  if($newuser)
  {
		return true;
  }
  else
  {
    return false;
  }
 }
 function update_user($where,$data)
 {
	// $code=sha1(mt_rand(10000,99999).time().$this->input->post('email_address'));
	$this->db->where($where);
  if($newuser = $this->db->update('users',$data))
  {
		return true;
  }
  else
  {
	  return false;
  }
 }
 function check_user($data)
 {
    //$email=$this->input->post('email_address');
	$this -> db -> select('id');
	$this -> db -> from('users');
	$this -> db -> where($data);
	$query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
	  return $query->result_array();
   }
   else
   {
	   return false;
   }
 }
 function activate_user($id,$code)
 {
	$this -> db -> select('id');
	$this -> db -> from('users');
	$this -> db -> where('active', $code);
	$this -> db -> where('id', $id);
	$query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
	   $data = array('active' => 1);
     $this -> db -> where('id', $id);
	   $this ->db ->update('users',$data);
     return true;
   }
   else
   {
	   return false;
   }
 }
}
?>