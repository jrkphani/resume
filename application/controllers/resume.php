<?php
class Resume extends CI_Controller
{
	
	/*public function delete_exist()
	{
		$this->load->model('resume_model');
		$this->resume_model->delete_exist();
	}*/
	
	public function update_download()
	{
		$userdata=$this->session->userdata('logged_in');
		$this->load->model('resume_model');

		//user_detail
		$user_detail['first_name']=$this->input->post('fname');
		$user_detail['last_name']=$this->input->post('lname');
		$user_detail['tag_line']=$this->input->post('designation');
		$user_detail['mobile']=$this->input->post('phone');
		$user_detail['secondary_email']=$this->input->post('email');
		$user_detail['address']=$this->input->post('address');
		$user_detail['website']=$this->input->post('mysite');
		$user_detail['experience']=$this->input->post('experience');
		$user_detail['objective']=$this->input->post('objective');
		$user_detail['summary']=$this->input->post('summary');
		$user_detail['update_date']='now()';

		//delete_skills
		$skill['todelete']=explode(',',$this->input->post('remove_skills'));

		//add skills
		$skill['name']=$this->input->post('skillName');
		$skill['title']=$this->input->post('skillTitle');
		$skill['effeciency']=$this->input->post('skillEff');
		$skill['description']=$this->input->post('skillDesc');
		$skill['id']=$this->input->post('skillNameID');


		//delete company
		$company['todelete']=explode(',',$this->input->post('remove_company'));

		//add company
		$company['name']=$this->input->post('cmpnyName');
		$company['designation']=$this->input->post('cmpnyDesg');
		$company['from']=$this->input->post('cmpnyFrom');
		$company['to']=$this->input->post('cmpnyTo');
		$company['description']=$this->input->post('cmpnyDesc');
		$company['id']=$this->input->post('cmpnyNameID');

		//delete project
		$project['todelete']=explode(',',$this->input->post('remove_project'));

		//add project
		$project['name']=$this->input->post('projName');
		$project['role']=$this->input->post('projRole');
		$project['from']=$this->input->post('projFrom');
		$project['to']=$this->input->post('projTo');
		$project['description']=$this->input->post('projDesc');
		$project['id']=$this->input->post('projNameID');

		//delete education
		$education['todelete']=explode(',',$this->input->post('remove_education'));
		
		//add education
		$education['institution']=$this->input->post('eduInst');
		$education['certification']=$this->input->post('eduCert');
		$education['from']=$this->input->post('eduFrom');
		$education['to']=$this->input->post('eduTo');
		$education['score']=$this->input->post('eduScore');
		$education['id']=$this->input->post('eduInstID');

		$this->resume_model->update($userdata['id'],$user_detail,$skill,$company,$project,$education);
		header('location:'.$_POST['download_file']);
	}
}