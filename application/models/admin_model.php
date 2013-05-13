<?php
Class Admin_model extends CI_Model
{
 function searchSkills($str)
 {
  $data=array();
  foreach($str as $skill)
  {
    $this -> db -> or_like('skill.name', $skill);
  }
   $this->db->join('user_detail', 'user_detail.user_id = skill.user_id');
   $this -> db -> select('skill.user_id,  user_detail.mobile AS mobile, user_detail.experience AS experience, user_detail.first_name AS first_name');
   $this -> db -> from('skill');
   $this->db->group_by("skill.user_id"); 
   $data = $this->db->get()->result();; 
   return $data;
 }
}
?>