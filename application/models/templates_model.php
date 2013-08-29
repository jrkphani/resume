<?php
class Templates_model extends CI_Model{
	function get_templates()
	{
		$this->db->select(array('template.id','template.title'));
		$this->db->from('template');
		$this->db->group_by('template.id');
		$this->db->select_avg('rating.rate');
		$this->db->join('rating','template.id=rating.template_id','left');
		$query=$this->db->get();
		return $query->result();
	}

	function check_stared($where)
	{
		$this->db->where($where);
		$this->db->from('rating');
		return $this->db->count_all_results();
	}

	function add_star($data)
	{
		return $this->db->insert('rating',$data);
	}
}
?>