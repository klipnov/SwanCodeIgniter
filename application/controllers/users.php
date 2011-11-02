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
	
	//displays the form to add a user
	public function display_add_form()
	{
		$this->load->model('Swan_model');
		
		$data['main_links'] = $this->Swan_model->links();		
		
		$this->load->view('swan_header');
		$this->load->view('swan_menu',$data);
		$this->load->view('add_form_content',$data);
		$this->load->view('swan_footer');	
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
		
		echo $data['username'] . " has been added" . "<br>";
		echo anchor('users','return');
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
		
		echo $this->input->post('username') . " Updated" . "<br>";
		echo anchor('users','return');
	}	
	
	//deletes a user from the database
	public function delete_user($id)
	{
		$this->load->helper('url');
		
		$this->load->model('Users_model');		
		$this->Users_model->delete_user($id);		
		
		echo "User $id Deleted" . "<br>";
		echo anchor('users','return');	
	}
	
	//displays the edit user form
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
