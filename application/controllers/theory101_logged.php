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
		
		$data['total_quiz'] = $this->Pages_model->count_lessons();
	
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
	
	public function quiz($chapter)
	{
		//use the chapter to group the quizzes together
		$this->load->model('Quiz_model');
		
		$data['quiz'] = $this->Quiz_model->get_quiz_question($chapter);
		
		$this->load->view('theory101/header_theory');
		$this->load->view('theory101/menu_theory');
		$this->load->view('theory101/quiz/quiz_content',$data);
		$this->load->view('theory101/footer_theory');
	}
	
	public function process_quiz()
	{
		$correct = 0;
	
		for($i = 1;$i <= $this->input->post('count');$i++)
		{	
			 if($this->input->post("choose$i") == $this->input->post("answer$i"))
			 {
			  $correct++;
			 }
		}
		
		$percentage = ($correct/$i) * 100;
		
		$this->load->model('Quiz_model');
		
		$data = array(
				'user_id' => $this->session->userdata('id'),
				'quiz_chapter' => $this->input->post('chapter'),
				'total_question' => $i,
				'marks' => $correct,
				'percentage' => $percentage
				);
		
		$this->Quiz_model->add_marks($data);
	 	
	 	$this->confirm('Result',"You scored $correct out of $i
	 	 <br> $percentage% ",'theory101_logged');
	}
	
	public function confirm($title,$message,$link)
	{
		$data['title'] = $title;
		$data['message'] = $message;
		$data['link'] = $link;
		
		$this->load->view('swan/swan_confirm',$data);
	}
	
}





