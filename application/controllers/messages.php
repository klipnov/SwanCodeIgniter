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
		
		$data['main_links'] = $this->Swan_model->links();
		$data['content'] = $this->Swan_model->content();
		
		$this->load->view('swan/swan_header');
		$this->load->view('swan/swan_menu',$data);
		$this->load->view('swan/swan_footer');
	}
	
}
