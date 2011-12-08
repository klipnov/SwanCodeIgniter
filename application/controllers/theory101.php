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
	
	public function register()
	{
		//load swan_users model to register user into database
		$this->load->model('Users_model');
		$this->load->helper('url');
		
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['email'] = $this->input->post('email');

		
		$this->Users_model->add_user($data);
			
		$this->confirm('Success','You can now login','theory101');		
	}
	
	public function confirm($title,$message,$link)
	{
		$data['title'] = $title;
		$data['message'] = $message;
		$data['link'] = $link;
		
		$this->load->view('swan/swan_confirm',$data);
	}
	
}
