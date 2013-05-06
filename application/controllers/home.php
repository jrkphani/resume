<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public  function index()
	 {
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['email'] = $session_data['email'];
		 $data['view_page'] = 'home';
		 
		 $this->load->model('user');
		 $result=$this->user->exist_details($session_data['id']);
		 foreach($result as $row)
		 {
			 $data['first_name']=$row['first_name'];
			 $data['last_name']=$row['last_name'];
			 $data['secondary_email']=$row['secondary_email'];
			 $data['mobile']=$row['mobile'];
			 $data['landline']=$row['landline'];
			 $data['address']=$row['address'];
			 $data['website']=$row['website'];
			 $data['photo']=$row['photo'];
		 }
		 
		 $this->load->view('template', $data);
		 //$this->load->view('select_template');
	   }
	   else
	   {
		 //If no session, redirect to login page
		 redirect('login', 'refresh');
	   }
	 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   //session_destroy();
   $this->session->sess_destroy();
   redirect('login', 'refresh');
 }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */