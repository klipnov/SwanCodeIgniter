<?php
class Pages extends CI_Controller {	

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
	
	public function user_logged()
	{
		if($this->session->userdata('logged_in') == false)
		echo "User not logged in";
		else
		echo "User is logged";
	}
	
	public function index ()
	{
		
		
		$this->load->model('Swan_model');
		$this->load->model('Pages_model');
		
		$data['main_links'] = $this->Swan_model->links();
		$data['content'] = "Pages Content";
		
		$data['main_pages'] = $this->Pages_model->display_video();
		$data['lesson'] = $this->Pages_model->display_lesson();
		
		$this->load->view('swan/swan_header');
		$this->load->view('swan/swan_menu',$data);
		$this->load->view('pages/pages_content',$data);
		$this->load->view('swan/swan_footer');
	}
	
	//displays the page information and also be able to edit its contents
	public function display_video_info($id)
	{
		$this->load->model('Swan_model');
		$this->load->model('Pages_model');
		
		$data['main_links'] = $this->Swan_model->links();
		$data['content'] = $this->Pages_model->display_a_video($id);
		
		$this->load->view('pages/pages_header');
		$this->load->view('swan/swan_menu',$data);
		$this->load->view('pages/display_pages_content',$data);
		$this->load->view('swan/swan_footer');
	}
	
	//displays the form to add page content
	public function display_add_video()
	{
		$this->load->model('Swan_model');
		$this->load->model('Pages_model');
		
		$data['main_links'] = $this->Swan_model->links();
		
		$this->load->view('pages/pages_header');
		$this->load->view('swan/swan_menu',$data);
		$this->load->view('pages/add_page_content',$data);
		$this->load->view('swan/swan_footer');
	}
	
	//adds the page to the database
	public function add_video()
	{
		$this->load->model('Pages_model');
		$this->load->helper('url');
		
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		
		$this->Pages_model->add_video($data);
		
		$this->confirm('Added','Video has been added','pages');
	}
	
	//udpates a page
	public function update_video()
	{
		$this->load->model('Pages_model');
		$this->load->helper('url');
		
		$id = $this->input->post('id');
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		
		$this->Pages_model->update_video($id,$data);
		
		$this->confirm('Updated','Video has been updated','pages');
	}
	
	//preview a page in SWAN using display a page function in the pages model
	public function preview($id)
	{
		$this->load->model('Pages_model');
		$this->load->model('Swan_model');
		
		$data['content'] = $this->Pages_model->display_a_video($id);
		
		$data['main_links'] = $this->Swan_model->links();
		
		$this->load->view('pages/pages_header');
		$this->load->view('swan/swan_menu',$data);
		$this->load->view('pages/pages_preview',$data);
		$this->load->view('swan/swan_footer');
	}
	
	//removes a page from the database
	public function remove_video($id)
	{
		$this->load->model('Pages_model');
		$this->load->helper('url');
		
		$this->Pages_model->remove_video($id);
		
		$this->confirm('Removed','Video has been removed','pages');
	}
	
	/******************/
	/** LESSONS PART **/
	/******************/
	
	public function header()
	{
		$this->load->model('Pages_model');
		$this->load->model('Swan_model');
		
		$data['main_links'] = $this->Swan_model->links();
		
		$this->load->view('pages/pages_header');
		$this->load->view('swan/swan_menu',$data);
	}
	
	public function display_add_lesson()
	{
		$this->header();
		
		$this->load->view('pages/lesson/lesson_add_form');	
		$this->load->view('swan/swan_footer');	
	}
	
	public function lesson_preview($id)
	{
		$this->load->model('Pages_model');
		$this->load->model('Swan_model');
		
		$data['content'] = $this->Pages_model->display_a_lesson($id);
		
		$data['main_links'] = $this->Swan_model->links();
		
		$this->load->view('pages/pages_header');
		$this->load->view('swan/swan_menu',$data);
		$this->load->view('pages/lesson/lesson_preview',$data);
		$this->load->view('swan/swan_footer');
	}
	
	public function add_lesson()
	{
		$this->load->model('Pages_model');
		
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		
		$this->Pages_model->add_lesson($data);
		
		$this->confirm('Added','Lesson has been added','pages');
	}
	
	public function display_lesson_info($id)
	{
		$this->load->model('Pages_model');
		
		$data['content'] = $this->Pages_model->display_a_lesson($id);
		
		$this->header();
		$this->load->view('pages/lesson/display_a_lesson',$data);
		$this->load->view('swan/swan_footer');
		
	}
	
	public function update_lesson()
	{
		$this->load->model('Pages_model');
		
		$id = $this->input->post('id');
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		
		$this->Pages_model->update_lesson($id,$data);
		
		$this->confirm('Updated','Lesson has been updated','pages');
	}
	
	public function remove_lesson($id)
	{
		$this->load->model('Pages_model');
		$this->load->helper('url');
		
		$this->Pages_model->remove_lesson($id);
		
		$this->confirm('Removed','Lesson has been removed','pages');
	}
	
		public function confirm($title,$message,$link)
	{
		$data['title'] = $title;
		$data['message'] = $message;
		$data['link'] = $link;
		
		$this->load->view('swan/swan_confirm',$data);
	}
		
}
