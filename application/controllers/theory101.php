<?php
class Theory101 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('theory101/index');
	}
	
	public function authenticate()
	{
		$this->load->model('Login_model');
		$this->load->helper('url');
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$user_details = $this->Login_model->get_username_details($username);
		
		//check for username
		if($user_details == NULL)
		{
			echo "Username does not exists";
		}
		else
		{
			foreach($user_details as $item):
			$db_password = $item->password;
			endforeach;
		}
		
		//check if password matches from the db
		if($password == $db_password)
		{
		
			$user_session = array(
							'username' => $username,
							'logged_in' => TRUE
							);
		
			$this->session->set_userdata($user_session);
		
			redirect('theory101_logged','refresh');
		}
		else
		{
		echo "Wrong password";
		}
		
		
	}
	
}
