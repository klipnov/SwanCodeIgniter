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
	
	function get_last_quiz($user_id)
	{
		//get the date
		$this->db->where('user_id',$user_id);
		$this->db->select_max('date');
		$query_date = $this->db->get('quiz_marks');
		
		foreach($query_date->result() as $date)
		{
			$quiz_date = $date->date;
		}				
		
		//get row of date and id
		$this->db->where('user_id',$user_id);
		$this->db->where('date',$quiz_date);
		$query = $this->db->get('quiz_marks');
		
		return $query->result();
	}
	
	function get_highest_percentage($user_id,$chapter)
	{
		//get the percentage of each quiz with the given user_id
		$this->db->where('user_id',$user_id);
		$this->db->where('quiz_chapter',$chapter);
		$this->db->select_max('percentage');
		$query = $this->db->get('quiz_marks');
		
		return $query->result();
	}
	
	function get_quiz_marks($user_id)
	{
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('quiz_marks');
		
		return $query->result();
	}
	
}
