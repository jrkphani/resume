<?php
class Resume_model extends CI_model{
	/*public function get_userid()
	{
		$arr=$this->session->userdata('logged_in');
		return $arr['id'];
	}*/
	
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
	
	public function update($user_id,$user_detail,$skill,$company,$project,$education)
	{
		/*echo "<pre>";
		print_r($user_id); echo "<br>";
		print_r($user_detail); echo "<br>";
		print_r($skill); echo "<br>";
		print_r($company); echo "<br>";
		print_r($project); echo "<br>";
		print_r($education); echo "<br>";
		die;*/
		
		//$user_id=$this->get_userid();
		
		//update basic details
		
		$this->db->where('user_id',$user_id);
		$this->db->update('user_detail',$user_detail);
		
		//delete skill
		if(count($skill['todelete']))
		{
			$this->db->where_in('id',$skill['todelete']);
			$this->db->where('user_id',$user_id);
			$result=$this->db->delete('skill');
		}
		
		//add / update skill
		for($i=0;$i<count($skill['name']);$i++)
		{
			$skilldata=array('user_id'=>$user_id,
					'name'=>$skill['name'][$i],
					'sub_title'=>$skill['title'][$i],
					'efficiency '=>$skill['effeciency'][$i],
					'description'=>$skill['description'][$i],
					'update_date'=>'now()'
					);

			if($skill['name'][$i] && !$skill['id'][$i])
			{
				$this->db->insert('skill',$skilldata);
			}
			else if($skill['name'][$i] && $skill['id'][$i])
			{				
				$this->db->where('id',$skill['id'][$i]);
				$this->db->where('user_id',$user_id);
				$this->db->update('skill',$skilldata);
			}
		}
		
		//delete company
		if(count($company['todelete']))
		{
			$this->db->where_in('id',$company['todelete']);
			$this->db->where('user_id',$user_id);
			$result=$this->db->delete('company');
		}
		
		//add / update company
		for($i=0;$i<count($company['name']);$i++)
		{

		$companydata=array('user_id'=>$user_id,
					'name'=> $company['name'][$i],
					'designation'=> $company['designation'][$i],
					'from '=> $company['from'][$i],
					'to'=> $company['to'][$i],
					'description'=> $company['description'][$i],
					'update_date'=>'now()'
					);
			if($company['name'][$i] && !$company['id'][$i])
			{
				$this->db->insert('company',$companydata);
			}
			else if($company['name'][$i] && $company['id'][$i])
			{
				$this->db->where('id',$company['id'][$i]);
				$this->db->where('user_id',$user_id);
				$this->db->update('company',$companydata);
			}
		}
		
		//delete project
		if(count($project['todelete']))
		{
			$this->db->where_in('id',$project['todelete']);
			$this->db->where('user_id',$user_id);
			$result=$this->db->delete('project');
		}
		
		//add / update project
		for($i=0;$i<count($project['name']);$i++)
		{
			$projectdata=array('user_id'=> $user_id,
				'name'=> $project['name'][$i],
				'role'=> $project['role'][$i],
				'from '=> $project['from'][$i],
				'to'=> $project['to'][$i],
				'description'=> $project['description'][$i],
				'update_date'=>'now()'
				);
			if($project['name'][$i] && !$project['id'][$i])
			{
				$this->db->insert('project',$projectdata);
			}
			else if($project['name'][$i] && $project['id'][$i])
			{
				$this->db->where('id',$project['id'][$i]);
				$this->db->where('user_id',$user_id);
				$this->db->update('project',$projectdata);
			}
		}
		
		//delete education
		if(count($education['todelete']))
		{
			$this->db->where_in('id',$education['todelete']);
			$this->db->where('user_id',$user_id);
			$result=$this->db->delete('education');
		}
		
		//add / update education
		for($i=0;$i<sizeof($education['institution']);$i++)
		{
			$educationdata=array('user_id' =>$user_id,
				'institution'=> $education['institution'][$i],
				'certification'=> $education['certification'][$i],
				'from '=> $education['from'][$i],
				'to'=> $education['to'][$i],
				'score'=> $education['score'][$i],
				'update_date'=>'now()'

			 );
			if($education['institution'][$i] && !$education['id'][$i])
			{
				$this->db->insert('education',$educationdata);
			}
			else if($education['institution'][$i] && $education['id'][$i])
			{
				$this->db->where('id',$education['id'][$i]);
				$this->db->where('user_id',$user_id);
				$this->db->update('education',$educationdata);
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