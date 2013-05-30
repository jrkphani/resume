<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
function __construct()
{
	parent::__construct();
	$this->current_user=$this->session->userdata('logged_in');
	if($this->current_user['flag']==1) //check for profile complition
		redirect('profile', 'refresh');
	if($this->current_user['role']!='admin')
		redirect('login', 'refresh');
}

function index()
{
	$this->userList();
}

function userList()
{
	$arr=$this->session->userdata('logged_in');
	$this->load->model('user');
	$data['userlist']=$this->user->userList($arr['id']);
	$data['view_page'] = 'userList';
	$this->load->view('template', $data);
}

function pendingUsers($msg='')
{
	$this->load->model('admin_model');
	$data['userlist']=$this->admin_model->pendingUsers();
	$data['view_page'] = 'pendingUsers';
	$data['msg']=$msg;
	$this->load->view('template', $data);
}

function activateUser($id='')
{
	$msg='';
	if($id)
	{
 	$this->load->model('admin_model');
 	if($this->admin_model->activateUser($id))
 		$msg='Activated';
 	else
 		$msg='Internal Error.';
	}
	$this->pendingUsers($msg);
}

function editUser($id)
{
	$this->load->helper('form');
	$this->load->library('form_validation');
		
	$this->load->model('user');
	$data['userlist']=$this->user->userDetails($id);
	$data['view_page'] = 'userEdit';
	$data['user_id']=$id;
	$this->load->view('template', $data);
}

function updateUser()
{
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->model('user');
		
	$this->form_validation->set_rules('first_name', 'First Name', 'required');
	$this->form_validation->set_rules('last_name', 'Last Name', 'required');
	$this->form_validation->set_rules('secondary_email', 'Secondary Email', 'required');
	$this->form_validation->set_rules('mobile', 'Mobile Number', 'required');

	if ($this->form_validation->run() === FALSE)
	{
		$this->edit($this->input->post('id'));
	}
	else
	{
		$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'secondary_email' => $this->input->post('secondary_email'),
					'mobile' => $this->input->post('mobile'),
					'landline' => $this->input->post('landline'),
					'website' => $this->input->post('website'),
					'address' => $this->input->post('address'),
					'tag_line' => $this->input->post('tag_line'),
					'experience' => $this->input->post('experience'),
					'objective' => $this->input->post('objective'),
					'summary' => $this->input->post('summary'),
					'role' => $this->input->post('role'),
					);
		if($_POST['photo_name'])
		{
			$user_id=$this->input->post('user_id');
			$name =$this->input->post('photo_name').$this->input->post('photo_ext');
			$new_name=$user_id.$this->input->post('photo_ext');
			if(!file_exists(FCPATH.$this->config->item('path_profile_img').$user_id))
				 mkdir(FCPATH.$this->config->item('path_profile_img').$user_id);
			rename(FCPATH.$this->config->item('path_temp_img').$name,FCPATH.$this->config->item('path_profile_img').$user_id.'/'.$new_name);
			$data['photo']=$new_name;
		}
		
		$this->user->userUpdate($data,$this->input->post('user_id'));
		$msg=array('error'=>'Profile updated successfully.');
		$this->userList();
	}
}

}//class end
?>