<?php
class Login_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_username_details($username)
	{
		//get the username from the database
		$query = $this->db->get_where('users',array('username'=>$username));
		
		return $query->result();
	}
	
}
