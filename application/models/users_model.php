<?php
class Users_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	//display the users data
	function display_users()
	{
		$query = $this->db->get('users');
		
		return $query->result();
	}
	
	//adds the user data to database
	function add_user($data)
	{
		$this->db->insert('users',$data);
	}
	
	//updates the user information
	function update_user($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('users',$data);
	}
	
	//deletes user by id
	function delete_user($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('users');
	}
	
	//display one user data
	function display_a_user($id)
	{
		$query = $this->db->get_where('users', array('id'=> $id));
		
		return $query->result();
		
	}

}
