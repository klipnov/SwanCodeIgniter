<?php
class Pages_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	//display the list of pages
	function display_main_pages()
	{
		$query = $this->db->get('mainPages');
		
		return $query->result();
	}
	
	//returns just one page information
	function display_a_page($id)
	{
		$query = $this->db->get_where('mainPages', array('id'=>$id));
		
		return $query->result();
	}
	
	//add a main page
	function add_page($data)
	{
		$this->db->insert('mainPages',$data);
	}
	
	//edit a main page
	function update_page($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('mainPages',$data);
	}
	
	//remove a main page
	function remove_page($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('mainPages');
	} 
	
	/*************/
	/** LESSONS **/
	/*************/
	
	function display_lesson()
	{
		$query = $this->db->get('lesson');
		
		return $query->result();
	}
	
	//display a lesson
	function display_a_lesson($id)
	{
		$query = $this->db->get_where('lesson',array('id'=>$id));
		
		return $query->result();
	}
	
	//add a lesson
	function add_lesson($data)
	{
		$this->db->insert('lesson',$data);
	}
	
	//update a lesson
	function update_lesson($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('lesson',$data);
	}
	
	//remove a lesson
	function remove_lesson($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('lesson');
	}
}

