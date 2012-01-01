<?php
class Messages_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	/******************/
	/**Admin_Messages**/
	/******************/
	
	//add an admin_message
	function add_message($data)
	{
		$this->db->insert('admin_message',$data);
	}
	
	//update a admin_message
	function update_admin_message($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('admin_message',$data);
	}
	
	//remove a admin_message
	function remove_admin_message($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('admin_message');
	}
	
	//return admin_message information ordered by latest date first
	function display_admin_message()
	{
		$this->db->order_by('date','desc');
		
		$query = $this->db->get('admin_message');
		
		return $query->result();
	}
	
	//return a message that has been chosen to be announced
	function get_admin_message()
	{
		$this->db->where('announce','yes');
		
		$query = $this->db->get('admin_message');
		
		return $query->result();
	}
	
	function update_announce($id)
	{
		$data = array('announce' => 'no'); 
		$data2 = array('announce' =>'yes');
		
		$this->db->where('announce','yes');
		$this->db->update('admin_message',$data);
		
		$this->db->where('id',$id);
		$this->db->update('admin_message',$data2);
	}
	
	function remove_announce()
	{
		$data = array('announce' => 'no'); 
		
		$this->db->where('announce','yes');
		$this->db->update('admin_message',$data);
	}		
	
	//return a single admin_message information
	function display_an_admin_message($id)
	{
		$query = $this->db->get_where('admin_message',array('id'=>$id));
		
		return $query->result();
	}
	
	/******************/
	/**User_Messages**/
	/******************/
	
	//add an user_message
	function add_user_message($data)
	{
		$this->db->insert('user_message',$data);
	}
	
	//update a user_message
	function update_user_message($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('user_message',$data);
	}
	
	//remove a user_message
	function remove_user_message($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('user_message');
	}
	
	//return user_message information ordered by latest date first
	function display_user_message()
	{
		$this->db->order_by('date','desc');
		
		$query = $this->db->get('user_message');
		
		return $query->result();
	}	
	
	//return a single user_message information
	function display_a_user_message($id)
	{
		$query = $this->db->get_where('user_message',array('id'=>$id));
		
		return $query->result();
	}
	
}
