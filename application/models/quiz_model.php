<?php
class Quiz_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function add_quiz($data)
	{
		$this->db->insert('quiz',$data);
	}
	
	function get_quiz_question($chapter)
	{
		$query = $this->db->get_where('quiz',array('chapter'=>$chapter));
		
		return $query->result();
	}
	
}
