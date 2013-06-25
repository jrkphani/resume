<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->current_user=$this->session->userdata('logged_in');
		if(!$this->current_user)
		{
			redirect('home', 'refresh');
		}
		$this->load->model('profile_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	
	function index($error=NULL)
	{
		$result=$this->profile_model->get_profile();
		$data=$result[0];
		if($error)
			$data['error']=$error;
		else
			$data['error']=NULL;
		$data['view_page'] = 'profile';
		$data['profile_flag']=$this->current_user['flag'];
		$this->load->view('template', $data);
	}
	
	function edit()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]|max_length[100],alpha_dash');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[100],alpha_dash');
		$this->form_validation->set_rules('secondary_email', 'Display Email', 'trim|required|max_length[254]|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|max_length[17]');
		$this->form_validation->set_rules('landline', 'Landline Number', 'trim|max_length[100]');
		$this->form_validation->set_rules('address', 'Address Number', 'trim|max_length[100]');
		$this->form_validation->set_rules('website', 'Website', 'trim|max_length[100]');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->index();
		}
		else
		{
			$this->profile_model->update_profile();
			$msg=array('error'=>'Profile updated successfully.');
			$this->index($msg);
		}
	}
}
?>