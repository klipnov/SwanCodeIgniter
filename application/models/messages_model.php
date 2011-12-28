<?php
class Messages_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	/************/
	/**Messages**/
	/************/
	
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
	
	//return admin_message information
	function display_admin_message()
	{
		$this->db->order_by('date','desc');
		
		$query = $this->db->get('admin_message');
		
		return $query->result();
	}
	
	//return a single admin_message information
	function display_an_admin_message($id)
	{
		$query = $this->db->get_where('admin_message',array('id'=>$id));
		
		return $query->result();
	}
	
}
