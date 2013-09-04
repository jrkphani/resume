<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->current_user=$this->session->userdata('logged_in');
   $this->load->helper(array('form', 'url'));
   $this->load->library(array('form_validation', 'session'));
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
	   	  
		  // field name, error message, validation rules
		  $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[2]|max_length[20]');
		  $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[1]|max_length[20]');
		  $this->form_validation->set_rules('email_address', 'Email', 'trim|required|valid_email|max_length[254]|xss_clean');
		  $this->form_validation->set_rules('pass_word', 'Password', 'trim|required|min_length[6]|max_length[30]|xss_clean');
		  //$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');
		  //$this->form_validation->set_rules('friend_email[]', 'Referred Email', 'trim|required|valid_email|max_length[254]');
		  $this->form_validation->set_rules('captcha', "Captcha", 'required|callback_captcha_check');
		  $this->form_validation->set_rules('role', 'Type', 'required');

		  $primary_email=$this->input->post('email_address');
	  	  $friend_emails=array_filter($this->input->post('friend_email'));

		  foreach ($friend_emails as $key => $value) {
		  	if(trim($value))
		  		$this->form_validation->set_rules('friend_email['.$key.']', 'Referred Email', 'trim|valid_email|max_length[254]');
		  }

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
		/*  else if($not_valid=$this->validateEmail($friend_emails))
		  {
		  	$data['errors']=$not_valid.' not a valid email.';
			$data['success']='no';
			$result['resultset']=$data;
			$this->load->view('json',$result);
		  }*/
		  else
		  {
		  	$this->load->model('user');

		  	if($result_exist=$this->user->check_user(array('email'=>$primary_email)))
		  	{
		  		$data['ex_msg']=$primary_email.' is already registered with us.';
				$data['success']='already';
				$result['resultset']=$data;
				$this->load->view('json',$result);
			}
			else
			{
			  	error_reporting(E_ERROR);
			 	$this->load->library('smtp_validate_email');
				$sender = 'no-reply@ezcv.in';
				$SMTP_Validator = new Smtp_validate_email();
				$SMTP_Validator->debug = false;
				/*$results=$SMTP_Validator->validate(array($primary_email,$friend_email1,$friend_email2), $sender);

				if(!$results[$primary_email])
				{
					$data['errors']=$primary_email.' is an invalid Email.';
					$data['success']='no';
					$result['resultset']=$data;
					$this->load->view('json',$result);
				}
				else*/
				if(1)
				{
					$this->load->library('passhash');
					$post_data=array(
									'firstname'=>$this->input->post('firstname'),
									'lastname'=>$this->input->post('lastname'),
									'email'=>$this->input->post('email_address'),
									'password'=>$this->passhash->hash($this->input->post('pass_word')),
									'role'=>$this->input->post('role'),
									'active'=>sha1(mt_rand(10000,99999).time().$this->input->post('email_address'))
								  );
					$check_data=array('email'=>$post_data['email']);
					if(!$this->user->check_user($check_data))
					{
						if($user_id=$this->user->add_user($post_data))
						{
							//Add encrypted user id.
							$encrypt_id=str_replace('/' , '' , $this->passhash->hash($user_id)); //removing forward strokes from encrypt_id
							$where=array('id'=>$user_id);
							$values=array('id_encrypt' => $encrypt_id );
							$this->user->update_user($where,$values);

							//modify the seesion data based in register data
							$session_data = $this->session->userdata('resume_data');
							$first_name=$post_data['firstname'];
							$last_name=$post_data['lastname'];
							$session_data['user_detail']['first_name']=$post_data['firstname'];
							$session_data['user_detail']['last_name']=$post_data['lastname'];
							
							$this->load->library('email');
							#$config['protocol'] = 'sendmail';
							#$config['mailpath'] = '/usr/sbin/sendmail';
							$config['charset'] = 'iso-8859-1';
							$config['wordwrap'] = TRUE;
							$config['mailtype']='html';
							$this->email->initialize($config);
							$this->email->from('no-reply@ezcv.in', 'EZCV');
							#$this->email->cc('another@another-example.com');
							#$this->email->bcc('them@their-example.com');
							if($post_data['role']=='user')
							{
								if($this->session->userdata('resume_data'))
								{
								if($html_link=$this->updateUser($user_id,$session_data))
								{
									$data['html']=$html_link;
									$this->session->sess_destroy();
								}
								else
								{
									if(!$session_data['registeronly'])
									{
										$data['html']='no';
									}
									else
									{
										$data['html']='nodownload';
									}
								}
								}
								else
								{
									$data['html']='nosession';
								}
								$this->invite_friend($user_id,$friend_emails,$first_name.' '.$last_name);								
								$this->email->subject('Activate your EZCV Account');
/*								$message= 'Dear '.$first_name.' '.$last_name.'<br /><br />Thank you for registering with EZCV. Please click on the link below to activate your account and get access to your resume.<br /><a href="'.base_url('registration/activation/'.urlencode($encrypt_id).'/'.$post_data['active']).'"> Activate my EZCV Account </a><br />Once you have activated your account, you can view your current resume and  edit it any time, change templates and update your details. You can also download the resume whenever you wish.<br /><br />Get Noticed in a Sea of Resumes!<br /><br />Regards<br />EZCV Team';	*/
								
								$message= '<table width="820px" border="0" align="center">
													<tr bgcolor="#266a86">
														<td scope="row" style="height:126px;">
															<a href="http://ezcv.in/" style="text-decoration:none;"><img style="margin-left:20px; margin-top:3px; margin-bottom:3px;" src='.base_url("assets/img/ezcv-logo.png").' alt="EZCV" title="EZCV" width="125" height="106"/></a>
														</td>
													</tr>
													<tr>
														<td scope="row">
															<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; padding:0px 0 0 20px; margin-top:10px;">Dear <span style="color:#e78130;">"'.$first_name.' '.$last_name.'"</span></p>
															<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; padding:0px 20px 5px 20px; margin-top:10px;">Thank you for registering with EZCV. Please click on the <b style="font:15px Arial, Helvetica, sans-serif; font-weight:bold;">one time activation</b> link below to activate your account and get access to your resume.</p>
														</td>
													</tr>
													<tr>
														<td scope="row" align="center";>
															<a href="'.base_url('registration/activation/'.urlencode($encrypt_id).'/'.$post_data['active']).'" style="font:14px Arial, Helvetica, sans-serif; padding:10px 15px; text-align:center; background-color:#e78130; border:1px solid #d77426; text-decoration:none; color:#fff;">Activate My EZCV Account</a>
														</td>
													</tr>
													<tr>
														<td scope="row">
														<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; padding:0px 20px 5px 20px;"> Once you have activated your account, you can view your current resume and edit it any time, change templates and update your details. You can also download the resume whenever you wish.</p>
														<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; padding:0px 20px 10px 20px; margin:0px;">Get Noticed in a Sea of Resumes!</p>
														</td>
													</tr>
													<tr>
														<td scope="row">
														<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; padding:0px 20px 0px 20px; margin:0px;">Regards</p>
														<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; padding:0px 20px 10px 20px; margin:0px;"><span style="font-weight:bold;">EZCV</span> Team</p></td>
													</tr>
													<tr>
														<td>&nbsp;</td>
													</tr>
													<tr bgcolor="#525252">
														<td scope="row">
															<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; padding:10px 20px 10px 20px; margin:0px; color:#fff;">
															&copy; copyright '.date('Y').' | <a style="color:#FFFFFF; text-decoration:underline;" href="http://ezcv.in/">EZCV</a> | All Rights Reserved
															
														</p>
														</td>
													</tr>
												</table>';						
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
							$data['errors']="Internal error, Please try again!";
							$data['success']='no';
							$result['resultset']=$data;
							$this->load->view('json',$result);
						}
					}
					else
					{
						$data['errors']="Email is not available";
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
	 $id_encrypt = ($this->uri->segment(3)) ? urldecode($this->uri->segment(3)) : NULL;
	 $code = ($this->uri->segment(4)) ? $this->uri->segment(4) : NULL;
	 $this->load->helper('file');	 
	 if(($id_encrypt) &&  strlen($code)!=1)
	 {
		 $this->load->model('user');
		 if($this->user->activate_user($id_encrypt,$code))
		 {
		 	$id = $this->user->get_id($id_encrypt);
			 $resultdata['download'] = 'no';
			 $resultdata['msg']=NULL;
			 $this->load->model('resume_model');
			 $data['user_detail']= $this->resume_model->user_detail($id);
			 $data['about']= $this->resume_model->about($id);
			 
				if(count($data['about']) >0)
				{
					$viewdata['user_detail']=$data['user_detail'][0];
					$data['skill']= $this->resume_model->skill($id);
					$viewdata['skill']=$data['skill'][0];
					$viewdata['template']=$viewdata['user_detail']['Template'];
					$data['company']= $this->resume_model->company($id);
					$viewdata['company']=$data['company'][0];
					 $data['project']= $this->resume_model->project($id);
					 $viewdata['project']=$data['project'][0];
					 $data['education']= $this->resume_model->education($id);
					 $viewdata['education']=$data['education'][0];		 
					 
					 $viewdata['about']=$data['about'][0];
					 $data['awards']= $this->resume_model->awards($id);
					 $viewdata['awards']=$data['awards'][0];
					 $data['otherSkills']= $this->resume_model->otherskill($id);
					 $viewdata['otherSkills']=$data['otherSkills'][0];
					 $preview_data = $this->load->view('T/'.$viewdata['user_detail']['Template'].'_html',$viewdata,true);
					 $file_name=$id;
					 $temp_path_html=FCPATH.$this->config->item('path_temp_file').$file_name.'.html';
					 if(!write_file($temp_path_html, $preview_data))
						{
							//Unable to write file
							$resultdata['msg']='Internal error, please login to download ';
						}			
					$resultdata['download'] = 'yes';
				}
			$resultdata['view_page'] = 'congrats';
			$resultdata['id'] = $id_encrypt;
			$resultdata['code'] = $code;
			$this->load->view('template', $resultdata);
		 }
		 else
		 {
			redirect('my404');
		 }
	 }
	 else
	 {
		 redirect('my404');
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
	$sender = 'no-reply@ezcv.in';
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
	//$this->load->view('json',$data);*/
 }
function captcha_check()
	{
		if(strtolower($this->input->post('captcha')) == $this->session->userdata('captchaWord'))
		
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('captcha_check', 'There is a mismatch in the Captcha, please re-enter.');
			return false;
		}
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
 		$this->email->subject('Your friend, '.$name.' has referred you to EZCV - Make a Better Resume Now');
		/*$message= 'Your friend '.$name.', has referred your name to us and recommends EZCV to you. We would like to introduce EZCV, a simple solution to all your resume building needs. We help you build not just your resume but also your personality and give you a beautiful resume template to go with it.<br /><br />
					You get just one chance with job opportunities, and we help you make that impact. Join us and we can help you build your personality.<br /><a href="'.base_url('login/').'"> REGISTER WITH EZCV </a><br /><br />Get Noticed in a Sea of Resumes!<br /><br />Regards<br />EZCV Team';*/

		$message= '<table width="820px" border="0" align="center">
						<tr bgcolor="#266a86">
							<td scope="row" style="height:126px;">
								<a href="http://ezcv.in/" style="text-decoration:none;"><img style="margin-left:20px; margin-top:3px; margin-bottom:3px;" src='.base_url("assets/img/ezcv-logo.png").' alt="EZCV" title="EZCV" width="125" height="106"/></a>
							</td>
						</tr>
						<tr>
							<td scope="row">
								<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; padding:0px 20px 5px 20px; margin-top:10px;">
									Your friend <strong>'.$name.'</strong>, has referred your name to us and recommends EZCV to you. We would like to introduce EZCV, a simple solution to all your resume building needs. We help you build not just your resume but also your personality and give you a beautiful resume template to go with it.<br /><br />You get just one chance with job opportunities, and we help you make that impact. Join us and we can help you build your personality.<br /><a href="'.base_url('login/').'"> REGISTER WITH EZCV </a>
								</p>
							</td>
						</tr>
						<tr>
							<td scope="row">
							<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; padding:0px 20px 0px 20px; margin:0px;">Regards</p>
							<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; padding:0px 20px 10px 20px; margin:0px;"><span style="font-weight:bold;">EZCV</span> Team</p></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr bgcolor="#525252">
							<td scope="row">
								<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; padding:10px 20px 10px 20px; margin:0px; color:#fff;">
								&copy; copyright '.date('Y').' | <a style="color:#FFFFFF; text-decoration:underline;" href="http://ezcv.in/">EZCV</a> | All Rights Reserved
								
							</p>
							</td>
						</tr>
					</table>';
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

function updateUser($user_id,$session_data=NULL)
{
	$this->load->helper('file');

	//Get user data from session
	//$session_data = $this->session->userdata('resume_data');
	//print_r($session_data); die;
	$this->load->model('resume_model');
	//Update user exist session data from resume page
	if(!$user_id)
	{
		return false;
	}
	if($session_data['user_detail']['first_name'] && $session_data['user_detail']['last_name'] && $session_data['user_detail']['mobile']) $session_data['user_detail']['flag']='0';
		$this->resume_model->update($user_id,$session_data['user_detail'],$session_data['about'],$session_data['awards'],$session_data['skill'],$session_data['otherSkills'],$session_data['company'],$session_data['project'],$session_data['education']);
		if($this->current_user)
	   {
		   return $this->current_user['id'];
	   }
	   else
	   {
		   if(!$session_data['registeronly'])
		   {
			   $preview_data = $this->load->view('T/'.$session_data['template'].'_html',$session_data,true);
			   $temp_path_html=FCPATH.$this->config->item('path_temp_file').$user_id.'.html';
			   if(!write_file($temp_path_html, $preview_data))
				{
					return false;
				}
			}
			else
			{
				return false;
			}
	   }
		return $user_id;
}

}
?>
