
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forget extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
	 $email = $this->input->post('username');
	 $this->load->helper('email');
	 if (valid_email($email))
	 {
		 $this->load->model('user');
		 $check_data=array('email'=>$email);
			if($result = $this->user->check_user($check_data))
			{
				$update_data= array(
							'active'=>sha1(mt_rand(10000,99999).time().$email)
						  );
				$where=array('email'=>$email);
				if($this->user->update_user($where,$update_data))
				{
					$this->load->library('email');
					#$config['protocol'] = 'sendmail';
					#$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['mailtype']='html';
					$this->email->initialize($config);
					$this->email->from('resume@digitalchakra.in', 'Digital Chakra');
					$this->email->to($email);
					#$this->email->cc('another@another-example.com');
					#$this->email->bcc('them@their-example.com');
					$this->email->subject('Verify your account @ Digitalchakra');
					$message= 'Verify your the registered account in <a href="'.base_url('forget/reset/'.$result[0]['id'].'/'.$update_data['active']).'"> Digitalchakra Resume App </a>'; 
					$this->email->message($message);
					$this->email->send();
					$data['success']='yes';
					echo json_encode($data);
					exit(0);
				}
				else
				{
					
				}
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
	 else
	 {
		 echo 'no';
	 }
 }
 function activation()
 {
	 $password = $this->input->post('password');
	 $cpassword = $this->input->post('cpassword');
	 $active = $this->input->post('acode');
	 $id = $this->input->post('uid');
	 if($password == $cpassword && strlen($password)>4)
	 {
		 $update_data=array('password'=>md5($password),'active'=>1);
		 $where=array('id'=>$id,'active'=>$active);
		 $this->load->model('user');
		 if($this->user->update_user($where,$update_data))
		 {
			 echo "success  view page ";
			 exit(0);
		 }
		 else
		 {
			$check_data=array('active'=>$active,'id'=>$id, 'error'=>'internal error');
			$this->load->view('reset',$check_data);
		 }
	 }
	 else
	 {
		 $check_data=array('active'=>$active,'id'=>$id, 'error'=>'invalid password');
		 $this->load->view('reset',$check_data);
		 //redirect('login', 'refresh');
	 }
 }
 function reset()
 {
	 $id = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
	 $code = ($this->uri->segment(4)) ? $this->uri->segment(4) : NULL;
	 if(($code) &&  strlen($code)>2)
	 {
		 $this->load->model('user');
		 $check_data=array('id'=>$id,'active'=>$code);
		 if($result = $this->user->check_user($check_data))
		 {
			$check_data['error']='';
			 $this->load->view('reset',$check_data);
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

