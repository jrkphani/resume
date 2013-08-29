<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Onlineresume extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->current_user=$this->session->userdata('logged_in');
	}

	function index()
	{
		redirect('my404');
	}

	function makeOnline()
	{
		$this->load->model('onlineresume_model');
		$where=array('user_id' => $this->current_user['id']);
		
		if($this->onlineresume_model->checkAvail('about',$where))
		{
			$values=array('online' => '1');
			if($this->onlineresume_model->toggle_online($values,$where))
			{
				$data['success']='yes';
				$data['id_encrypt']=urlencode($this->current_user['id_encrypt']);
			}
			else
				$data['success']='no';
		}
		else
			$data['success']='no_resume';
		$result['resultset']=$data;
		$this->load->view('json',$result);
	}

	function view(){
		$this->load->helper('file');
		$this->load->model('onlineresume_model');
		$id_encrypt = ($this->uri->segment(3)) ? urldecode($this->uri->segment(3)) : NULL;
		$user_id=$this->onlineresume_model->getUserID($id_encrypt);

		if($user_id)
		{
		$where=array('user_id' => $user_id);

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

		$select=array('id','title','date','description');
		$result3=$this->onlineresume_model->getDetails($select,'awards',$where);
		$awards = array(
			'title'=>$result3[0]['title'],
			'date'=>$result3[0]['date'],
			'description'=>$result3[0]['description']
		);

		$select=array('id','name','designation','date');
		$result4=$this->onlineresume_model->getDetails($select,'company',$where);
		$company=array(
			'name' => $result4[0]['name'],
			'designation' => $result4[0]['designation'],
			'date' => $result4[0]['date']
		);

		$select=array('id','institution','certification','date','score');
		$result5=$this->onlineresume_model->getDetails($select,'education',$where);
		$education = array(
			'institution'=> $result5[0]['institution'],
			'certification' => $result5[0]['certification'],
			'date'=> $result5[0]['date'],
			'score'=> $result5[0]['score']
		);

		$select=array('id','name','role','description','url');
		$result6=$this->onlineresume_model->getDetails($select,'project',$where);
		$project=array(
			'name' => $result6[0]['name'],
			'role' => $result6[0]['role'],
			'url' => $result6[0]['url'],
			'description' => $result6[0]['description']
		);

		$select=array('id','name','efficiency');
		$result7=$this->onlineresume_model->getDetails($select,'skill',$where);
		$skill=array(
			'name' => $result7[0]['name'],
			'efficiency' => $result7[0]['efficiency']
		);

		$select=array('id','name');
		$result8=$this->onlineresume_model->getDetails($select,'otherskill',$where);
		$otherSkills['name']=$result8[0]['name'];

		$post_array['about']=$about;
		$post_array['awards']=$awards;
		$post_array['skill']=$skill;
		$post_array['company']=$company;
		$post_array['project']=$project;
		$post_array['education']=$education;
		$post_array['template']=$result1[0]['Template'];
		$post_array['otherSkills']=$otherSkills;
		//$post_array['registeronly']='';
		$post_array['user_detail']=$user_detail;

		$preview_data = $this->load->view('T/'.$post_array['template'].'_html',$post_array,true);

		$file_name=$user_detail['first_name']."_".$user_detail['last_name'];
		$html_path=FCPATH.$this->config->item('path_temp_file').$file_name.'.html';
		
		if(write_file($html_path, $preview_data))
		{
			$pdf_path=FCPATH.$this->config->item('path_temp_file').$file_name.'.pdf';	// path for where generated pdf file have to save
			$wk_path=FCPATH.'application/third_party/./wkhtmltopdf-i386';	// wkhtmlpdf file path
			$comm=$wk_path.' '.$html_path.' '.$pdf_path;
			
			shell_exec($comm);	// Exececute command on terminal
			unlink($html_path);	// Delete html file after convertion
			//$content=file_get_contents($pdf_path);
			//unlink($pdf_path);	// Delete pdf file after read

			$data['content']="http://localhost/resume/tmp/files/".$file_name.'.pdf';//$pdf_path;						
		}
		else
		{
			$data['msg']='Internal Error. Please try again later.';
		}
		}
		else
		{
			redirect('my404');
		}
		$data['view_page'] = 'online_resume';
		$this->load->view('template', $data);
	}

	function disableOnline()
	{
		$this->load->model('onlineresume_model');
		$where=array('user_id' => $this->current_user['id']);
		$values=array('online' => '0');
		
		if($this->onlineresume_model->toggle_online($values,$where))
			$data['success']='yes';
		else
			$data['success']='no';
		$result['resultset']=$data;
		$this->load->view('json',$result);
	}
}
?>