<?php
class Resume_model extends CI_model{
	
	function basic_details($id)
	{
		$this -> db -> select('first_name,last_name,designation,secondary_email,mobile,skype,address,married,photo,experience');
		$this-> db -> from ('user_detail');
		$this->db->where('user_id',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	 
	function skill_details($id)
	{
		$this -> db -> select('id,name,efficiency');
		$this-> db -> from ('skill');
		$this-> db-> where('user_id',$id);
		$query=$this-> db ->get();
		return $query -> result();
	}
	function company_details($id)
	{
		$this -> db -> select('id,name,designation,date');
		$this-> db -> from ('company');
		$this-> db-> where('user_id',$id);
		$query=$this-> db ->get();
		return $query -> result();
	}
	function project_details($id)
	{
		$this -> db -> select('id,name,role,description');
		$this-> db -> from ('project');
		$this-> db-> where('user_id',$id);
		$query=$this-> db ->get();
		return $query -> result();
	}
	function education_details($id)
	{
		$this -> db -> select('id,institution,certification,date,score');
		$this-> db -> from ('education');
		$this-> db-> where('user_id',$id);
		$query=$this-> db ->get();
		return $query -> result();
	}
	
	public function update($user_id,$about,$awards,$skill,$otherSkills,$company,$project,$education)
	{
		//add / update about table
				$this->db->set('user_id', $user_id);
				$this->db->insert('about',$about);
				
		//add / update awards table
		$this->db->set('user_id', $user_id);
				$this->db->insert('awards',$awards);
						
		//add / update skill table
		$this->db->set('user_id', $user_id);
				$this->db->insert('skill',$skill);

		//add / update otherskill table
		$this->db->set('user_id', $user_id);
				$this->db->insert('otherskill',$otherSkills);
				
		//add / update company table
		$this->db->set('user_id', $user_id);
				$this->db->insert('company',$company);

		
		//add / update project table
		$this->db->set('user_id', $user_id);
				$this->db->insert('project',$project);

		
		//add / update education table
		$this->db->set('user_id', $user_id);
				$this->db->insert('education',$education);

	}
}
?>