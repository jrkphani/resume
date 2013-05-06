<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('id, firstname, lastname, email');
   $this -> db -> from('users');
   $this -> db -> where('email', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> where('active', 1);
   $this -> db -> limit(1);

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
  
  if($newuser = $this->db->insert('users',$data))
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
	   $this ->db ->update('users',$data);
     return true;
   }
   else
   {
	   return false;
   }
 }
 
 function exist_details($id)
 {
	 $this -> db -> select('first_name,last_name,secondary_email,mobile,landline,address,website,photo');
	 $this-> db -> from ('user_detail');
	 $this->db->where('user_id',$id);
	 $query=$this->db->get();
	 return $query->result_array();
 }
}
?>