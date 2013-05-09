<?php
class Resume_model extends CI_model{
	public function get_userid()
	{
		$arr=$this->session->userdata('logged_in');
		return $arr['id'];
	}
	
	function basic_details($id)
	{
		$this -> db -> select('first_name,last_name,tag_line,secondary_email,mobile,landline,address,website,photo,experience,objective,summary');
		$this-> db -> from ('user_detail');
		$this->db->where('user_id',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	 
	function skill_details($id)
	{
		$this -> db -> select('id,name,sub_title,efficiency,description');
		$this-> db -> from ('skill');
		$this-> db-> where('user_id',$id);
		$query=$this-> db ->get();
		return $query -> result();
	}
	function company_details($id)
	{
		$this -> db -> select('id,name,designation,from,to,description');
		$this-> db -> from ('company');
		$this-> db-> where('user_id',$id);
		$query=$this-> db ->get();
		return $query -> result();
	}
	function project_details($id)
	{
		$this -> db -> select('id,name,role,from,to,description');
		$this-> db -> from ('project');
		$this-> db-> where('user_id',$id);
		$query=$this-> db ->get();
		return $query -> result();
	}
	function education_details($id)
	{
		$this -> db -> select('id,institution,certification,from,to,score');
		$this-> db -> from ('education');
		$this-> db-> where('user_id',$id);
		$query=$this-> db ->get();
		return $query -> result();
	}
	
	public function update()
	{
		$user_id=$this->get_userid();
		
		//update basic details
		$this->db->set('first_name', $this->input->post('fname'));
		$this->db->set('last_name', $this->input->post('lname'));
		$this->db->set('tag_line', $this->input->post('designation'));
		$this->db->set('mobile', $this->input->post('phone'));
		$this->db->set('secondary_email ', $this->input->post('email'));
		$this->db->set('address',$this->input->post('address'));
		$this->db->set('website',$this->input->post('mysite'));
		$this->db->set('experience',$this->input->post('experience'));
		$this->db->set('objective',$this->input->post('objective'));
		$this->db->set('summary',$this->input->post('summary'));
		$this->db->set('update_date','now()',FALSE);
		
		$this->db->where('user_id',$user_id);
		$this->db->update('user_detail');
		
		//delete skill
		$delete_skills=$this->input->post('remove_skills');
		if($delete_skills)
		{
			$this->db->where_in('id',explode(',',$delete_skills));
			$result=$this->db->delete('skill');
		}
		
		//update skill
		$this -> db -> select('id');
		$this-> db -> from ('skill');
		$this-> db-> where('user_id',$user_id);
		$query=$this-> db ->get();
		foreach ($query->result() as $row)
		{ 
			$this->db->set('name', $this->input->post('ex_skillName_'.$row->id));
			$this->db->set('sub_title', $this->input->post('ex_skillTitle_'.$row->id));
			$this->db->set('efficiency', $this->input->post('ex_skillEff_'.$row->id));
			$this->db->set('description', $this->input->post('ex_skillDesc_'.$row->id));
			$this->db->set('update_date', 'now()',FALSE);
			
			$this->db->where('id',$row->id);
			$this->db->update('skill');
		}
		
		//add skill
		$skill_name=$this->input->post('skillName');
		$skill_tit=$this->input->post('skillTitle');
		$skill_eff=$this->input->post('skillEff');
		$skill_desc=$this->input->post('skillDesc');

		for($i=0;$i<sizeof($skill_name);$i++)
		{
			if($skill_name[$i])
			{
				$this->db->set('user_id', $user_id);
				$this->db->set('name', $skill_name[$i]);
				$this->db->set('sub_title', $skill_tit[$i]);
				$this->db->set('efficiency ', $skill_eff[$i]);
				$this->db->set('description', $skill_desc[$i]);
				$this->db->set('status', '1');
				$this->db->set('update_date','now()',FALSE);
				$this->db->insert('skill');
			}
		}
		
		//delete company
		$delete_company=$this->input->post('remove_company');
		if($delete_company)
		{
			$this->db->where_in('id',explode(',',$delete_company));
			$result=$this->db->delete('company');
		}
		
		//update company
		$this -> db -> select('id');
		$this-> db -> from ('company');
		$this-> db-> where('user_id',$user_id);
		$query=$this-> db ->get();
		foreach ($query->result() as $row)
		{ 
			$this->db->set('name', $this->input->post('ex_cmpnyName_'.$row->id));
			$this->db->set('designation', $this->input->post('ex_cmpnyDesg_'.$row->id));
			$this->db->set('from', $this->input->post('ex_cmpnyFrom_'.$row->id));
			$this->db->set('to', $this->input->post('ex_cmpnyTo_'.$row->id));
			$this->db->set('description', $this->input->post('ex_cmpnyDesc_'.$row->id));
			$this->db->set('update_date', 'now()',FALSE);
			
			$this->db->where('id',$row->id);
			$this->db->update('company');
		}
		
		//add company
		$comp_name=$this->input->post('cmpnyName');
		$comp_desg=$this->input->post('cmpnyDesg');
		$comp_from=$this->input->post('cmpnyFrom');
		$comp_to=$this->input->post('cmpnyTo');
		$comp_desc=$this->input->post('cmpnyDesc');

		for($i=0;$i<sizeof($comp_name);$i++)
		{
			if($comp_name[$i])
			{
				$this->db->set('user_id', $user_id);
				$this->db->set('name', $comp_name[$i]);
				$this->db->set('designation', $comp_desg[$i]);
				$this->db->set('from ', $comp_from[$i]);
				$this->db->set('to', $comp_to[$i]);
				$this->db->set('description', $comp_desc[$i]);
				$this->db->set('status', '1');
				$this->db->set('update_date','now()',FALSE);
				$this->db->insert('company');
			}
		}
		
		//delete project
		$delete_project=$this->input->post('remove_project');
		if($delete_project)
		{
			$this->db->where_in('id',explode(',',$delete_project));
			$result=$this->db->delete('project');
		}
		
		//update project
		$this -> db -> select('id');
		$this-> db -> from ('project');
		$this-> db-> where('user_id',$user_id);
		$query=$this-> db ->get();
		foreach ($query->result() as $row)
		{ 
			$this->db->set('name', $this->input->post('ex_projName_'.$row->id));
			$this->db->set('role', $this->input->post('ex_projRole_'.$row->id));
			$this->db->set('from', $this->input->post('ex_projFrom_'.$row->id));
			$this->db->set('to', $this->input->post('ex_projTo_'.$row->id));
			$this->db->set('description', $this->input->post('ex_projDesc_'.$row->id));
			$this->db->set('update_date', 'now()',FALSE);
			
			$this->db->where('id',$row->id);
			$this->db->update('project');
		}
		
		//add project
		$proj_name=$this->input->post('projName');
		$proj_role=$this->input->post('projRole');
		$proj_from=$this->input->post('projFrom');
		$proj_to=$this->input->post('projTo');
		$proj_desc=$this->input->post('projDesc');

		for($i=0;$i<sizeof($proj_name);$i++)
		{
			if($proj_name[$i])
			{
				$this->db->set('user_id', $user_id);
				$this->db->set('name', $proj_name[$i]);
				$this->db->set('role', $proj_role[$i]);
				$this->db->set('from ', $proj_from[$i]);
				$this->db->set('to', $proj_to[$i]);
				$this->db->set('description', $proj_desc[$i]);
				$this->db->set('status', '1');
				$this->db->set('update_date','now()',FALSE);
				$this->db->insert('project');
			}
		}
		
		//delete education
		$delete_education=$this->input->post('remove_education');
		if($delete_education)
		{
			$this->db->where_in('id',explode(',',$delete_education));
			$result=$this->db->delete('education');
		}
		
		//update education
		$this -> db -> select('id');
		$this-> db -> from ('education');
		$this-> db-> where('user_id',$user_id);
		$query=$this-> db ->get();
		foreach ($query->result() as $row)
		{ 
			$this->db->set('institution', $this->input->post('ex_eduInst_'.$row->id));
			$this->db->set('certification', $this->input->post('ex_eduCert_'.$row->id));
			$this->db->set('from', $this->input->post('ex_eduFrom_'.$row->id));
			$this->db->set('to', $this->input->post('ex_eduTo_'.$row->id));
			$this->db->set('score', $this->input->post('ex_eduScore_'.$row->id));
			$this->db->set('update_date', 'now()',FALSE);
			
			$this->db->where('id',$row->id);
			$this->db->update('education');
		}
		
		//add education
		$edu_inst=$this->input->post('eduInst');
		$edu_cert=$this->input->post('eduCert');
		$edu_from=$this->input->post('eduFrom');
		$edu_to=$this->input->post('eduTo');
		$edu_score=$this->input->post('eduScore');

		for($i=0;$i<sizeof($edu_inst);$i++)
		{
			if($edu_inst[$i])
			{
				$this->db->set('user_id', $user_id);
				$this->db->set('institution', $edu_inst[$i]);
				$this->db->set('certification', $edu_cert[$i]);
				$this->db->set('from ', $edu_from[$i]);
				$this->db->set('to', $edu_to[$i]);
				$this->db->set('score', $edu_score[$i]);
				$this->db->set('status', '1');
				$this->db->set('update_date','now()',FALSE);
				$this->db->insert('education');
			}
		}
	}
	
	/*public function delete_exist()
	{
		$this->db->where('id', $this->input->get('id'));
		$result=$this->db->delete($this->input->get('table'));
		echo $result;
	}*/
}
?>