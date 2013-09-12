<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailresume extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->current_user=$this->session->userdata('logged_in');
	}

	function index()
	{
		if($this->current_user)
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['msg']=NULL;
			$data['success']=NULL;
			$data['view_page'] = 'mail_resume';
			$data['first_name'] = $this->current_user['firstname'];
			$data['last_name'] = $this->current_user['lastname'];

			if(isset($_POST['submit_mail']))
			{
				$this->form_validation->set_rules('email', 'Email', 'trim|required|callback_emails_check');
				$this->form_validation->set_rules('subject', 'Subject', 'trim|required|max_length[200]');
				$this->form_validation->set_rules('message', 'Message', 'trim|required|max_length[1000]');

				if ($this->form_validation->run() === TRUE)
				{
					$emails=$this->input->post('email');
					$emails=explode(',', $emails);
					$subject=$this->input->post('subject');
					//$message=nl2br($this->input->post('message'));
					$message= '<table width="820px" border="0" align="center">
									<tr bgcolor="#266a86">
										<td scope="row" style="height:126px;">
											<a href="http://ezcv.in/" style="text-decoration:none;"><img style="margin-left:20px; margin-top:3px; margin-bottom:3px;" src='.base_url("assets/img/ezcv-logo.png").' alt="EZCV" title="EZCV" width="125" height="106"/></a>
										</td>
									</tr>
									<tr>
										<td scope="row">
											<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; padding:0px 20px 5px 20px; margin-top:10px;">'.nl2br($this->input->post('message')).'</p>
										</td>
									</tr>
									<tr>
										<td scope="row">
										<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; padding:0px 20px 0px 20px; margin:0px;">Regards</p>
										<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; padding:0px 20px 10px 20px; margin:0px;"><span style="font-weight:bold;">EZCV</span> Team</p></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
									</tr>
									<tr bgcolor="#525252">
										<td scope="row">
											<p style="font-family:Arial, Helvetica, sans-serif; font-size:12px; padding:10px 20px 10px 20px; margin:0px; color:#fff;">
											&copy; copyright '.date('Y').' | <a style="color:#FFFFFF; text-decoration:underline;" href="http://ezcv.in/">EZCV</a> | All Rights Reserved
											
										</p>
										</td>
									</tr>
								</table>';

					if($pdf=$this->get_pdf())
					{
						//Mail Configuration
						$this->load->library('email');
						$config['charset'] = 'iso-8859-1';
						$config['wordwrap'] = TRUE;
						$config['mailtype']='html';
						$this->email->initialize($config);
						$this->email->from($this->current_user['email'], $this->current_user['firstname'].' '.$this->current_user['lastname']);
						
						/*$link=base_url('onlineresume/view/'.urlencode($this->current_user['id_encrypt']));
						$message=nl2br(str_ireplace("my resume","<a href='$link'>my resume</a>",$message));*/
						
						$result=TRUE;
						$this->email->attach($pdf);
						$this->email->message($message);
						$this->email->subject($subject);
						foreach ($emails as $email) {
							$this->email->subject($subject);
							$this->email->to($email);
							if(!$this->email->send())
								$result=FALSE;
						}
						unlink($pdf); //Delete pdf file after send mails
						
						if(!$result)
						{
							$data['msg']='Internal error. Please try again later.';
							$data['success']='no';						
						}
						else
						{
							$data['msg']='Your resume has been sent successfully.';
							$data['success']='yes';
						}
					}
					else
					{
						$data['msg']='Internal error. Please try again later.';
						$data['success']='no';
					}
				}
			}	
			$this->load->view('template', $data);
		}
		else
		{
			redirect('my404');
		}
	}

	function emails_check($emails)
	{
		$emails=explode(",", $emails);
		if(sizeof($emails)>1)
		{
			$this->form_validation->set_message('emails_check', 'You can give only one email.');
			return false;
		}
		foreach ($emails as $key => $value)
		{
			if(!filter_var($value, FILTER_VALIDATE_EMAIL))
			{
			    $this->form_validation->set_message('emails_check', 'Email is invalid.');
				return false;
			}
		}
	}

	function get_pdf()
	{
		$this->load->helper('file');
		$this->load->model('onlineresume_model');

		$where=array('user_id' => $this->current_user['id']);

		$select=array('first_name','last_name','designation','dob','secondary_email','mobile','skype','address','married','photo','experience','contactTitle','Template');
		$result1=$this->onlineresume_model->getDetails($select,'user_detail',$where);
		$user_detail=array(
			'first_name' => $result1[0]['first_name'],
			'last_name' => $result1[0]['last_name'],
			'designation' => $result1[0]['designation'],
			'mobile' => $result1[0]['mobile'],
			'dob' => $result1[0]['dob'],
			'skype' => $result1[0]['skype'],
			'secondary_email' => $result1[0]['secondary_email'],
			'address' => $result1[0]['address'],
			'married' => $result1[0]['married'],
			'photo' => $result1[0]['photo'],
			'experience' => $result1[0]['experience'],
			'contactTitle' => $result1[0]['contactTitle'],
			'Template' => $result1[0]['Template']
		);

		$select=array('id','compensation','objective','summary','website','mystrength','passport_visa','intresttitle','intrestDesc','intrestUrl');
		$result2=$this->onlineresume_model->getDetails($select,'about',$where);
		$about=array(
			'objective' => $result2[0]['objective'],
			'summary' => $result2[0]['summary'],
			'compensation' => $result2[0]['compensation'],
			'website' => $result2[0]['website'],
			'mystrength' => $result2[0]['mystrength'],
			'passport_visa' => $result2[0]['passport_visa'],
			'intresttitle' => $result2[0]['intresttitle'],
			'intrestDesc' => $result2[0]['intrestDesc'],
			'intrestUrl' => $result2[0]['intrestUrl']
		);

		$select=array('title','date','description');
		$result3=$this->onlineresume_model->getDetails($select,'awards',$where);
		$awards = array(
			'title'=>$result3[0]['title'],
			'date'=>$result3[0]['date'],
			'description'=>$result3[0]['description']
		);

		$select=array('name','designation','date');
		$result4=$this->onlineresume_model->getDetails($select,'company',$where);
		$company=array(
			'name' => $result4[0]['name'],
			'designation' => $result4[0]['designation'],
			'date' => $result4[0]['date']
		);

		$select=array('institution','certification','date','score');
		$result5=$this->onlineresume_model->getDetails($select,'education',$where);
		$education = array(
			'institution'=> $result5[0]['institution'],
			'certification' => $result5[0]['certification'],
			'date'=> $result5[0]['date'],
			'score'=> $result5[0]['score']
		);

		$select=array('name','role','description','url');
		$result6=$this->onlineresume_model->getDetails($select,'project',$where);
		$project=array(
			'name' => $result6[0]['name'],
			'role' => $result6[0]['role'],
			'url' => $result6[0]['url'],
			'description' => $result6[0]['description']
		);

		$select=array('name','efficiency');
		$result7=$this->onlineresume_model->getDetails($select,'skill',$where);
		$skill=array(
			'name' => $result7[0]['name'],
			'efficiency' => $result7[0]['efficiency']
		);

		$select=array('name');
		$result8=$this->onlineresume_model->getDetails($select,'otherskill',$where);
		$otherSkills['name']=$result8[0]['name'];

		$where2=array('user_id' => $this->current_user['id'],'status'=>'1');
		$select=array('emails','about_friend','reply');
		$recommendation=$this->onlineresume_model->getDetails($select,'recommendation',$where2);

		$post_array['about']=$about;
		$post_array['awards']=$awards;
		$post_array['skill']=$skill;
		$post_array['company']=$company;
		$post_array['project']=$project;
		$post_array['recommendation']=$recommendation;
		$post_array['education']=$education;
		$post_array['template']=$result1[0]['Template'];
		$post_array['otherSkills']=$otherSkills;
		//$post_array['registeronly']='';
		$post_array['user_detail']=$user_detail;

		$preview_data = $this->load->view('T/'.$post_array['template'].'_html',$post_array,true);

		$file_name=mt_rand().time();
		$html_path=FCPATH.$this->config->item('path_temp_file').$file_name.'.html';
		if(write_file($html_path, $preview_data))
		{
			$pdf_path=FCPATH.$this->config->item('path_temp_file').$this->current_user['firstname'].'_'.$this->current_user['lastname'].'_Resume.pdf';	// path for where generated pdf file have to save
			$wk_path=FCPATH.'application/third_party/./wkhtmltopdf-i386';	// wkhtmlpdf file path
			$comm=$wk_path.' '.$html_path.' '.$pdf_path;
			
			shell_exec($comm);	// Exececute command on terminal
			unlink($html_path);	// Delete html file after convertion
			return $pdf_path;	// return pdf file path	
		}
		else
			return false;
	}
}