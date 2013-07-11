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
		$result=$this->profile_model->get_profile($this->current_user['id']);
		$data=$result[0];
		$data['email']=$this->current_user['email'];
		$data['error']=$error;
		$data['view_page'] = 'profile';
		$data['profile_flag']=$this->current_user['flag'];
		$this->load->view('template', $data);
	}
	
	function edit()
	{
		$email_toggle=$this->input->post('email_toggle');

		// Backend validation
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]|max_length[100],alpha_dash');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[100],alpha_dash');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|max_length[17]');
		$this->form_validation->set_rules('landline', 'Landline Number', 'trim|max_length[100]');
		$this->form_validation->set_rules('address', 'Address Number', 'trim|max_length[100]');
		$this->form_validation->set_rules('website', 'Website', 'trim|max_length[100]');
		$this->form_validation->set_rules('designation', 'Designation', 'trim|max_length[50]');
		$this->form_validation->set_rules('skype', 'Skype', 'trim|max_length[50]');
		$this->form_validation->set_rules('married', 'Married', 'trim|max_length[4]');

		if(!$email_toggle)
			$this->form_validation->set_rules('secondary_email', 'Display Email', 'trim|required|max_length[254]|valid_email');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->index();
		}
		else
		{
			// Set update datas
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'mobile' => $this->input->post('mobile'),
				'married' => $this->input->post('married'),
				'skype' => $this->input->post('skype'),
				'designation' => $this->input->post('designation'),
				'address' => $this->input->post('address'),
			);
			if($email_toggle)
				$data['secondary_email'] = $this->input->post('primary_email');
			else
				$data['secondary_email'] = $this->input->post('secondary_email');


			// Update Photo
			$photo_name=$this->input->post('photo_name');
			$photo_ext=$this->input->post('photo_ext');
			if($photo_name)
			{
				$name =$photo_name.$photo_ext;
				$new_name=$this->current_user['id'].$photo_ext;
				if(!file_exists(FCPATH.$this->config->item('path_profile_img').$this->current_user['id']))
					 mkdir(FCPATH.$this->config->item('path_profile_img').$this->current_user['id']);
				rename(FCPATH.$this->config->item('path_temp_img').$name,FCPATH.$this->config->item('path_profile_img').$this->current_user['id'].'/'.$new_name);
				$data['photo']=$new_name;
			}

			// Update profile completion flag
			if($data['first_name']!=NULL && $data['last_name']!=NULL && $data['secondary_email']!=NULL && $data['mobile']!=NULL)
			{
				$arr=$this->session->userdata('logged_in');
				if($arr['flag']=='1')
				{
					$data['flag']='0';
					$sess_array = array(
							         'id' => $arr['id'],
							         'email' => $arr['email'],
									 'firstname' => $arr['firstname'],
									 'lastname' => $arr['lastname'],
									 'role' => $arr['role'],
							         'limit' => $arr['limit'],
							         'flag' => '0',
							       );
					$this->session->set_userdata('logged_in', $sess_array);
				}
			}

			$this->profile_model->update_profile($this->current_user['id'],$data);
			$msg=array('error'=>'Profile updated successfully.');
			$this->index($msg);
		}
	}

	// Change password
	function change_password()
	{
		$current_password=md5($this->input->post('current_password'));
		$new_password=md5($this->input->post('new_password'));

		$where1=array('id'=>$this->current_user['id'],'password'=>$current_password);
		$where2=array('id'=>$this->current_user['id']);

		if($this->profile_model->check_password($where1))
		{
			$values=array('password'=>$new_password);
			if($this->profile_model->change_password($values,$where2))
				$data['success']='yes';
		}
		else
			$data['success']='missmatch';

		$result['resultset']=$data;
		$this->load->view('json',$result);
	}
}
?>