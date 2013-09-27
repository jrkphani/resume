<?php
class Resume extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->current_user=$this->session->userdata('logged_in');
		if($this->current_user['flag']==1) //check for profile complition
			redirect('profile', 'refresh');
		if(($this->current_user['role']=='admin') || ($this->current_user['role']=='member'))
			redirect('my404');
	}
	public  function index()
	 {
		 $data['view_page'] = 'resume';
		 $this->load->model('templates_model');
		 $data['result']=$this->templates_model->get_templates();
		 $data['templateValue'] = ($this->input->post('templateValue'))?$this->input->post('templateValue'):0;
		 $data['templateName'] = array(0=>'Resume',
							'T1'=>'Spring Bloom','T2'=>'White Citadel',
							'T3'=>'Window View','T4'=>'Pyramid Point');
		 $data['dateMonth']= array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
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
			 $data['recommendation']= $this->resume_model->get_allrecommendation($this->current_user['id']);
			 
			 $data['logged_in']= $this->current_user['id'];
			/* echo '<pre>';
			 print_r($data);
			die;*/
		 }
		 $this->load->view('template', $data);
	 }
}