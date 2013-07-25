<?php
class Resume extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->current_user=$this->session->userdata('logged_in');
		if($this->current_user['flag']==1) //check for profile complition
			redirect('profile', 'refresh');
	}
	public  function index()
	 {
		 $data['view_page'] = 'resume';
		 $data['templateValue'] = ($this->input->post('templateValue'))?$this->input->post('templateValue'):NULL;
		 $data['templateName'] = ($this->input->post('templateName'))?$this->input->post('templateName'):'Resume';
		 if($this->current_user)
		 {
			 $this->load->model('resume_model');
			 $data['user_detail']= $this->resume_model->user_detail($this->current_user['id']);
			 $data['skill']= $this->resume_model->skill($this->current_user['id']);
			 $data['company']= $this->resume_model->company($this->current_user['id']);
			 $data['project']= $this->resume_model->project($this->current_user['id']);
			 $data['education']= $this->resume_model->education($this->current_user['id']);		 
			 $data['about']= $this->resume_model->about($this->current_user['id']);
			 $data['award']= $this->resume_model->awards($this->current_user['id']);
			 $data['otherskill']= $this->resume_model->otherskill($this->current_user['id']);
			 
			 
			/* echo '<pre>';
			 print_r($data);
			die;*/
		 }
		 $this->load->view('template', $data);
	 }
}