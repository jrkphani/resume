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
	}
	
	public function delete_exist()
	{
		$this->db->where('id', $this->input->get('id'));
		$result=$this->db->delete($this->input->get('table'));
		echo $result;
	}
}
?>