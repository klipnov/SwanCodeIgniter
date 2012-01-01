<?php
class Users extends CI_Controller {	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		
		if($this->session->userdata('logged_in') != TRUE)
		{
			redirect('login','refresh');
		}
	}
	
	public function index()
	{
		$this->load->model('Swan_model');
		$this->load->model('Users_model');
		
		$data['main_links'] = $this->Swan_model->links();
		$data['content'] = $this->Users_model->display_users();
		
		$this->load->view('swan/swan_header');
		$this->load->view('swan/swan_menu',$data);
		$this->load->view('users/users_content',$data);
		$this->load->view('swan/swan_footer');
	}	
	
	//displays the form to add a user
	public function display_add_form()
	{
		$this->load->model('Swan_model');
		
		$data['main_links'] = $this->Swan_model->links();		
		
		$this->load->view('swan/swan_header');
		$this->load->view('swan/swan_menu',$data);
		$this->load->view('users/add_form_content',$data);
		$this->load->view('swan/swan_footer');	
	}
	
	//function that adds a user to the database
	public function add_user()
	{
		$this->load->helper('url');
		
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['email'] = $this->input->post('email');
		
		$this->load->model('Users_model');
		$this->Users_model->add_user($data);
		
		$this->confirm('Added','User has been added','users');
	}
	
	//updates the user information in the database
	public function update_user()
	{
		$this->load->helper('url');
		
		$id = $this->input->post('id');
		
		$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email')
				);
		
		$this->load->model('Users_model');
		$this->Users_model->update_user($id,$data);
		
		$this->confirm('Updated','User has been updated','users');
	}	
	
	//deletes a user from the database
	public function delete_user($id)
	{
		$this->load->helper('url');
		
		$this->load->model('Users_model');		
		$this->Users_model->delete_user($id);		
		
		$this->confirm('Removed','User has been deleted','users');
	}
	
	//displays the edit user form
	public function edit_user($id)
	{
		$this->load->model('Swan_model');
		$this->load->model('Users_model');
		$data['main_links'] = $this->Swan_model->links();		
		$data['user'] = $this->Users_model->display_a_user($id);
		
		$this->load->view('swan/swan_header');
		$this->load->view('swan/swan_menu',$data);
		$this->load->view('users/edit_user_content',$data);
		$this->load->view('swan/swan_footer');
	}
	
	//the confirm box screen
	public function confirm($title,$message,$link)
	{
		$data['title'] = $title;
		$data['message'] = $message;
		$data['link'] = $link;
		
		$this->load->view('swan/swan_confirm',$data);
	}

}
