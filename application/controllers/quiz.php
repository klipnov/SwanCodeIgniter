<?php
class Quiz extends CI_Controller {

	public function index()
	{
		$this->load->model('Swan_model');
		$this->load->model('Pages_model');
		
		$data['main_links'] = $this->Swan_model->links();
		$data['content'] = "Quiz Content";
		$data['total_lesson'] = $this->Pages_model->count_lessons();
		
		$this->load->view('swan/swan_header');
		$this->load->view('swan/swan_menu',$data);
		$this->load->view('quiz/quiz_content',$data);
		$this->load->view('swan/swan_footer');
	}
	
	
	public function header()
	{
		$this->load->model('Pages_model');
		$this->load->model('Swan_model');
		
		$data['main_links'] = $this->Swan_model->links();
		
		$this->load->view('pages/pages_header');
		$this->load->view('swan/swan_menu',$data);
	}
	
	//edit this!!!!!!!!!!!!!!!!!!!!!!!!!
	public function display_add_quiz($chapter)
	{
		$this->header();
		
		$data['chapter'] = $chapter;
		
		$this->load->view('quiz/add_quiz',$data);
	
	}
	
	public function select_chapter($chapter)
	{
		//display the quiz title in the swan page
		$this->load->model('Quiz_model');
		
		$data['question'] = $this->Quiz_model->get_quiz_question($chapter);		
		$data['chapter'] = $chapter;
		
		$this->header();
		$this->load->view('quiz/select_quiz',$data);
		$this->load->view('swan/swan_footer');
	}
	
	public function edit_quiz($id)
	{
		//edit the questions
		$this->load->model('Quiz_model');
		
		//get data of the requested id
		$data['quiz'] = $this->Quiz_model->get_quiz_id($id);
		
		$this->header();
		$this->load->view('quiz/edit_quiz',$data);
		$this->load->view('swan/swan_footer');
	}
	
	public function update_quiz()
	{
		$this->load->model('Quiz_model');
		$this->load->helper('url');
		
		$id = $this->input->post('id');
		
		$data = array(
				'chapter' => $this->input->post('chapter'),
				'question' => $this->input->post('question'),
				'a' => $this->input->post('a'),
				'b' => $this->input->post('b'),
				'c' => $this->input->post('c'),
				'd' => $this->input->post('d'),
				'answer' => $this->input->post('answer')
				);
		
		$this->Quiz_model->update_quiz($id,$data);
		
		echo "Quiz has been updated" . "<br>";
		echo anchor('quiz','return');
	}
	
	public function remove_quiz($id)
	{
	//remove a question
	$this->load->model('Quiz_model');
	$this->load->helper('url');
	
	$this->Quiz_model->delete_quiz($id);
	
	echo "Quiz removed";
	
	echo anchor('quiz','return');
	}
	
	public function add_quiz()
	{
		$data['chapter'] = $this->input->post('chapter');
		$data['question'] = $this->input->post('question');
		$data['a'] = $this->input->post('a');
		$data['b'] = $this->input->post('b');
		$data['c'] = $this->input->post('c');
		$data['d'] = $this->input->post('d');
		$data['answer'] = $this->input->post('answer');
		
		$this->load->model('Quiz_model');
		$this->load->helper('url');
		
		$this->Quiz_model->add_quiz($data);
		
		echo "The quiz question has been added";	
		echo anchor('/quiz','return');
	}
}
