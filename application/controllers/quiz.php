<?php
class Quiz extends CI_Controller {

	public function index()
	{
		$this->load->model('Swan_model');
		
		$data['main_links'] = $this->Swan_model->links();
		$data['content'] = "Quiz Content";
		
		$this->load->view('swan/swan_header');
		$this->load->view('swan/swan_menu',$data);
		$this->load->view('quiz/quiz_content',$data);
		$this->load->view('swan/swan_footer');
	}
	
	public function display_add_quiz()
	{
		$this->header();
		
		$this->load->view('quiz/add_quiz',$data);
	
	}
	
		public function header()
	{
		$this->load->model('Pages_model');
		$this->load->model('Swan_model');
		
		$data['main_links'] = $this->Swan_model->links();
		
		$this->load->view('pages/pages_header');
		$this->load->view('swan/swan_menu',$data);
	}
	
}
