<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in'))
		{
			redirect('home', 'refresh');
		}
		$this->load->model('profile_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	
	function index($error='')
	{
		$result=$this->profile_model->get_profile();
		$data=$result[0];
		if($error)
			$data['error']=$error;
		else
			$data['error']='';
		$data['view_page'] = 'profile';
		$this->current_user=$this->session->userdata('logged_in');
		$data['profile_flag']=$this->current_user['flag'];
		$this->load->view('template', $data);
	}
	
	function edit()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('secondary_email', 'Secondary Email', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'required');
		
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