
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   if(!$this->session->userdata('logged_in'))
   {
   	redirect(base_url());
   }
 }

 function index()
 {
 	$data['view_page'] = 'admin';
 	$data['searchList'] = $this->loadSearchList();
	$this->load->view('template', $data);
	 
 }
 function searchSkills()
 {
 	$strID = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
 	if(!$strID)
 	{
 		$str = $this->input->get_post('search', TRUE);
	 	if($str)
	 	{
	 		$this->load->model('admin_model');
		 	$data['result']=$this->admin_model->searchSkills($str);
		 	$data['view_page'] = 'searchList';
		 	$data['strID'] = NULL;
		 	$data['searchStr'] = $str;
		 	$this->load->view('template', $data);
	 	}
	 	else
	 	{
	 		show_404();
	 	}

 	}
 	else
 	{
 		$userdata=$this->session->userdata('logged_in');
 		$this->load->model('admin_model');
	 	$result=$this->admin_model->loadSearchList($userdata['id'],$strID);
	 	$searchStr=explode('|', $result[0]->string);
	 	$data['result']=$this->admin_model->searchSkills($searchStr);
	 	$data['view_page'] = 'searchList';
	 	$data['strID'] = $strID;
	 	$data['searchStr'] = $searchStr;
	 	$this->load->view('template', $data);

 	}
 }
  function loadSearchList()
 {
 		$userdata=$this->session->userdata('logged_in');
 		$this->load->model('admin_model');
 		return $this->admin_model->loadSearchList($userdata['id']);
	 	//$data['resultset']=$this->admin_model->loadSearchList($userdata['id']);
    	//$this->load->view('json',$data);
 }
 function saveSearchList()
 {
 	$str = $this->input->get_post('search', TRUE);
 	if($str)
 	{
 		$userdata=$this->session->userdata('logged_in');
		$this->load->model('admin_model');
	 	if($this->admin_model->saveSearchList($userdata['id'],$str))
	 	{
	 		$data['resultset']['success']=1;
	 	}
	 	else
	 	{
	 		$data['resultset']['success']=-1;
	 	}
	 	
	   	$this->load->view('json',$data);
    }
    else
 	{
 		show_404();
 	}
 }
}

?>

