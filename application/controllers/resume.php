<?php
class Resume extends CI_Controller
{
	
	public function delete_exist()
	{
		$this->load->model('resume_model');
		$this->resume_model->delete_exist();
	}
	
	public function update_download()
	{
		$_POST['remove_skills'];
		$this->load->model('resume_model');
		$this->resume_model->update();
		header('location:'.$_POST['download_file']);
	}
}