<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->current_user=$this->session->userdata('logged_in');		// Get current user
	}
	
	function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');	
		$this->load->model('feedback_model');
		$data['msg']=NULL;
		$data['success']=NULL;
		$data['view_page'] = 'feedback';

		if($this->current_user)		// If user logged-in get name and email.
		{
			$data['name']=$this->current_user['firstname'];
			$data['email']=$this->current_user['email'];
		}
		else
		{
			$data['name']=NULL;
			$data['email']=NULL;
		}
		
		if(isset($_POST['submit_feedback']))
		{
			// Input fields validations
			$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[30]|min_length[3]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]');
			$this->form_validation->set_rules('subject', 'Subject', 'trim|required|max_length[100]');
			$this->form_validation->set_rules('message', 'Message', 'trim|required|max_length[1000]');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('template', $data);
			}
			else
			{
				$name=$this->input->post('name');
				$email=$this->input->post('email');
				$subject=$this->input->post('subject');
				$message=$this->input->post('message');

				$values=array(
					'name' => $name,
					'email' => $email,
					'subject' => $subject,
					'message' => $message
				);
				$result=$this->feedback_model->add_feedback($values);	// Insert feedback to database
				if($result)
				{
					$data['msg']='Your feedback has been submitted successfully.';
					$data['success']='yes';

					//Mail Configuration
					$this->load->library('email');
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['mailtype']='html';
					$this->email->initialize($config);
					$this->email->from('ezcv@digitalchakra.in', 'Digital Chakra');

					//Write mail to user
					$this->email->subject('Thank your for your feedback - EZCV');
					$content= 'Dear User<br /><br />Thank you for your feedback on EZCV. Your feedback help us to improve. We will contact you if necessary.<br /><br />Regards<br />EZCV';
					$this->email->to($email);
					$this->email->message($content);
					$this->email->send();

					//Write mail to admin
					$this->email->subject('New Feedback from EZCV');
					$content2= 'Dear Admin<br /><br />New feedback submitted on EZCV.<br /><br />Feedback Details:<br />Subject: '.$subject.'<br />Message: '.$message.'<br /><br />Regards<br />EZCV';
					$this->email->to('aditya@digitalchakra.in');
					$this->email->message($content2);
					$this->email->send();

				}
				else
				{
					$data['msg']='Internal error. Please try again later.';
					$data['success']='no';
				}
			}
		}
		$this->load->view('template', $data);
	}
}
?>