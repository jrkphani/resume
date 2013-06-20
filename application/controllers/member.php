<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Member extends CI_Controller {
function __construct()
{
	parent::__construct();
	$this->current_user=$this->session->userdata('logged_in');
	if($this->current_user['flag']==1) //check for profile complition
		redirect('profile', 'refresh');
	if($this->current_user['role']!='member' && $this->current_user['role']!='admin')
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
 	if($this->member_model->saveSearchList($insert))
 	{
 		$data['resultset']['success']=1;
 		$data['resultset']['id']=$this->member_model->lastInsertID();
 	}
 	else
 	{
 		$data['resultset']['success']=-1;
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

	$result=$this->resume_model->basic_details($id);
	$data['result2']=$this->resume_model->skill_details($id);
	$data['result3']=$this->resume_model->company_details($id);
	$data['result4']=$this->resume_model->project_details($id);
	$data['result5']=$this->resume_model->education_details($id);
	$data['user_info']=$result[0];
	$data['resume_id']=$id;
	$data['selected']=$this->member_model->checkSelected($this->current_user['id'],$id);
	
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
