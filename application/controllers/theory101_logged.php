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
		$this->load->model('Quiz_model');
		
		$data['learnLinks'] = $this->Pages_model->display_lesson();
		$data['username'] = $this->session->userdata('username');
		$data['videoLinks'] = $this->Pages_model->display_video();
		
		$data['total_quiz'] = $this->Pages_model->count_lessons();
		
		/***TRACK****/
		//get user last quiz
		$data['last_quiz'] = $this->Quiz_model->get_last_quiz(
												$this->session->userdata('id') );
		
		//give a user their rank based on:
		//->highest percentage of each quiz taken by user divided by total number of quiz
		$total=0;
		
		for($i=1;$i <= $data['total_quiz']; $i++)
		{
			$percentage = $this->Quiz_model->get_highest_percentage(
												$this->session->userdata('id'),
												$i);
			foreach($percentage as $item)
			{
				$number = $item->percentage;
			}
			
			$total += $number . "<br>";
		}
		
		$rank_num = $total/$data['total_quiz'];
		
		//give a rank according to the total percentage marks
		$rank = "";
		
		if($rank_num < 15.00)
		{
			$rank = "Newbie";
		}
		else if ($rank_num >= 15.00 && $rank_num <=40.00)
		{
			$rank = "Beginner";
		}
		else if ($rank_num >= 30.00 && $rank_num <=70.00)
		{
			$rank = "Intermediate";
		}
		else
		{
			$rank = "Master";
		}  
		
		$data['rank'] = $rank;
		$data['total_percentage'] = $rank_num;
		
		//enable users to post a lesson if they have master rank
		
		if($rank == "Master")
		{
			$data['post_enabled'] = TRUE;
		}
		else
		{
			$data['post_enabled'] = FALSE;
		}
		
		/*****END OF TRACK*****/
	
		$this->load->view('theory101/logged_header',$data);
		$this->load->view('theory101/logged_in',$data);
		$this->load->view('theory101/footer_theory');
	}
	
	public function lessons($id)
	{
		//load pages.lesson model
		$this->load->model('Pages_model');
		$this->load->model('Quiz_model');
		
		//load lessons into a variable
		$data['lesson'] = $this->Pages_model->display_a_lesson($id);
	
		$links['learnLinks'] = $this->Pages_model->display_lesson();
		$links['total_quiz'] = $this->Pages_model->count_lessons();
		
		$this->load->view('theory101/header_theory');
		$this->load->view('theory101/menu_theory',$links);
		$this->load->view('theory101/lessons/lesson_content',$data);
		$this->load->view('theory101/footer_theory');
	}
	
	public function video($id)
	{
		//load pages.lesson model
		$this->load->model('Pages_model');
		$this->load->model('Quiz_model');
		
		//load lessons into a variable
		$data['video'] = $this->Pages_model->display_a_video($id);
	
		$links['videoLinks'] = $this->Pages_model->display_video();
		
		$this->load->view('theory101/header_theory');
		$this->load->view('theory101/menu_theory',$links);
		$this->load->view('theory101/video/video_content',$data);
		$this->load->view('theory101/footer_theory');
	}
	
	public function quiz($chapter)
	{
		//use the chapter to group the quizzes together
		$this->load->model('Quiz_model');
		$this->load->model('Pages_model');
		
		$data['quiz'] = $this->Quiz_model->get_quiz_question($chapter);
		
		$links['learnLinks'] = $this->Pages_model->display_lesson();
		$links['total_quiz'] = $this->Pages_model->count_lessons();
		
		$this->load->view('theory101/header_theory');
		$this->load->view('theory101/menu_theory',$links);
		$this->load->view('theory101/quiz/quiz_content',$data);
		$this->load->view('theory101/footer_theory');
	}
	
	public function process_quiz()
	{
		$correct = 0;
		
		$total_question = $this->input->post('count');
	
		for($i = 1;$i <= $total_question;$i++)
		{	
			 if($this->input->post("choose$i") == $this->input->post("answer$i"))
			 {
			  $correct++;
			 }
		}
		
		$percentage = ($correct/$total_question) * 100;
		
		$this->load->model('Quiz_model');
		
		$data = array(
				'user_id' => $this->session->userdata('id'),
				'quiz_chapter' => $this->input->post('chapter'),
				'total_question' => $total_question,
				'marks' => $correct,
				'percentage' => $percentage
				);
		
		$this->Quiz_model->add_marks($data);
	 	
	 	$this->confirm('Result',"You scored $correct out of $total_question
	 	 <br> $percentage% ",'theory101_logged');
	}
	
	public function confirm($title,$message,$link)
	{
		$data['title'] = $title;
		$data['message'] = $message;
		$data['link'] = $link;
		
		$this->load->view('swan/swan_confirm',$data);
	}
	
	public function post_lesson()
	{
	//post a lesson for MASTER ranks
	
	}
	
	public function post_lesson_form()
	{
	//display the add lesson form
	
	}
	
	public function display_posted_lesson()
	{
	//display lessons that the user posted
	}
}





