<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preview extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->current_user=$this->session->userdata('logged_in');
	}
	public function index()
	{
		$this->load->helper('file');
		if($postdata=$this->input->post())
		{
			
			//user_detail table data
			$user_detail=array(
			'first_name' => $this->input->post('fname'),
			'last_name' => $this->input->post('lname'),
			'designation' => $this->input->post('designation'),
			'mobile' => $this->input->post('phone'),
			'dob' => $this->input->post('dob'),
			'skype' => $this->input->post('skype'),
			'secondary_email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'married' => $this->input->post('marital'),
			'photo' => $this->input->post('photo'),
			'experience' => $this->input->post('expYr').'.'.$this->input->post('expMon'),
			'contactTitle' => $this->input->post('contactTitle')
			);
			
			//about table data
			//custom title needs to be added
			$passport_visa=array('passport'=>$this->input->post('passport'),
							'passportdate'=>$this->input->post('passportFrom').'#'.$this->input->post('passportTo'),
							'visa'=>$this->input->post('visa'),
							'visadate'=>$this->input->post('visaFrom').'#'.$this->input->post('visaTo')
							);
			$url_array=array('mylink','twitter','facebook','linkedin');
			$url_array=array_combine($url_array,$this->input->post('url'));							
			$about=array(
			'objective' => serialize(array($this->input->post('objectivesTitle'),$this->input->post('objective'))),
			'summary' => serialize(array($this->input->post('summaryTitle'),$this->input->post('summary'))),
			'compensation' => serialize(array($this->input->post('current'),$this->input->post('expected'))),
			'website' => serialize($url_array),
			'mystrength' => $this->input->post('otherSkillsBrief'),
			'passport_visa' => serialize($passport_visa),
			'intresttitle' => serialize($this->input->post('intresttitle')),
			'intrestDesc' => serialize($this->input->post('intrestDesc')),
			'intrestUrl' => serialize($this->input->post('intrestUrl')),
			);
			
			
			//awards table data
			$count=0;
			$awdFrom = $this->input->post('awdFrom');
			$awdTo = $this->input->post('awdTo');
			$awdtitle = $this->input->post('awdtitle');
			$award_date=array();
			foreach($awdtitle as $single)
			{
				$award_date[] = $awdFrom[$count].'#'.$awdTo[$count];
			}
			$awards = array(
			'title'=>serialize($awdtitle),
			'date'=>serialize($award_date),
			'description'=>serialize($this->input->post('awdDesc')),
			'update_date'=>'now()'
			);

			//company table data
			$count=0;
			$cmpnyFrom = $this->input->post('cmpnyFrom');
			$cmpnyTo = $this->input->post('cmpnyTo');
			$cmpnyName = $this->input->post('cmpnyName');
			$cmpny_date=array();
			foreach($cmpnyName as $single)
			{
				$cmpny_date[] = $cmpnyFrom[$count].'#'.$cmpnyTo[$count];
			}
			$company=array(
			'name' => serialize($cmpnyName),
			'designation' => serialize($this->input->post('cmpnyDesg')),
			'date' => serialize($cmpny_date),
			'update_date'=>'now()'
			);
			
			
			//education table data
			$count=0;
			$eduFrom = $this->input->post('eduFrom');
			$eduTo = $this->input->post('eduTo');
			$eduInst = $this->input->post('eduInst');
			$edu_date=array();
			foreach($eduInst as $single)
			{
				$edu_date[] = $eduFrom[$count].'#'.$eduTo[$count];
			}
			$education = array(
			'institution'=>serialize($eduInst),
			'certification' => serialize($this->input->post('eduCert')),
			'date'=>serialize($edu_date),
			'score'=>serialize($this->input->post('eduScore')),
			'update_date'=>'now()'
			);
			
			//project table data
			$project=array(
			'name' => serialize($this->input->post('projName')),
			'role' => serialize($this->input->post('projRole')),
			'url' => serialize($this->input->post('projUrl')),
			'description' => serialize($this->input->post('projDesc')),
			'update_date'=>'now()'
			);
			
			
			//skill table data
		$skill=array(
			'name' => serialize($this->input->post('skillName')),
			'efficiency' => serialize($this->input->post('skillEff')),
			'update_date'=>'now()'
		);

	$otherSkills['name']=serialize($this->input->post('otherSkills'));
	
	$template= $this->input->post('template');
		
		$post_array['user_detail']=$user_detail;
		$post_array['about']=$about;
		$post_array['awards']=$awards;
		$post_array['skill']=$skill;
		$post_array['company']=$company;
		$post_array['project']=$project;
		$post_array['education']=$education;
		$post_array['template']=$template;
		$post_array['otherSkills']=$otherSkills;
		$preview_data = $this->load->view('T/'.$postdata['template'].'_html',$post_array,true);
		
			if($this->current_user)
			{
				//user logged in
				$this->load->model('resume_model');
				$user_id=$this->current_user['id'];
				$this->resume_model->update($user_id,$user_detail,$about,$awards,$skill,$otherSkills,$company,$project,$education);
				$file_name=$user_id;
				$temp_path_html=FCPATH.$this->config->item('path_temp_file').$file_name.'.html';
			}
			else
			{
				//user not logged in
				$this->session->set_userdata('resume_data',$post_array);
				$file_name=mt_rand().time();
				$temp_path_html=FCPATH.$this->config->item('path_temp_file').$file_name.'.html';
				$temp_path_img=FCPATH.$this->config->item('path_temp_img').$file_name.'.jpg';
				
				//$style="<style>body { background-image:url('".FCPATH."assets/img/digitalchakra_logo.jpg'); } </style>";
				$style="";
				$preview_data = $style.$preview_data;
				
			}
			if(!write_file($temp_path_html, $preview_data))
			{
				//Unable to write file
				$data['success']='no';
				$data['msg']='Internal error';
				$result['resultset']=$data;
			}
			else
			{
				$data['image']='no';
				if(!$this->current_user)
				{					
					// Command to execute
					$command = FCPATH."application/third_party/wkhtmltoimage-i386 --load-error-handling ignore";
					
					// Putting together the command for `shell_exec()`
					$ex = "$command " . $temp_path_html ." ". $temp_path_img;
					
					// Generate the image
					$output = shell_exec($ex);
				
					//remove html
					unlink($temp_path_html);
					
					
					//set returning image type yes
					$data['image']='yes';
				}
				$data['success']='yes';
				$data['html']=$file_name;
				$result['resultset']=$data;
			}
			$this->load->view('json',$result);
		}
		else
		{
			redirect('home', 'refresh');	
		}
	}
	function page()
	{
		//preview inside application
		$this->load->helper('file');
		$html = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
		if($this->current_user)
		{
			$content = read_file(FCPATH.$this->config->item('path_temp_file').$html.".html");
		}
		else
		{
			$content = '<img src="'.base_url($this->config->item('path_temp_img').$html.'.jpg').'" >';
		}
		$data['html']=$content;
		$data['link']=$html;
		$data['user_id']=$this->current_user['id'];
		$data['view_page'] = 'preview';
		//$this->load->view('template', $data);
		$this->load->view('preview',$data);	
	}
	function resume()
	{
		//online link for user
		$this->load->helper('file');
		$data['link'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
		$data['view_page'] = 'onlinePreview';
		$this->load->view('template', $data);
		//$this->load->view('onlinePreview',$data);	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
