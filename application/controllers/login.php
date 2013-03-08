
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
	 if($this->session->userdata('logged_in'))
	   {
		 //$session_data = $this->session->userdata('logged_in');
		 //$data['username'] = $session_data['username'];
		 //$this->load->view('home', $data);
		 redirect('tmplts', 'refresh');
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

