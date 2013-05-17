<?php
Class Admin_model extends CI_Model
{
 function totalSearchSkills($str)
 {
	foreach($str as $skill)
		$this -> db -> or_like('skill.name', trim($skill));
	$this->db->join('user_detail', 'user_detail.user_id = skill.user_id');
	$this -> db -> select('skill.user_id,  user_detail.mobile AS mobile, user_detail.experience AS experience, user_detail.first_name AS first_name');
	$this -> db -> from('skill');
	$this->db->group_by("skill.user_id");
	$query = $this->db->get();
	return $query->num_rows();
   
 }
 function searchSkills($limit,$str)
 {
	 $from=$this->uri->segment(3);
		if($from=='')
			$this->db->limit(2);
		else
			$this->db->limit(2,$from);
			
  $data=array();
  foreach($str as $skill)
  {
    $this -> db -> or_like('skill.name', trim($skill));
  }
   $this->db->join('user_detail', 'user_detail.user_id = skill.user_id');
   $this -> db -> select('skill.user_id,  user_detail.mobile AS mobile, user_detail.experience AS experience, user_detail.first_name AS first_name');
   $this -> db -> from('skill');
  /* $this -> db ->limit($limit)-> from('skill');*/
   $this->db->group_by("skill.user_id"); 
   $data = $this->db->get()->result(); 
   return $data;
 }
 function loadSearchList($userID,$strID=NULL)
 {
  if($strID)
  {
  $this->db->where('id',$strID);  
  }
  $this->db->where('user_id',$userID);
  return $this->db->get('search_skills')->result();
 }
 function saveSearchList($userID,$str)
 {
  $this->db->set('user_id',$userID);
  $this->db->set('string',$str);
  if($this->db->insert('search_skills'))
  {
    return true;
  }
  else
  {
    return false;
  }
 }
 function deleteSearchList($strID)
 {
  $this->db->where('id',$strID);
  if($this->db->delete('search_skills'))
  {
    return true;
  }
  else
  {
    return false;
  }
 }
}
?>