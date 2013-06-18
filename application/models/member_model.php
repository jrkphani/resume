<?php
Class Member_model extends CI_Model {
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
    $this -> db -> or_like('skill.name', trim($skill));
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
    $this->db->where('id',$strID);  
  $this->db->where('user_id',$userID);
  return $this->db->get('search_skills')->result();
}

function saveSearchList($insert)
{
  if($this->db->insert('search_skills',$insert))
    return true;
  else
    return false;
}

function lastInsertID()
{
  return $this->db->insert_id();
}

function deleteSearchList($strID)
{
  $this->db->where('id',$strID);
  if($this->db->delete('search_skills'))
    return true;
  else
    return false;
}

public function checkViewed($member_id,$resume_id)
{
  $where=array('user_id'=>$member_id,'resume_id'=>$resume_id);
  $this->db->where($where);
  $this->db->from('resume_log');
  if($this->db->count_all_results()>0)
    return TRUE;
  else
    return FALSE;
}

public function getReachedLimit($member_id)
{
  $this->db->where('user_id',$member_id);
  $this->db->from('resume_log');
  return $this->db->count_all_results();
}

public function updateLimit($member_id,$resume_id)
{
  $data = array('user_id' => $member_id, 'resume_id' => $resume_id);
  $this->db->insert('resume_log', $data); 
}

function selectResume($member_id,$resume_id)
{
  $this->db->set('select','1');
  $where=array('user_id'=>$member_id,'resume_id'=>$resume_id);
  $this->db->where($where);
  return $this->db->update('resume_log');
}

function checkSelected($member_id,$resume_id)
{
  $where=array('user_id'=>$member_id,'resume_id'=>$resume_id,'select'=>'1');
  $this->db->where($where);
  $this->db->from('resume_log');
  if($this->db->count_all_results()==1)
      return true;
  else
      return false;
}

function selectedResume($user_id)
{
  $this-> db ->select('resume_log.resume_id,user_detail.first_name,user_detail.mobile,user_detail.experience');
  $where=array('resume_log.select'=>'1','resume_log.user_id'=>$user_id);
  $this -> db -> where ($where);
  $this -> db -> from('resume_log');
  $this ->  db -> join('user_detail','resume_log.resume_id=user_detail.user_id');
  return $this -> db -> get()->result();
}

function downloadResume($ids,$fields=NULL)
{
  if($fields)
    $this->db->select($fields);
  else
    $this->db->select('first_name,mobile,experience');
  $this->db->where_in('user_id',$ids);
  $this->db->from('user_detail');
  return $this->db->get()->result_array();
}

}//class end
?>