<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->current_user=$this->session->userdata('logged_in');
   if($this->current_user)
		redirect('home', 'refresh');
   $this->load->library('session');
 }

 function index()
 {
	 /*if($this->current_user)
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['username'];
		 $this->load->view('home', $data);
	   }
	   else
	   {*/
	   	  $this->load->library('form_validation');
		  // field name, error message, validation rules
		  $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[2]|max_length[20]');
		  $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[1]|max_length[20]');
		  $this->form_validation->set_rules('email_address', 'Email', 'trim|required|valid_email|max_length[254]|xss_clean');
		  $this->form_validation->set_rules('pass_word', 'Password', 'trim|required|min_length[6]|max_length[30]|xss_clean');
		  //$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');
		  $this->form_validation->set_rules('friend_email[]', 'Referred Email', 'trim|required|valid_email|max_length[254]|callback_friend_check');
		  $this->form_validation->set_rules('role', 'Type', 'required');

		  $primary_email=$this->input->post('email_address');
	  	  $friend_emails=$this->input->post('friend_email');

		  if($this->form_validation->run() == FALSE)
		  {
			$data['errors']=validation_errors();
			$data['success']='no';
			$result['resultset']=$data;
			$this->load->view('json',$result);
		  }
		  else if(in_array($primary_email,$friend_emails))
		  {
			$data['errors']='You cannot refer your self.';
			$data['success']='no';
			$result['resultset']=$data;
			$this->load->view('json',$result);
		  }
		  else if(sizeof($friend_emails)!=sizeof(array_unique($friend_emails)))
		  {
			$data['errors']='You cannot refer the same person twice.';
			$data['success']='no';
			$result['resultset']=$data;
			$this->load->view('json',$result);
		  }
		  else if($not_valid=$this->validateEmail($friend_emails))
		  {
		  	$data['errors']=$not_valid.' not a valid email.';
			$data['success']='no';
			$result['resultset']=$data;
			$this->load->view('json',$result);
		  }
		  else
		  {
		  	$this->load->model('user');

		  	if($result_exist=$this->user->check_user(array('email'=>$primary_email)))
		  	{
		  		$data['errors']=$primary_email.' is already registered with us.';
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
				{
					$data['errors']=$primary_email.' is an invalid Email.';
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
							#$this->email->cc('another@another-example.com');
							#$this->email->bcc('them@their-example.com');
							if($post_data['role']=='user')
							{
								$insert_id=$this->db->insert_id();
								if($html_link=$this->updateUser($insert_id))
									$data['html']=$html_link;
								else
									$data['html']='no';

								$this->email->subject('Verify your account on EZCV');
								$message= 'Dear User<br /><br />Thank you for your register on EZCV. Your account has been created successfully. Please click on below link to verify your account<br /><a href="'.base_url('registration/activation/'.$insert_id.'/'.$post_data['active']).'"> Activate my EZCV account </a><br /><br />Regards<br />EZCV'; 

								$this->invite_friend($insert_id,$friend_emails,$post_data['firstname'].' '.$post_data['lastname']);
							}
							else if($post_data['role']=='member')
							{
								$this->email->subject('Thank you for register with EZCV as a member');
								$message= 'Dear User<br /><br />Thank you for your register on EZCV. Your account has been created successfully. We will alert you after admin approval.<br /><br />Regards<br />EZCV'; 
							}
							$this->email->to($post_data['email']);
							$this->email->message($message);
							if(!$this->email->send())
								$data['mail']='no';
							$data['success']='yes';
							$result['resultset']=$data;
							$this->load->view('json',$result);
						}
						else
						{
							$data['errors']="Internal error, Please try agian!";
							$data['success']='no';
							$result['resultset']=$data;
							$this->load->view('json',$result);
						}
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
	 /*} */
   
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
 function validateEmail($email_arr)
 {
 	$this->load->model('user');
 	/*$email = $_GET['email'];
 	if($this->user->check_user(array('email'=>$email)))
 	{
 		$data['resultset']['success']='-2';
 	}
 	else
 	{*/
 	error_reporting(E_ERROR);
 	$this->load->library('smtp_validate_email');		
	$sender = 'ramasamy.digitalchakra@gmail.com';
	$SMTP_Validator = new Smtp_validate_email();
	$SMTP_Validator->debug = false;
	$not_valid=NULL;
	$results=$SMTP_Validator->validate($email_arr, $sender);
	if($results)
	{
		foreach($email_arr as $value)
		{
			if(isset($results[$value]) && ($results[$value]))
			{
				//true
			}
			else
			{
				$not_valid=$not_valid.$value.' ';
			}
		}
	}
	else
	{
		$not_valid=implode(',',$email_arr);
	}
		return $not_valid;
	/*
			$data['resultset']['success']=($results[$email] ? '1' : '-1');
		else
			$data['resultset']['success']='-1';
	}
	$this->load->view('json',$data);*/
 }

 function invite_friend($insert_id,$emails,$name)
 {
 	$this->load->model('user');
 	foreach($emails as $email)
 	{
 		//Check email id is already referred
 		if($result=$this->user->check_friend($email))
 			$this->user->update_friend($email,$insert_id,$result[0]['referrer']);
 		else
 			$this->user->add_friend($email,$insert_id);
 		$this->email->to($email);
 		$this->email->subject($name.' invited you to join EZCV');
		$message= 'Hello<br /><br />Your friend, '.$name.' has invited you to join EZCV, the best resume building service known to man.
We helped them create a better resume - for free! Stand out in a overcrowded job market and get noticed by employers.
Improve your chances of finding your dream job - jump start your career with EZCV.<br /><br />
Visit http://ezcv.in to start building a better resume now!';
		$this->email->message($message);
		if(!$this->email->send())
			$data['mail']='no';
 	}
 }

 //Check primary email and referring email are different
function username_check($email_address)
{
	if(($email==$friend_email1) || ($email==$friend_email2))
	{
		$this->form_validation->set_message('username_check', 'You can not refer your self.');
		return false;
	}
	else
		return true;
}

function friend_check()
{
	$friend_emails=$this->input->post('friend_email');
	$this->load->model('user');
	$result=$this->user->check_registered($friend_emails);
	$result_size=sizeof($result);
	if($result_size>0)
	{
		$registered=$result[0]->email;
		for($i=1;$i<$result_size;$i++)
			$registered=$registered.', '.$result[$i]->email;
		$this->form_validation->set_message('friend_check', $registered.' already registered with us.');
		return false;
	}
	else
		return true;
}

function updateUser($insert_id)
{
	$this->load->helper('file');

	//Get user data from session
	$user_detail=$this->session->userdata('user_detail');
	$skill=$this->session->userdata('skill');
	$company=$this->session->userdata('company');
	$project=$this->session->userdata('project');
	$education=$this->session->userdata('education');
	$template=$this->session->userdata('template');

	$this->load->model('resume_model');
	//Update user exist session data from resume page
	if($user_detail)
		$this->resume_model->update($insert_id,$user_detail,$skill,$company,$project,$education);

	//Merge data for generate HTML temporary file
	//$post_array=array_merge($user_detail,$skill,$company,$project,$education,$template);
	$post_array['basic']=$user_detail;
	$post_array['skill']=$skill;
	$post_array['company']=$company;
	$post_array['project']=$project;
	$post_array['education']=$education;
	$post_array['template']=$template;

	//print_r($post_array);

	//Generate HTML temporary file for download
	$preview_data = $this->load->view('T/'.$template['template'].'_html',$post_array,true);
	$file_name=mt_rand().time();
	$temp_path_html=FCPATH.$this->config->item('path_temp_file').$file_name.'.html';

	/*$this->session->unset_userdata('user_detail');
	$this->session->unset_userdata('skill');
	$this->session->unset_userdata('company');
	$this->session->unset_userdata('project');
	$this->session->unset_userdata('education');
	$this->session->unset_userdata('template');*/
	if(write_file($temp_path_html, $preview_data))
		return $file_name;
	else
		return false;
}

}
?>