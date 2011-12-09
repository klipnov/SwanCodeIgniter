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
			$this->confirm('Error','Your username does not exist <br/> Please try again','theory101');
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
							'id' => $id,
							'username' => $username,
							'logged_in' => TRUE
							);
		
			$this->session->set_userdata($user_session);
		
			redirect('swan','refresh');
		}
		else
		{
			$this->confirm('Error','You typed in the wrong password <br/> Please try again','theory101');
		}				
	}
	
	public function confirm($title,$message,$link)
	{
		$data['title'] = $title;
		$data['message'] = $message;
		$data['link'] = $link;
		
		$this->load->view('swan/swan_confirm',$data);
	}

}
