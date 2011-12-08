<?php
class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('login_view');		
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
		
			redirect('swan','refresh');
		}
		else
		{
		echo "Wrong password";
		}
		
		
	}

}
