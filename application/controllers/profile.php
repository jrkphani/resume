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
		foreach($result as $row)
		{
			$data['first_name']=$row['first_name'];
			$data['last_name']=$row['last_name'];
			$data['secondary_email']=$row['secondary_email'];
			$data['mobile']=$row['mobile'];
			$data['landline']=$row['landline'];
			$data['address']=$row['address'];
			$data['website']=$row['website'];
			$data['photo']=$row['photo'];
		}
		if($error)
			$data['error']=$error;
		else
			$data['error']='';
		
		$this->load->view('profile',$data);
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
			if($_FILES['photo']['name'])
			{
				$config['upload_path'] = './user/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = 1024 * 8;
				$config['overwrite'] = TRUE;
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('photo'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->index($error);
				}
				else
				{
					$arr=$this->upload->data();
					
					// resize the file
					$config['image_library'] = 'gd2';
					$config['source_image'] = $arr['full_path'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 70;
					$config['height'] = 75;
					$this->load->library('image_lib', $config);
					if(!$this->image_lib->resize())
					{
						unlink($arr['full_path']);
						$error = array('error' => $this->image_lib->display_errors());
						$this->index($error);
					}
					// end
					else
					{
					// rename the file to user id
					$ses=$this->session->userdata('logged_in');
					$new_name = $ses['id'].$arr['file_ext'];
					rename($arr['full_path'],$arr['file_path'].$new_name);
					// end
					
					$this->profile_model->update_profile();
					$msg=array('error'=>'Profile updated successfully.');
					$this->index($msg);
					}
				}
			}
			else
			{
				$this->profile_model->update_profile();
				$msg=array('error'=>'Profile updated successfully.');
				$this->index($msg);
			}
		}
	}
}
?>