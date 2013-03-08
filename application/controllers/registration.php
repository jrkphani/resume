
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
	 if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['username'];
		 $this->load->view('home', $data);
	   }
	   else
	   {
		$this->load->library('form_validation');
		  // field name, error message, validation rules
		  $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[2]|max_length[20]|xss_clean');
		  $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[1]|max_length[20]|xss_clean');
		  $this->form_validation->set_rules('email_address', 'Email', 'trim|required|valid_email');
		  $this->form_validation->set_rules('pass_word', 'Password', 'trim|required|min_length[4]|max_length[32]');
		  //$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

		  if($this->form_validation->run() == FALSE)
		  {
			$data['errors']=validation_errors();
			$data['success']='no';
			echo json_encode($data);
			exit(0);
		  }
		  else
		  {
			$this->load->model('user');
			if($this->user->check_user())
			{
				$this->user->add_user();
				$data['success']='yes';
				echo json_encode($data);
				exit(0);
				//$this->load->view('login_view');
				//redirect('home', 'refresh');
			}
			else
			{
				$data['errors']="eamil is not available";
				$data['success']='no';
				echo json_encode($data);
				exit(0);
			}
		   
		  
		  }
	   }
   
 }
 function activation()
 {
	 $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
	 $code = ($this->uri->segment(4)) ? $this->uri->segment(4) : NULL;
	 if(($code) && ($id) &&  strlen($code)>2)
	 {
		 $this->load->model('user');
		 if($this->user->activate_user($id,$code))
		 {
			 echo "success  view page ";
			 exit(0);
		 }
		 else
		 {
			 redirect('login', 'refresh');
		 }
	 }
	 else
	 {
		 redirect('login', 'refresh');
	 }
 }

}

?>

