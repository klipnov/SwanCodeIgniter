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

}
