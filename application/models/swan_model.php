<?php
class Swan_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	*return Swan main links
	*/
	function links()
	{
		$links = array('swan' => 'Home',
		               'pages' => 'Pages',
		               'quiz' => 'Quiz',
		               'users' => 'Users',
		               'messages' => 'Messages',
		               'logout' => 'Logout'
		               );
		return $links;
	}
	
	/**
	*returns Swan description
	*/
	function content()
	{
		$content = "SWAN stands for Simple Web Admin.
					SWAN is the backend of Theory 101
		            and its purpose is to add, remove and update
		 			information in the database.";
						
		return $content; 
	}  
}

