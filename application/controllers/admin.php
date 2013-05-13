
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
	$this->load->view('template', $data);
	 
 }
 function searchSkills()
 {
 	//$str = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
 	$str = $this->input->get_post('search', TRUE);
 	//print_r($str); die;
 	if($str)
 	{
 		$this->load->model('admin_model');
	 	$data['result']=$this->admin_model->searchSkills($str);
	 	$data['view_page'] = 'searchList';
	 	$this->load->view('template', $data);
 	}
 	else
 	{
 		show_404();
 	}
 }
}

?>

