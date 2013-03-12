
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
		$this->load->library('email');
		#$config['protocol'] = 'sendmail';
		#$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype']='html';
		$this->email->initialize($config);
		$this->email->from('resume@digitalchakra.in', 'Digital Chakra');
		$this->email->to($data['email']);
		#$this->email->cc('another@another-example.com');
		#$this->email->bcc('them@their-example.com');
		$this->email->subject('Verify your account @ Digitalchakra');
		$message= 'Verify your the registered account in <a href="'.base_url('registration/activation/'.$this->db->insert_id().'/'.$data['active']).'"> Digitalchakra Resume App </a>'; 
		$this->email->message($message);
		$this->email->send();
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
}
?>

