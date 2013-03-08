
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tmplts extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
		if($this->session->userdata('logged_in'))
	   {
		 $data['view_page'] = 'res_templates';
		$this->load->view('template', $data);
	   }
	   else
	   {
		   redirect('login', 'refresh');
	   }
   
}
function form()
{
	$tid = ($this->uri->segment(3)) ? $this->uri->segment(3) : NULL;
	if($this->session->userdata('logged_in'))
	   {
		$data['view_page'] = 'T/'.$tid.'_form';
		$this->load->view('template', $data);
	   }
	   else
	   {
		 redirect('login', 'refresh');
	   }
}

}

?>

