<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.&nbsp; User redirected to login page
    $data['errors']=validation_errors();
    $data['success']='no';
    $result['resultset']=$data;
    $this->load->view('json',$result);
     //$this->load->view('login_view');
   }
   else
   {
    $arr=$this->session->userdata('logged_in');
    /*if(!$this->user->profile_check($arr['id']))
      $data['profile_check']=FALSE;
    else
      $data['profile_check']=TRUE;*/
		$data['role']=$arr['role'];
    $data['flag']=$arr['flag'];
		$data['success']='yes';
		$result['resultset']=$data;
		$this->load->view('json',$result);
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.&nbsp; Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->user->login($username, $password);

   if($result)
   {
     $sess_array1 = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'email' => $row->email,
		 'firstname' => $row->first_name,
		 'lastname' => $row->last_name,
		 'role' => $row->role,
         'limit' => $row->limit,
         'flag' => $row->flag,
       );
     }
	 $this->session->set_userdata('logged_in', $sess_array);
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>