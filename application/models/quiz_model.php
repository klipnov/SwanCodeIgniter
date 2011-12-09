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
	
	function get_quiz_id($id)
	{
		$query = $this->db->get_where('quiz',array('id'=>$id));
		
		return $query->result();
	}
	
	function update_quiz($id,$data)
	{
		//update the quiz where theres a same id
		$this->db->where('id',$id);
		$this->db->update('quiz',$data);
	}
	
	function delete_quiz($id)
	{
		$this->db->delete('quiz',array('id'=>$id));
	}
	
	function add_marks($data)
	{
		$this->db->insert('quiz_marks',$data);
	}
	
}
