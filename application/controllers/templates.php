<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Templates extends CI_Controller {

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
	function __construct()
	{
		parent::__construct();
		$this->load->model('templates_model');
	}
	function index()
	{
		$data['view_page'] = 'templates';
		$data['result']=$this->templates_model->get_templates();
		$this->load->view('template', $data);
	}
	function add_star()
	{
		$template=$this->input->post('template');
		$score=$this->input->post('score');
		$this->current_user=$this->session->userdata('logged_in');

		if($this->current_user)
		{
			$check = array('template_id' => $template, 'user_id' => $this->current_user['id']);
			if($this->templates_model->check_stared($check)>0)
				$data['msg']='Sorry, you are already rated this template.';
			else
			{
				$insert = array('template_id' => $template,'user_id' => $this->current_user['id'],'rate' => $score);
				if($this->templates_model->add_star($insert))
					$data['msg']='success';
				else
					$data['msg']='Internal error, Please try agian!.';
			}
		}
		else
			$data['msg']='Please sigin to rate templates.';
		$result['resultset']=$data;
		$this->load->view('json',$result);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */