<?php
class Theory101_logged extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		
		if($this->session->userdata('logged_in') != TRUE)
		{
			redirect('theory101','refresh');
		}
	}

	public function index()
	{
		//get topic of the chapters and the id
		$this->load->model('Pages_model');
		$data['learnLinks'] = $this->Pages_model->display_lesson();
		$data['username'] = $this->session->userdata('username');
	
		$this->load->view('theory101/logged_header');
		$this->load->view('theory101/logged_in',$data);
		$this->load->view('theory101/footer_theory');
	}
	
	public function lessons($id)
	{
		//load pages.lesson model
		$this->load->model('Pages_model');
	
		//load lessons into a variable
		$data['lesson'] = $this->Pages_model->display_a_lesson($id);
	
		
		$this->load->view('theory101/header_theory');
		$this->load->view('theory101/menu_theory');
		$this->load->view('theory101/lessons/lesson_content',$data);
		$this->load->view('theory101/footer_theory');
	}
	
}
