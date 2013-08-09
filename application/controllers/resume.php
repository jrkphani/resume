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
			 
			 
			/* echo '<pre>';
			 print_r($data);
			die;*/
		 }
		 $this->load->view('template', $data);
	 }
	 function download()
	 {
		 $this->load->helper('file');
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
		 //echo "<pre>"; print_r($data['user_detail'][0]['Template']); die;
		 $preview_data = $this->load->view('T/'.$data['user_detail'][0]['Template'].'_html',$data,true);
		 
		 //$this->load->model('resume_model');
		 $user_id=$this->current_user['id'];
		 //$this->resume_model->update($user_id,$user_detail,$about,$awards,$skill,$otherSkills,$company,$project,$education);
		 $file_name=$user_id;
		 
		 $temp_path_html=FCPATH.$this->config->item('path_temp_file').$file_name.'.html';
		 if(!write_file($temp_path_html, $preview_data))
			{
				//Unable to write file
				$jsondata['success']='no';
				$jsondata['msg']='Internal error';
				$result['resultset']=$jsondata;
			}
			else
			{				
				// Command to execute
				$command = FCPATH."application/third_party/wkhtmltoimage-i386 --load-error-handling ignore";
				// Putting together the command for `shell_exec()`
				$ex = "$command " . $temp_path_html ." ". $temp_path_html;
				// Generate the image
				$output = shell_exec($ex);
				//remove html
				unlink($temp_path_html);
				$jsondata['success']='yes';
				$jsondata['html']=$file_name;
				$result['resultset']=$jsondata;
			}
			$this->load->view('json',$result);
		}
		else
		{
			//not loddeg in
		}
	 }
}