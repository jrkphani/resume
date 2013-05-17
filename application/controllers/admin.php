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
 	//$strID = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
	$strID=NULL;
 	if(!$strID)
 	{
 		$str = $this->input->get_post('search', TRUE);
	 	if($str)
	 	{
	 		$this->load->model('admin_model');/*print_r($str);*/
		 	$data['result']=$this->admin_model->searchSkills($userdata['limit'],$str);
		 	$data['view_page'] = 'searchList';
		 	$data['strID'] = NULL;
		 	$data['searchStr'] = $str;
			$data['pagi']=$this->pagination($str);
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
 function pagination($str)
 {
	$this->load->library('jquery_pagination');
	$config['div'] = '#search-content';
	$config['additional_param']  = 'serialize_form()';
	$config['base_url'] = base_url().'admin/searchSkillsAjax';
	$config['total_rows'] =  $this->admin_model->totalSearchSkills($str);
	$config['per_page'] = 2;
	$this->jquery_pagination->initialize($config);
	return $this->jquery_pagination->create_links();
 }
 function searchSkillsAjax()
 {
	$userdata=$this->session->userdata('logged_in');
	$str = $this->input->get_post('search', TRUE);
	if($str)
	{
		$this->load->model('admin_model');/*print_r($str);*/
		$data['result']=$this->admin_model->searchSkills($userdata['limit'],$str);
		$data['strID'] = NULL;
		$data['searchStr'] = $str;
		$data['pagi']=$this->pagination($str);
		$this->load->view('searchList', $data);
	}
	else
	{
		show_404();
	}
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
	$data['user_id']=$id;
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
 function user($id)
 {
	$this->load->model('resume_model');
	$result=$this->resume_model->basic_details($id);
	$data['result2']=$this->resume_model->skill_details($id);
	$data['result3']=$this->resume_model->company_details($id);
	$data['result4']=$this->resume_model->project_details($id);
	$data['result5']=$this->resume_model->education_details($id);
	
	foreach($result as $row)
		 {
			 $data['first_name']=$row['first_name'];
			 $data['last_name']=$row['last_name'];
			 $data['tag_line']=$row['tag_line'];
			 $data['secondary_email']=$row['secondary_email'];
			 $data['mobile']=$row['mobile'];
			 $data['landline']=$row['landline'];
			 $data['address']=$row['address'];
			 $data['website']=$row['website'];
			 $data['photo']=$row['photo'];
			 $data['experience']=$row['experience'];
			 $data['objective']=$row['objective'];
			 $data['summary']=$row['summary'];
		 }
	
	$data['view_page']='userView';
	$this->load->view('template',$data);
 }
}
?>