<?php
class Messages extends CI_Controller {

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
		$this->load->model('Messages_model');
		$this->load->model('Users_model');
		
		$data['main_links'] = $this->Swan_model->links();
		$data['content'] = $this->Swan_model->content();
		$data['messages'] = $this->Messages_model->display_admin_message();
		$data['username'] = $this->session->userdata('username');
		$data['usernames'] = $this->Users_model->display_users();
		$data['user_messages'] = $this->Messages_model
								 ->display_a_user_message('admin');
		
		$this->load->view('swan/swan_header');
		$this->load->view('swan/swan_menu',$data);
		$this->load->view('swan/swan_messages',$data);
		$this->load->view('swan/swan_footer');
	}
	
	public function send()
	{
		$this->load->model('Messages_model');
		
		$data['username'] = $this->input->post('username');
		$data['message'] = $this->input->post('message');
		
		$this->Messages_model->add_message($data);
		
		$this->confirm('Success','Your message has been added','messages');
	
	}
	
	public function announce($id)
	{
		$this->load->model('Messages_model');
		
		$this->Messages_model->update_announce($id);
		
		$this->confirm('Announced','Your selected message has been announced','messages');
	}
	
	public function remove_announce()
	{
		$this->load->model('Messages_model');
		
		$this->Messages_model->remove_announce();
		
		$this->confirm('Removed','Messages has been removed from the frontEnd','messages');
	}
	
	public function confirm($title,$message,$link)
	{
		$data['title'] = $title;
		$data['message'] = $message;
		$data['link'] = $link;
		
		$this->load->view('swan/swan_confirm',$data);
	}
	
}
