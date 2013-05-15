<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

 function __construct()
 {
	parent::__construct();
	$current_user=$this->session->userdata('logged_in');
	if($current_user['role']!='admin')
	{
		redirect(base_url());
	}
 }

 function index()
 {
 	$userdata=$this->session->userdata('logged_in');
 	$data['view_page'] = 'admin';
 	$data['searchList'] = $this->loadSearchList($userdata['id']);
	$this->load->view('template', $data);
	 
 }
 function searchSkills()
 {
 	$userdata=$this->session->userdata('logged_in');
 	$strID = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
 	if(!$strID)
 	{
 		$str = $this->input->get_post('search', TRUE);
	 	if($str)
	 	{
	 		$this->load->model('admin_model');
		 	$data['result']=$this->admin_model->searchSkills($userdata['limit'],$str);
		 	$data['view_page'] = 'searchList';
		 	$data['strID'] = NULL;
		 	$data['searchStr'] = $str;
		 	$this->load->view('template', $data);
	 	}
	 	else
	 	{
	 		show_404();
	 	}

 	}
 	else
 	{
 		$this->load->model('admin_model');
	 	$result=$this->admin_model->loadSearchList($userdata['id'],$strID);
	 	$searchStr=explode('|', $result[0]->string);
	 	$data['result']=$this->admin_model->searchSkills($userdata['limit'],$searchStr);
	 	$data['view_page'] = 'searchList';
	 	$data['strID'] = $strID;
	 	$data['searchStr'] = $searchStr;
	 	$this->load->view('template', $data);

 	}
 }
  function loadSearchList()
 {
 		$userdata=$this->session->userdata('logged_in');
 		$this->load->model('admin_model');
 		return $this->admin_model->loadSearchList($userdata['id']);
	 	//$data['resultset']=$this->admin_model->loadSearchList($userdata['id']);
    	//$this->load->view('json',$data);
 }
 function saveSearchList()
 {
 	$str = $this->input->get_post('search', TRUE);
 	if($str)
 	{
 		$userdata=$this->session->userdata('logged_in');
		$this->load->model('admin_model');
	 	if($this->admin_model->saveSearchList($userdata['id'],$str))
	 	{
	 		$data['resultset']['success']=1;
	 	}
	 	else
	 	{
	 		$data['resultset']['success']=-1;
	 	}
	 	
	   	$this->load->view('json',$data);
    }
    else
 	{
 		show_404();
 	}
 }
 function deleteSearchList()
 {
 	$strID = $this->input->get_post('sid', TRUE);
 	if($strID)
 	{
		$this->load->model('admin_model');
	 	if($this->admin_model->deleteSearchList($strID))
	 	{
	 		$data['resultset']['success']=1;
	 	}
	 	else
	 	{
	 		$data['resultset']['success']=-1;
	 	}
	 	
	   	$this->load->view('json',$data);
    }
    else
 	{
 		show_404();
 	}
 }
 function userList()
 {
 	$this->load->model('user');
 	$data['userlist']=$this->user->userList();
 	$data['view_page'] = 'userList';
 	$this->load->view('template', $data);
 }
 function edit($id)
 {
	$this->load->helper('form');
	$this->load->library('form_validation');
		
	$this->load->model('user');
	$data['userlist']=$this->user->userDetails($id);
	$data['view_page'] = 'userEdit';
	$this->load->view('template', $data);
 }
 function update()
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
			$name =$this->input->post('photo_name').$this->input->post('photo_ext');
			$new_name=$this->input->post('user_id').$this->input->post('photo_ext');
			rename('./tmp/img/'.$name,'./profile_photo/'.$new_name);
			$data['photo']=$new_name;
		}
		
		$this->user->userUpdate($data,$this->input->post('user_id'));
		$msg=array('error'=>'Profile updated successfully.');
		$this->userList();
	}
 }
}
?>