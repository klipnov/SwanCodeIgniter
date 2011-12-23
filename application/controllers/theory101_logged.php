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
			$rank = "I see your just starting out. You're now a Newbie. Watch video lessons if you have a problem understanding the lessons. Get more than 15% of total progress to get a beginner rank.";
		}
		else if ($rank_num >= 15.00 && $rank_num <=40.00)
		{
			$rank = "You have advanced your first rank from a Newbie. You're now a Beginner. Watch video lessons if you have a problem understanding the lessons. Get more than 40% of total progress to get an Intermediate rank.";
		}
		else if ($rank_num >= 40.00 && $rank_num <=70.00)
		{
			$rank = "You are an Intermediate now. Practice more and you'll awarded Master rank at total progress more than 70%.";
		}
		else
		{
			$rank = "You are now a Master. Congratulations, you can now post lessons and teach others.";
		}  
		
		$data['rank'] = $rank;
		$data['total_percentage'] = $rank_num;
		
		//enable users to post a lesson if they have master rank
		
		if($rank_num >= 70)
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
		
		
		$data['learnLinks'] = $this->Pages_model->display_lesson();
		$data['videoLinks'] = $this->Pages_model->display_video();
		$data['total_quiz'] = $this->Pages_model->count_lessons();
		//load lessons into a variable
		$data['lesson'] = $this->Pages_model->display_a_lesson($id);
		
		$this->load->view('theory101/logged_header',$data);
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
	
		$data['learnLinks'] = $this->Pages_model->display_lesson();
		$data['videoLinks'] = $this->Pages_model->display_video();
		$data['total_quiz'] = $this->Pages_model->count_lessons();
		
		$this->load->view('theory101/logged_header',$data);
		$this->load->view('theory101/video/video_content',$data);
		$this->load->view('theory101/footer_theory');
	}
	
	public function quiz($chapter)
	{
		//use the chapter to group the quizzes together
		$this->load->model('Quiz_model');
		$this->load->model('Pages_model');
		
		$data['quiz'] = $this->Quiz_model->get_quiz_question($chapter);
		
		$data['learnLinks'] = $this->Pages_model->display_lesson();
		$data['videoLinks'] = $this->Pages_model->display_video();
		$data['total_quiz'] = $this->Pages_model->count_lessons();
		$data['chapter_num'] = $chapter;
		
		$this->load->view('theory101/logged_header',$data);
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
		$this->load->model('Pages_model');
		
		$lesson_id = $this->Pages_model->get_chapter_id($this->input->post('chapter'));
		
		//save the data in array to send to the quiz_marks table
		$data = array(
				'user_id' => $this->session->userdata('id'),
				'quiz_chapter' => $this->input->post('chapter'),
				'total_question' => $total_question,
				'marks' => $correct,
				'percentage' => $percentage
				);
		
		$this->Quiz_model->add_marks($data);
	 	
	 	if($percentage == 100)
	 	{
	 	$this->confirm('Result',"Congratulations, You scored $correct out of $total_question
	 	 <br> $percentage% ",'theory101_logged');
	 	}
	 	else
	 	{
	 	$this->confirm_retry('Result',"You scored $correct out of $total_question
	 	 <br> $percentage%. You can retry the Quiz or read the chapter again. ",'theory101_logged',$lesson_id,$this->input->post('chapter'));
	 	}
	}
	
	public function confirm($title,$message,$link)
	{
		$data['title'] = $title;
		$data['message'] = $message;
		$data['link'] = $link;
		
		$this->load->view('swan/swan_confirm',$data);
	}
	
	public function confirm_retry($title,$message,$link,$chapter,$quiz)
	{
		$data['title'] = $title;
		$data['message'] = $message;
		$data['link'] = $link;
		$data['linkChapter'] = "theory101_logged/lessons/$chapter";
		$data['linkQuiz'] = "theory101_logged/quiz/$quiz";
		
		$this->load->view('theory101/quiz/quiz_confirm',$data);
	}
	
	public function post_lesson()
	{
		//post a lesson for MASTER ranks
		$this->load->model('Pages_model');
		
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		$data['user_id'] = $this->input->post('user_id');
		$data['username'] = $this->session->userdata('username');
		
		$this->Pages_model->add_user_lesson($data);
		
		$this->confirm('Success','You lesson has been added in the database','theory101_logged');
	}
	
	public function display_lesson_form()
	{
		//display the add lesson form
		$this->load->model('Quiz_model');
		$this->load->model('Pages_model');
		
		$data['learnLinks'] = $this->Pages_model->display_lesson();
		$data['videoLinks'] = $this->Pages_model->display_video();
		$data['total_quiz'] = $this->Pages_model->count_lessons();
	
		$data['user_id'] = $this->session->userdata('id');
		$data['username'] = $this->session->userdata('username');
		
		$this->load->view('theory101/logged_header',$data);	
		$this->load->view('theory101/lessons/add_lesson',$data);	
		$this->load->view('theory101/footer_theory');
	}
	
	public function display_posted_lesson()
	{
		//display lessons that the user posted
		$this->load->model('Pages_model');
	}
}





