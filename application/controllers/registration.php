<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
	 if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['username'];
		 $this->load->view('home', $data);
	   }
	   else
	   {
		$this->load->library('form_validation');
		  // field name, error message, validation rules
		  $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[2]|max_length[20]|xss_clean');
		  $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[1]|max_length[20]|xss_clean');
		  $this->form_validation->set_rules('email_address', 'Email', 'trim|required|valid_email|max_length[254]');
		  $this->form_validation->set_rules('pass_word', 'Password', 'trim|required|min_length[4]|max_length[32]');
		  //$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');
		  $this->form_validation->set_rules('friend_email1', 'Friend 1 Email', 'trim|required|valid_email|max_length[254]');
		  $this->form_validation->set_rules('friend_email2', 'Friend 2 Email', 'trim|required|valid_email|max_length[254]');
		  $this->form_validation->set_rules('role', 'Type', 'required');

		  if($this->form_validation->run() == FALSE)
		  {
			$data['errors']=validation_errors();
			$data['success']='no';
			$result['resultset']=$data;
			$this->load->view('json',$result);
		  }
		  else
		  {
		  	$this->load->model('user');
		  	$primary_email=$this->input->post('email_address');
		  	$friend_email1=$this->input->post('friend_email1');
		  	$friend_email2=$this->input->post('friend_email2');

		  	if($result_exist=$this->user->check_user(array('email'=>$primary_email)))
		  		$data['errors']=$primary_email.' is already registered with us.';
		  	else if($result_exist=$this->user->check_user(array('email'=>$friend_email1)))
		  		$data['errors']=$friend_email1.' is already registered with us.';
		  	else if($result_exist=$this->user->check_user(array('email'=>$friend_email2)))
		  		$data['errors']=$friend_email2.' is already registered with us.';

		  	if($result_exist)
		  	{
				$data['success']='no';
				$result['resultset']=$data;
				$this->load->view('json',$result);
			}
			else
			{
			  	error_reporting(E_ERROR);
			 	$this->load->library('smtp_validate_email');
				$sender = 'ramasamy.digitalchakra@gmail.com';
				$SMTP_Validator = new Smtp_validate_email();
				$SMTP_Validator->debug = false;
				$results=$SMTP_Validator->validate(array($primary_email,$friend_email1,$friend_email2), $sender);

				if(!$results[$primary_email])
					$data['errors']=$primary_email.' is an invalid Email.';
				else if(!$results[$friend_email1])
					$data['errors']=$friend_email1.' is an invalid Email.';
				else if(!$results[$friend_email2])
					$data['errors']=$friend_email2.' is an invalid Email.';

				if((!$results[$primary_email]) || (!$results[$friend_email1]) || (!$results[$friend_email2]) )
				{
					$data['success']='no';
					$result['resultset']=$data;
					$this->load->view('json',$result);
				}
				else
				{
					$post_data=array(
									'firstname'=>$this->input->post('firstname'),
									'lastname'=>$this->input->post('lastname'),
									'email'=>$this->input->post('email_address'),
									'password'=>md5($this->input->post('pass_word')),
									'role'=>$this->input->post('role'),
									'active'=>sha1(mt_rand(10000,99999).time().$this->input->post('email_address'))
								  );
					$check_data=array('email'=>$post_data['email']);
					if(!$this->user->check_user($check_data))
					{
						if($this->user->add_user($post_data))
						{
							$this->load->library('email');
							#$config['protocol'] = 'sendmail';
							#$config['mailpath'] = '/usr/sbin/sendmail';
							$config['charset'] = 'iso-8859-1';
							$config['wordwrap'] = TRUE;
							$config['mailtype']='html';
							$this->email->initialize($config);
							$this->email->from('resume@digitalchakra.in', 'Digital Chakra');
							$this->email->to($post_data['email']);
							#$this->email->cc('another@another-example.com');
							#$this->email->bcc('them@their-example.com');
							if($post_data['role']=='user')
							{
								$this->email->subject('Verify your account @ Digitalchakra');
								$message= 'Verify your the registered account in <a href="'.base_url('registration/activation/'.$this->db->insert_id().'/'.$post_data['active']).'"> Digitalchakra Resume App </a>'; 
							}
							else if($post_data['role']=='member')
							{
								$this->email->subject('Thank you for register as member');
								$message= 'We will alert you after admin approval'; 
							}
							$this->email->message($message);
							if($this->email->send())
							{
								$data['mail']='yes';
							}
							else
							{
								$data['mail']='no';
							}
							$data['success']='yes';
							$result['resultset']=$data;
							$this->load->view('json',$result);
						}
						//$this->load->view('login_view');
						//redirect('home', 'refresh');
					}
					else
					{
						$data['errors']="eamil is not available";
						$data['success']='no';
						$result['resultset']=$data;
						$this->load->view('json',$result);
					}
				}
			}		  
		  }
	   }
   
 }
 function activation()
 {
	 $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
	 $code = ($this->uri->segment(4)) ? $this->uri->segment(4) : NULL;
	 if(($id) &&  strlen($code)>2)
	 {
		 $this->load->model('user');
		 if($this->user->activate_user($id,$code))
		 {
			$data['view_page'] = 'congrats';
			$this->load->view('template', $data);
		 }
		 else
		 {
			 redirect('login', 'refresh');
		 }
	 }
	 else
	 {
		 redirect('login', 'refresh');
	 }
 }

//validate entered email on onblur/onchange
 function validateEmail()
 {
 	$this->load->model('user');
 	$email = $_GET['email'];
 	if($this->user->check_user(array('email'=>$email)))
 	{
 		$data['resultset']['success']='-2';
 	}
 	else
 	{
	 	error_reporting(E_ERROR);
	 	$this->load->library('smtp_validate_email');		
		$sender = 'ramasamy.digitalchakra@gmail.com';
		$SMTP_Validator = new Smtp_validate_email();
		$SMTP_Validator->debug = false;

		if($results=$SMTP_Validator->validate(array($email), $sender))
			$data['resultset']['success']=($results[$email] ? '1' : '-1');
		else
			$data['resultset']['success']='-1';
	}
	$this->load->view('json',$data);
 }

}

?>