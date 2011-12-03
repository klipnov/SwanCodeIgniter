<?php
class Theory101 extends CI_Controller {

	public function index()
	{
		$this->load->view('theory101/index');
	}
	
	public function login()
	{
		//get topic of the chapters and the id
		$this->load->model('Pages_model');
		$data['learnLinks'] = $this->Pages_model->display_lesson();
		
	
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
	
	
	public function logout()
	{
		$this->load->view('theory101/main_header');
		$this->load->view('theory101/main_footer');
	}
	
}
