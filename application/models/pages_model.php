<?php
class Pages_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	/************/
	/** VIDEO ***/
	/************/
	
	//display the list of video
	function display_video()
	{
		$query = $this->db->get('video');
		
		return $query->result();
	}
	
	//returns just one video information
	function display_a_video($id)
	{
		$query = $this->db->get_where('video', array('id'=>$id));
		
		return $query->result();
	}
	
	//add a video
	function add_video($data)
	{
		$this->db->insert('video',$data);
	}
	
	//edit a video
	function update_video($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('video',$data);
	}
	
	//remove a video
	function remove_video($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('video');
	} 
	
	/*************/
	/** LESSONS **/
	/*************/
	
	function display_lesson()
	{
		$query = $this->db->get('lesson');
		
		return $query->result();
	}
	
	//count lessons for the Quiz view
	function count_lessons()
	{
		$query = $this->db->count_all('lesson');
		
		return $query;
	}
	
	//display a lesson
	function display_a_lesson($id)
	{
		$query = $this->db->get_where('lesson',array('id'=>$id));
		
		return $query->result();
	}
	
	function get_chapter_id($chapter_num)
	{
		$query = $this->db->get_where('lesson',array('chapter_num' => $chapter_num));
		
		$chapter_num_db = 0;
		
		foreach($query->result() as $item)
		{
			$chapter_num_db = $item->id;
		}
		return  $chapter_num_db;
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
	
	/****************/
	/**USER LESSONS**/
	/****************/
	
	//insert a user_lesson
	function add_user_lesson($data)
	{
		$this->db->insert('user_lesson',$data);
	}
	
	//update a user_lesson
	function update_user_lesson($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('lesson',$data);
	}
	
	//remove a user_lesson
	function remove_user_lesson($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('user_lesson');
	}

	
}

