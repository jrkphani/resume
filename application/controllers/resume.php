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
	   //if($this->session->userdata('logged_in'))
	   //{
		 $session_data = $this->session->userdata('logged_in');
		 if($session_data['flag']==1)
		 	redirect('profile', 'refresh');

		 $data['email'] = $session_data['email'];
		 $data['view_page'] = 'resume';
		 $data['templateValue'] = ($this->input->post('templateValue'))?$this->input->post('templateValue'):NULL;
		 $this->load->model('resume_model');
		 $result=$this->resume_model->basic_details($session_data['id']);
		 $data['result2']=$this->resume_model->skill_details($session_data['id']);
		 $data['result3']=$this->resume_model->company_details($session_data['id']);
		 $data['result4']=$this->resume_model->project_details($session_data['id']);
		 $data['result5']=$this->resume_model->education_details($session_data['id']);

		 $data['user_id']=($session_data['id']?$session_data['id']:NULL);
		 if(sizeof($result)==1)
		 {
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
		 }
		 else
		 {
			 $data['first_name']=NULL;
			 $data['last_name']=NULL;
			 $data['tag_line']=NULL;
			 $data['secondary_email']=NULL;
			 $data['mobile']=NULL;
			 $data['landline']=NULL;
			 $data['address']=NULL;
			 $data['website']=NULL;
			 $data['photo']=NULL;
			 $data['experience']=NULL;
			 $data['objective']=NULL;
			 $data['summary']=NULL;
		 }

		 $data['user_id']=$session_data['id'];
		 $this->load->view('template', $data);
		 //$this->load->view('select_template');
	   //}
	   /*else
	   {
		 //If no session, redirect to login page
		 redirect('login', 'refresh');
	   }*/
	 }
	public function save_download()
	{
		$this->load->library('session');
/*
		$user_detail=array(
			'first_name' => $this->input->post('fname'),
			'last_name' => $this->input->post('lname'),
			'tag_line' => $this->input->post('designation'),
			'mobile' => $this->input->post('phone'),
			'secondary_email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'website' => $this->input->post('mysite'),
			'experience' => $this->input->post('experience'),
			'objective' => $this->input->post('objective'),
			'summary' => $this->input->post('summary')
		);

		$skill=array(
			'name' => $this->input->post('skillName'),
			'title' => $this->input->post('skillTitle'),
			'effeciency' => $this->input->post('skillEff'),
			'description' => $this->input->post('skillDesc')
		);

		$company=array(
			'name' => $this->input->post('cmpnyName'),
			'designation' => $this->input->post('cmpnyDesg'),
			'from' => $this->input->post('cmpnyFrom'),
			'to' => $this->input->post('cmpnyTo'),
			'description' => $this->input->post('cmpnyDesc')
		);

		$project=array(
			'name' => $this->input->post('projName'),
			'role' => $this->input->post('projRole'),
			'from' => $this->input->post('projFrom'),
			'to' => $this->input->post('projTo'),
			'description' => $this->input->post('projDesc')
		);

		$education=array(
			'institution' => $this->input->post('eduInst'),
			'certification' => $this->input->post('eduCert'),
			'from' => $this->input->post('eduFrom'),
			'to' => $this->input->post('eduTo'),
			'score' => $this->input->post('eduScore')
		);

		$template=array(
			'photo' => $this->input->post('photo'),
			'template' => $this->input->post('template')
		);

		$this->session->set_userdata('user_detail',$user_detail);
		$this->session->set_userdata('skill',$skill);
		$this->session->set_userdata('company',$company);
		$this->session->set_userdata('project',$project);
		$this->session->set_userdata('education',$education);
		$this->session->set_userdata('template',$template);

		$data['resultset']['success']=1;
		$this->load->view('json',$data);
		* */
	}
	
	public function update_download()
	{
		if(!$this->current_user)
			redirect('home', 'refresh');
		$this->load->model('resume_model');

		//user_detail
		$user_detail['first_name']=$this->input->post('fname');
		$user_detail['last_name']=$this->input->post('lname');
		$user_detail['tag_line']=$this->input->post('designation');
		$user_detail['mobile']=$this->input->post('phone');
		$user_detail['secondary_email']=$this->input->post('email');
		$user_detail['address']=$this->input->post('address');
		$user_detail['website']=$this->input->post('mysite');
		$user_detail['experience']=$this->input->post('experience');
		$user_detail['objective']=$this->input->post('objective');
		$user_detail['summary']=$this->input->post('summary');
		$user_detail['update_date']='now()';

		//delete_skills
		$skill['todelete']=explode(',',$this->input->post('remove_skills'));

		//add skills
		$skill['name']=$this->input->post('skillName');
		$skill['title']=$this->input->post('skillTitle');
		$skill['effeciency']=$this->input->post('skillEff');
		$skill['description']=$this->input->post('skillDesc');
		$skill['id']=$this->input->post('skillNameID');


		//delete company
		$company['todelete']=explode(',',$this->input->post('remove_company'));

		//add company
		$company['name']=$this->input->post('cmpnyName');
		$company['designation']=$this->input->post('cmpnyDesg');
		$company['from']=$this->input->post('cmpnyFrom');
		$company['to']=$this->input->post('cmpnyTo');
		$company['description']=$this->input->post('cmpnyDesc');
		$company['id']=$this->input->post('cmpnyNameID');

		//delete project
		$project['todelete']=explode(',',$this->input->post('remove_project'));

		//add project
		$project['name']=$this->input->post('projName');
		$project['role']=$this->input->post('projRole');
		$project['from']=$this->input->post('projFrom');
		$project['to']=$this->input->post('projTo');
		$project['description']=$this->input->post('projDesc');
		$project['id']=$this->input->post('projNameID');

		//delete education
		$education['todelete']=explode(',',$this->input->post('remove_education'));
		
		//add education
		$education['institution']=$this->input->post('eduInst');
		$education['certification']=$this->input->post('eduCert');
		$education['from']=$this->input->post('eduFrom');
		$education['to']=$this->input->post('eduTo');
		$education['score']=$this->input->post('eduScore');
		$education['id']=$this->input->post('eduInstID');

		$this->resume_model->update($this->current_user['id'],$user_detail,$skill,$company,$project,$education);
		/*header('location:'.$_POST['download_file']);*/
	}

	function makeOnline()
	{
		$user_id=$_GET['user_id'];
		$img=$_GET['img'];
		$img_to=FCPATH.$this->config->item('path_profile_img').$user_id.'/'.$user_id.'.html';

		if(!file_exists(FCPATH.$this->config->item('path_profile_img').$user_id))
			 mkdir(FCPATH.$this->config->item('path_profile_img').$user_id);
		$from=FCPATH.$this->config->item('path_temp_file').$user_id.'.html';
		$to=FCPATH.$this->config->item('path_profile_img').$user_id.'/'.$user_id.'.html';
		if (copy($from, $to))
		{
			/*$file_contents = file_get_contents($to);
			$file_contents = str_replace($img,"http://www.mom2momkc.com/images/add_icon.gif",$file_contents);
			file_put_contents($to,$file_contents);*/
    		echo 'Now your resume will avail on online.';
    	}
    	else
    		echo 'Internal Error.';
	}
}