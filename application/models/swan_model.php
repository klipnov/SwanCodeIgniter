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
		               'users' => 'Users');
		return $links;
	}
	
	/**
	*returns Swan description
	*/
	function content()
	{
		$content = "SWAN is the backend of Theory 101
		                and is used to add remove update
		 				information in the database.
		 			    Pages is used for the
		 			    CRUD feature in lessons and
		 			    Theory 101's static
		 			    pages.";
						
		return $content; 
	}  
}

