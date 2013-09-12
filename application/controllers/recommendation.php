<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recommendation extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('resume_model');
		$this->current_user=$this->session->userdata('logged_in');
	}

	function index()
	{
		$id=base64_decode(urldecode($this->uri->segment(3)));
		$email_id=base64_decode(urldecode($this->uri->segment(4)));
		$result=$this->resume_model->get_recommendation($id);
		$data['msg']=NULL;

		if($result[0]['emails']!=$email_id)
			redirect('my404');

		$this->load->helper('form');
		$this->load->library('form_validation');

		$select=array('first_name','last_name');
		$where=array('user_id' => $result[0]['user_id']);
		$result2=$this->resume_model->getDetails($select,'user_detail',$where);

		$data['result']=$result;
		$data['result2']=$result2;
		$data['view_page']='recommendation';
		
		if(isset($_POST['rec_submit']))
		{
			$this->form_validation->set_rules('about', 'About you', 'trim|required|max_length[512]');
			$this->form_validation->set_rules('reply', 'Your Feedback', 'trim|required|max_length[512]');

			if ($this->form_validation->run() === TRUE)
			{
				$values=array(
					'reply' => $this->input->post('reply'),
					'about_friend'=> $this->input->post('about')
				);
				if($this->resume_model->update_recommendation($id,$values))
					$data['msg']='Your feedback updated successfully.';
			}
			$result=$this->resume_model->get_recommendation($id);
			$data['result']=$result;
			$this->load->view('template', $data);
		}
		else
			$this->load->view('template', $data);
	}

	function update()
	{
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		$values=array('status' => $status);
		if($this->resume_model->update_recommendation($id,$values))
			$data['success']='yes';
		else
			$data['success']='no';
		$result['resultset']=$data;
		$this->load->view('json',$result);
	}

	function checkavail()
	{
		$emails=$this->input->post('emails');
		if($this->resume_model->check_avail($this->current_user['id'],$emails))
			$data['success']='yes';
		else
			$data['success']='no';
		$result['resultset']=$data;
		$this->load->view('json',$result);
	}
}
?>