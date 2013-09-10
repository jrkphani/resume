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
			
			if($this->input->post('cusContactTitle'))
			{
				$contactTitle = $this->input->post('cusContactTitle');
			}
			else
			{
				$contactTitle = $this->input->post('contactTitle');
			}
			if(($this->input->post('dobMonth')) && ($this->input->post('dobMonth')) && ($this->input->post('dobMonth')))
			$dob = $this->input->post('dobMonth').'-'.$this->input->post('dobDay').'-'.$this->input->post('dobYear');
			else
			$dob=NULL;
			$marri_status=($this->input->post('marital')!=NULL) ? $this->input->post('marital') : NULL;
			$user_detail=array(
			'first_name' => $this->input->post('fname'),
			'last_name' => $this->input->post('lname'),
			'designation' => $this->input->post('designation'),
			'mobile' => $this->input->post('phone'),
			'dob' => $dob,
			'skype' => $this->input->post('skype'),
			'secondary_email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'married' => $marri_status,
			'photo' => $this->input->post('photo'),
			'experience' => $this->input->post('expYr').'.'.$this->input->post('expMon'),
			'contactTitle' => $contactTitle,
			'Template' => $this->input->post('template')
			);
			
			//about table data
			if($this->input->post('cusSummaryTitle'))
			{
				$summaryTitle =$this->input->post('cusSummaryTitle');
			}
			else
			{
				$summaryTitle =$this->input->post('summaryTitle');
			}
			if($this->input->post('cusObjectivesTitle'))
			{
				$objectivesTitle =$this->input->post('cusObjectivesTitle');
			}
			else
			{
				$objectivesTitle =$this->input->post('objectivesTitle');
			}
			
			if(($this->input->post('passportMonth')) && ($this->input->post('passportYear')))
			$passportdate=$this->input->post('passportMonth').'-'.$this->input->post('passportYear');
			else
			$passportdate=NULL;
			
			if(($this->input->post('visaMonth')) && ($this->input->post('visaYear')))
			$visadate=$this->input->post('visaMonth').'-'.$this->input->post('visaYear');
			else
			$visadate=NULL;
			
			$passport_visa=array('passport'=>$this->input->post('passport'),
							'passportTo'=>$passportdate,
							'visa'=>$this->input->post('visa'),
							'visaTo'=>$visadate
							);
			$url_array=array('mylink','linkedin','twitter','facebook');
			$url_array=array_combine($url_array,$this->input->post('url'));							
			$about=array(
			'objective' => serialize(array($objectivesTitle,$this->input->post('objective'))),
			'summary' => serialize(array($summaryTitle,$this->input->post('summary'))),
			'compensation' => serialize(array($this->input->post('current'),$this->input->post('expected'),$this->input->post('currency'))),
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
				$count++;
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
				$count++;
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
				$count++;
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

	//	Recommendation start
	$rec_emails=$this->input->post('rec_emails');
	$rec_message=$this->input->post('rec_message');

	/*
	$recommend_array = array();
	if($rec_emails)
	{
		foreach ($rec_emails as $rec_email) {
			$rec_email=explode(',',$rec_email);
			array_push($recommend_array, $rec_email);
		}
	}*/

	$recommendation=array(
		//'emails' => serialize($recommend_array),
		'emails' => serialize($rec_emails),
		'content' => serialize($rec_message)
	);

	//	Recommendation end
	
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
		$post_array['registeronly']=$this->input->post('registeronly');
		//$preview_data = $this->load->view('T/'.$postdata['template'].'_html',$post_array,true);
		
			if($this->current_user)
			{
				//user logged in
				$this->load->model('resume_model');

				$select=array('emails','about_friend','reply');
				$where=array('user_id' =>$this->current_user['id'] , 'status' => '1');
				$result_rec=$this->resume_model->getDetails($select,'recommendation',$where);
				$post_array['recommendation']=$result_rec;

				$preview_data = $this->load->view('T/'.$postdata['template'].'_html',$post_array,true);
				$user_id=$this->current_user['id'];
				$id_encrypt=$this->current_user['id_encrypt'];
				$file_name=$user_id;
				if($post_array['registeronly'])
				{
					$this->resume_model->update($user_id,$user_detail,$about,$awards,$skill,$otherSkills,$company,$project,$education);
					$this->recommend_mail($rec_emails,$rec_message);	//	Recommendation
					$data['html']=$file_name;
					$data['image']='no';
				}
				else
				{
					$data['image']='yes';
				}
				$temp_path_html=FCPATH.$this->config->item('path_temp_file').$file_name.'.html';
				$temp_path_img=FCPATH.$this->config->item('path_temp_img').$file_name.'.jpg';
				if(!write_file($temp_path_html, $preview_data))
					{
						//Unable to write file
						$data['success']='no';
						$data['msg']='Internal error';
						$result['resultset']=$data;
					}
					else
					{
						// Command to execute
							$command = FCPATH."application/third_party/wkhtmltoimage-i386 --load-error-handling ignore";
							
							// Putting together the command for `shell_exec()`
							$ex = "$command " . $temp_path_html ." ". $temp_path_img;
							
							// Generate the image
							$output = shell_exec($ex);
						$data['success']='yes';
						$data['html']=urlencode($id_encrypt);
						$result['resultset']=$data;
					}
				$result['resultset']=$data;
			}
			else
			{
				//user not logged in
				$preview_data = $this->load->view('T/'.$postdata['template'].'_html',$post_array,true);
				$post_array['recommendation']=$recommendation;
				$this->session->set_userdata('resume_data',$post_array);
				
					$file_name=mt_rand().time();
					$temp_path_html=FCPATH.$this->config->item('path_temp_file').$file_name.'.html';
					$temp_path_img=FCPATH.$this->config->item('path_temp_img').$file_name.'.jpg';
					
					//$style="<style>body { background-image:url('".FCPATH."assets/img/digitalchakra_logo.jpg'); } </style>";
					$style='<span style="position: absolute; margin: 0 auto;
 width: 100%; height: 100%; display: block;
 background: transparent url('.base_url("assets/img/ezcv.png").') center top repeat-Y;
"></span>';
					//$style="";
					$preview_data = $style.$preview_data;
					if(!write_file($temp_path_html, $preview_data))
					{
						//Unable to write file
						$data['success']='no';
						$data['msg']='Internal error';
						$result['resultset']=$data;
					}
					else
					{			
							// Command to execute
							$command = FCPATH."application/third_party/wkhtmltoimage-i386 --load-error-handling ignore";
							
							// Putting together the command for `shell_exec()`
							$ex = "$command " . $temp_path_html ." ". $temp_path_img;
							
							// Generate the image
							$output = shell_exec($ex);
							if(!$this->current_user)
							{
							//remove html
							unlink($temp_path_html);
							}
							
							//set returning image type yes
						$data['image']='yes';
						$data['success']='yes';
						$data['html']=$file_name;
						$result['resultset']=$data;
					}			
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
		$this->load->model('user');
		$id_encrypt = ($this->uri->segment(3)) ? urldecode($this->uri->segment(3)) : NULL;
		$html = $this->user->get_id($id_encrypt);
		if($this->current_user)
		{
			//$content = read_file(FCPATH.$this->config->item('path_temp_file').$html.".html");
			$content = '<img style="width: 790px;" src="'.base_url($this->config->item('path_temp_img').$html.'.jpg?').time().'" >';
		}
		else
		{
			$html=$id_encrypt;
			$content = '<img style="width: 790px;" src="'.base_url($this->config->item('path_temp_img').$html.'.jpg?').time().'" >';
		}
		$data['html']=$content;
		$data['link']=$html;
		$data['user_id']=$this->current_user['id'];
		$data['view_page'] = 'preview';
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

	//	Recommendation start
	function recommend_mail($rec_emails,$rec_message)
	{
		$this->load->model('resume_model');

		// Initialize mail
		$this->load->library('email');
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype']='html';
		$from_name=$this->current_user['firstname'].' '.$this->current_user['lastname'];
		$this->email->initialize($config);
		$this->email->from($this->current_user['email'], $from_name);
		
		if(!$this->resume_model->check_avail($this->current_user['id'],$rec_emails))	// Check is already referred
		{
			foreach($rec_emails as $keys => $to_emails)
			{
				if($to_emails)	// Check emails is available
				{
					$update=array(
						'user_id' => $this->current_user['id'],
						'content' => $rec_message[$keys],
						'status' => '0'
					);
					/* //Use this for multible comma separated emails
					foreach ($to_emails as $to_email)
					{
						$to_email=trim($to_email);
					*/
						$to_email=trim($to_emails);
						if(filter_var($to_email, FILTER_VALIDATE_EMAIL))	// Check valid email
						{
								$update['emails']=$to_email;
								$insert_id=$this->resume_model->add_recommendation($update);	// Add recommendations
								$this->email->to($to_email);
								$this->email->subject($from_name.' asks you to recommend his/ her self');
								$message=nl2br($rec_message[$keys]).'<br /><br />Please click on following link, to leave your feedback about him/ her.<br /><a href="'.base_url('recommendation/index/'.$insert_id.'/'.urlencode($to_email)).'">Reply your Feedback</a><br /><br />Regards<br />EZCV';
								$this->email->message($message);
								$this->email->send();
						}
					/*}*/
				}
			}
		}
	}
	//	Recommendation end
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
