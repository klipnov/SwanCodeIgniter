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

}
