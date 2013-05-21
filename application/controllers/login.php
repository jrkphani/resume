<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
	$current_user=$this->session->userdata('logged_in');
	if($current_user)
	{
		if($current_user['role']=='user')
	 		redirect('home', 'refresh');
	 	else if($current_user['role']=='member')
	 		redirect('/admin', 'refresh');
	 	else if($current_user['role']=='admin')
	 		redirect('/admin/userlist', 'refresh');
	}
	else
	{
	$this->load->helper(array('form'));
	$data['view_page'] = 'login_view';
	$this->load->view('template', $data);
	}
 }
 function login()
 {
	 $this->load->view("registration.php", $data);
 }
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   //session_destroy();
   $this->session->sess_destroy();
   redirect('login', 'refresh');
 }

}

?>