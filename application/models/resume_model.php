<?php
class Resume_model extends CI_model{
	
	function user_detail($id)
	{
		$this -> db -> select('first_name,last_name,designation,dob,secondary_email,mobile,skype,address,married,photo,experience,contactTitle');
		$this-> db -> from ('user_detail');
		$this->db->where('user_id',$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	 
	function skill($id)
	{
		$this -> db -> select('id,name,efficiency');
		$this-> db -> from ('skill');
		$this-> db-> where('user_id',$id);
		$query=$this-> db ->get();
		return $query -> result_array();
	}
	function company($id)
	{
		$this -> db -> select('id,name,designation,date');
		$this-> db -> from ('company');
		$this-> db-> where('user_id',$id);
		$query=$this-> db ->get();
		return $query -> result_array();
	}
	function project($id)
	{
		$this -> db -> select('id,name,role,description,url');
		$this-> db -> from ('project');
		$this-> db-> where('user_id',$id);
		$query=$this-> db ->get();
		return $query -> result_array();
	}
	function education($id)
	{
		$this -> db -> select('id,institution,certification,date,score');
		$this-> db -> from ('education');
		$this-> db-> where('user_id',$id);
		$query=$this-> db ->get();
		return $query -> result_array();
	}
	function about($id)
	{
		$this -> db -> select('id,compensation,objective,summary,website,mystrength,passport_visa,intresttitle,intrestDesc,intrestUrl');
		$this-> db -> from ('about');
		$this-> db-> where('user_id',$id);
		$query=$this-> db ->get();
		return $query -> result_array();
	}
	function awards($id)
	{
		$this -> db -> select('id,title,date,description');
		$this-> db -> from ('awards');
		$this-> db-> where('user_id',$id);
		$query=$this-> db ->get();
		return $query -> result_array();
	}
	function otherskill($id)
	{
		$this -> db -> select('id,name');
		$this-> db -> from ('otherskill');
		$this-> db-> where('user_id',$id);
		$query=$this-> db ->get();
		return $query -> result_array();
	}
	public function update($user_id,$user_detail,$about,$awards,$skill,$otherSkills,$company,$project,$education,$loggedin=NULL)
	{
		//add / update user_detail table
		// this will be always update, because a record for the user will be created in in this table while registration
				$this->db->where('user_id', $user_id);
				$this->db->update('user_detail',$user_detail);
				
		if($loggedin)
		{
			//update about table
			$this->db->where('user_id', $user_id);
			$this->db->update('about',$about);
			
			//update awards table
			$this->db->where('user_id', $user_id);
			$this->db->update('awards',$awards);
						
			//update skill table
			$this->db->where('user_id', $user_id);
			$this->db->update('skill',$skill);

			//update otherskill table
			$this->db->where('user_id', $user_id);
			$this->db->update('otherskill',$otherSkills);
				
			//update company table
			$this->db->where('user_id', $user_id);
			$this->db->update('company',$company);

			//update project table
			$this->db->where('user_id', $user_id);
			$this->db->update('project',$project);

			//update education table
			$this->db->where('user_id', $user_id);
			$this->db->update('education',$education);
			
		}
		else
		{
			//insert about table
			$this->db->set('user_id', $user_id);
			$this->db->insert('about',$about);
			
			//insert awards table
			$this->db->set('user_id', $user_id);
			$this->db->insert('awards',$awards);
						
			//insert skill table
			$this->db->set('user_id', $user_id);
			$this->db->insert('skill',$skill);

			//insert otherskill table
			$this->db->set('user_id', $user_id);
			$this->db->insert('otherskill',$otherSkills);
				
			//insert company table
			$this->db->set('user_id', $user_id);
			$this->db->insert('company',$company);

			//insert project table
			$this->db->set('user_id', $user_id);
			$this->db->insert('project',$project);

			//insert education table
			$this->db->set('user_id', $user_id);
			$this->db->insert('education',$education);
		}

	}
}
?>