<?php
class Users extends CI_Controller {	
	
	public function index()
	{
		$this->load->model('Swan_model');
		$this->load->model('Users_model');
		
		$data['main_links'] = $this->Swan_model->links();
		$data['content'] = $this->Users_model->display_users();
		
		$this->load->view('swan_header');
		$this->load->view('swan_menu',$data);
		$this->load->view('users_content',$data);
		$this->load->view('swan_footer');
	}	
	
	public function display_add_form()
	{
		$this->load->model('Swan_model');
		
		$data['main_links'] = $this->Swan_model->links();		
		
		$this->load->view('swan_header');
		$this->load->view('swan_menu',$data);
		$this->load->view('add_form_content',$data);
		$this->load->view('swan_footer');	
	}
	
	public function add_user()
	{
		$this->load->helper('url');
		
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['email'] = $this->input->post('email');
		
		$this->load->model('Users_model');
		$this->Users_model->add_user($data);
		
		echo $data['username'] . " has been added" . "<br>";
		echo anchor('users','return');
	}	
	
	public function delete_user($id)
	{
		$this->load->helper('url');
		
		$this->load->model('Users_model');		
		$this->Users_model->delete_user($id);		
		
		echo "User $id Deleted" . "<br>";
		echo anchor('users','return');	
	}
	
	public function edit_user($id)
	{
		$this->load->model('Swan_model');
		$this->load->model('Users_model');
		$data['main_links'] = $this->Swan_model->links();		
		$data['user'] = $this->Users_model->display_a_user($id);
		
		$this->load->view('swan_header');
		$this->load->view('swan_menu',$data);
		$this->load->view('edit_user_content',$data);
		$this->load->view('swan_footer');
	}

}
