<?php
class Feedback_model extends CI_Model
{
	function add_feedback($values)		// Insert feedback to database
	{
		return $this->db->insert('feedback',$values);
	}
}