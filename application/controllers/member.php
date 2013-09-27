<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Member extends CI_Controller {
function __construct()
{
	parent::__construct();
	$this->current_user=$this->session->userdata('logged_in');
	if($this->current_user['flag']==1) //check for profile complition
		redirect('profile', 'refresh');
	if($this->current_user['role']!='member')
		redirect('login', 'refresh');
}

function index()
{
	$this->searchResume();
}

function searchResume()
{
	$this->load->model('member_model');
	$data['searchList']=$this->member_model->loadSearchList($this->current_user['id']);
	$data['view_page'] = 'searchResume';
	$this->load->view('template', $data);
}

function searchSkills()
{
	$str=$this->input->post('search');
	$this->load->model('member_model');/*print_r($str);*/
	$data['result']=$this->member_model->searchSkills($this->current_user['limit'],$str);
	$data['view_page'] = 'searchList';
	$data['strID'] = NULL;
	$data['searchStr'] = $str;
	$data['pagi']=$this->pagination($str);
	$this->load->view('template', $data);
}

function pagination($str)
{
	$this->load->library('jquery_pagination');
	$config['div'] = '#search-content';
	$config['additional_param']  = 'serialize_form()';
	$config['base_url'] = base_url().'member/searchSkillsAjax';
	$config['total_rows'] =  $this->member_model->totalSearchSkills($str);
	$config['per_page'] = 2;
	$this->jquery_pagination->initialize($config);
	return $this->jquery_pagination->create_links();
}

function searchSkillsAjax()
{
	$strType = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
	$this->load->model('member_model');

	if($strType!='exist')
	{
		$str = $this->input->post('search');
		$data['strID'] = NULL;
	}
	else
	{
		$strID = $this->uri->segment(4);
		$result=$this->member_model->loadSearchList($this->current_user['id'],$strID);
	 	$str=explode('|', $result[0]->string);
	 	$data['strID'] = $strID;
	}

	if($str)
	{
		$data['result']=$this->member_model->searchSkills($this->current_user['limit'],$str);

		//privious search list
		$data['searchList']=$this->member_model->loadSearchList($this->current_user['id']);
		$data['view_page'] = 'searchResume';
		$data['searchStr'] = $str;
		$data['pagi']=$this->pagination($str);
		$this->load->view('searchResume', $data);
	}
	else
		redirect('my404');
}

function saveSearchList()
{
 	$str = $this->input->post('search');
 	$title = $this->input->post('title');
 	$insert= array('user_id'=>$this->current_user['id'],'title'=>$title,'string'=>$str);
	$this->load->model('member_model');

	$where = array('user_id' => $this->current_user['id'], 'title' => $title);
	if($this->member_model->checkAvail('search_skills',$where))
		$data['resultset']['success']='exist';
	else
	{
		if($this->member_model->saveSearchList($insert))
	 	{
	 		$data['resultset']['success']=1;
	 		$data['resultset']['id']=$this->member_model->lastInsertID();
	 	}
	 	else
	 	{
	 		$data['resultset']['success']=-1;
	 	}
 	}
 	
   	$this->load->view('json',$data);
}

function deleteSearchList()
{
	$strID = $this->input->post('sid');
	$this->load->model('member_model');
 	if($this->member_model->deleteSearchList($strID))
 		$data['resultset']['success']=1;
 	else
 		$data['resultset']['success']=-1;
   	$this->load->view('json',$data);
}

function viewResume($id)
{
 	$this->load->model('resume_model');
 	$this->load->model('member_model');

 	if($this->current_user['role']=='member')
	{	
		if($this->member_model->checkViewed($this->current_user['id'],$id)==FALSE)
		{
			$reached_limit=$this->member_model->getReachedLimit($this->current_user['id']);
			if($this->current_user['limit']<=$reached_limit)
			{
				redirect(base_url('member/limitReached'));
			}
			else
			{
				$this->member_model->updateLimit($this->current_user['id'],$id);
			}
		}
	}

	/*$result=$this->resume_model->basic_details($id);
	$data['result2']=$this->resume_model->skill_details($id);
	$data['result3']=$this->resume_model->company_details($id);
	$data['result4']=$this->resume_model->project_details($id);
	$data['result5']=$this->resume_model->education_details($id);
	$data['user_info']=$result[0];*/

	$where=array('user_id' => $id);
	if(!$this->member_model->checkAvail('about',$where))
	$data['avail']=false;
	else
	{
	$data['avail']=true;
	$where=array('user_id' => $id);

	$select=array('first_name','last_name','designation','dob','secondary_email','mobile','skype','address','married','photo','experience','contactTitle','Template');
	$result1=$this->resume_model->getDetails($select,'user_detail',$where);
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
	$result2=$this->resume_model->getDetails($select,'about',$where);
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
	$result3=$this->resume_model->getDetails($select,'awards',$where);
	$awards = array(
		'title'=>$result3[0]['title'],
		'date'=>$result3[0]['date'],
		'description'=>$result3[0]['description']
	);

	$select=array('name','designation','date');
	$result4=$this->resume_model->getDetails($select,'company',$where);
	$company=array(
		'name' => $result4[0]['name'],
		'designation' => $result4[0]['designation'],
		'date' => $result4[0]['date']
	);

	$select=array('institution','certification','date','score');
	$result5=$this->resume_model->getDetails($select,'education',$where);
	$education = array(
		'institution'=> $result5[0]['institution'],
		'certification' => $result5[0]['certification'],
		'date'=> $result5[0]['date'],
		'score'=> $result5[0]['score']
	);

	$select=array('name','role','description','url');
	$result6=$this->resume_model->getDetails($select,'project',$where);
	$project=array(
		'name' => $result6[0]['name'],
		'role' => $result6[0]['role'],
		'url' => $result6[0]['url'],
		'description' => $result6[0]['description']
	);

	$select=array('name','efficiency');
	$result7=$this->resume_model->getDetails($select,'skill',$where);
	$skill=array(
		'name' => $result7[0]['name'],
		'efficiency' => $result7[0]['efficiency']
	);

	$select=array('name');
	$result8=$this->resume_model->getDetails($select,'otherskill',$where);
	$otherSkills['name']=$result8[0]['name'];

	$where2=array('user_id' => $this->current_user['id'],'status'=>'1');
	$select=array('emails','about_friend','reply');
	$recommendation=$this->resume_model->getDetails($select,'recommendation',$where2);

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

	$data['resume_id']=$id;
	$data['selected']=$this->member_model->checkSelected($this->current_user['id'],$id);
	$data['content']=$preview_data;
	}
	
	$data['view_page']='viewResume';
	$this->load->view('template',$data);
}

function limitReached()
{
	$data['msg']='Your are reached max allowed limit.';
	$data['view_page']='limitReached';
	$this->load->view('template',$data);
}

function selectResume()
{
	$id=$this->input->get('id');
	$this->load->model('member_model');
	if($this->member_model->selectResume($this->current_user['id'],$id))
		$data['success']='yes';
	else
		$data['success']='no';
	$result['resultset']=$data;
    $this->load->view('json',$result);
}

function selectedResume()
{
	$this->load->model('member_model');
	$data['userlist']=$this->member_model->selectedResume($this->current_user['id']);
	$data['view_page'] = 'selectedResume';
	$this->load->view('template', $data);
}

function downloadResume($type=NULL)
{
	$this->load->model('member_model');
	$checked=$this->input->post('check');
	if($type=='custom')
	{
		$data['result']=$this->member_model->downloadResume($checked,$this->input->post('selected_fileds'));
		$data['titles']=explode('|',$this->input->post('selected_titles'));
	}
	else
	{
		$data['result']=$this->member_model->downloadResume($checked);
		$data['titles']=array('Name','Mobile','Experience');
	}

	$data['view_page']='downloadResume';
	$this->load->view('downloadResume',$data);
}

}//class end
