<?php
class Pages extends CI_Controller {	
	
	public function index ()
	{
		$this->load->model('Swan_model');
		$this->load->model('Pages_model');
		
		$data['main_links'] = $this->Swan_model->links();
		$data['content'] = "Pages Content";
		
		$data['main_pages'] = $this->Pages_model->display_main_pages();
		$data['lesson'] = $this->Pages_model->display_lesson();
		
		$this->load->view('swan/swan_header');
		$this->load->view('swan/swan_menu',$data);
		$this->load->view('pages/pages_content',$data);
		$this->load->view('swan/swan_footer');
	}
	
	//displays the page information and also be able to edit its contents
	public function display_page_info($id)
	{
		$this->load->model('Swan_model');
		$this->load->model('Pages_model');
		
		$data['main_links'] = $this->Swan_model->links();
		$data['content'] = $this->Pages_model->display_a_page($id);
		
		$this->load->view('pages/pages_header');
		$this->load->view('swan/swan_menu',$data);
		$this->load->view('pages/display_pages_content',$data);
		$this->load->view('swan/swan_footer');
	}
	
	//displays the form to add page content
	public function display_add_page()
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
	public function add_page()
	{
		$this->load->model('Pages_model');
		$this->load->helper('url');
		
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		
		$this->Pages_model->add_page($data);
		
		echo "<h3>" . $data['title'] . " has been added" . "</h3>";
		echo anchor('/pages','return');
	}
	
	//udpates a page
	public function update_page()
	{
		$this->load->model('Pages_model');
		$this->load->helper('url');
		
		$id = $this->input->post('id');
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		
		$this->Pages_model->update_page($id,$data);
		
		echo "<h3>" . $data['title'] . " has been updated" . "</h3>";
		echo anchor('/pages','return');
	}
	
	//preview a page in SWAN using display a page function in the pages model
	public function preview($id)
	{
		$this->load->model('Pages_model');
		$this->load->model('Swan_model');
		
		$data['content'] = $this->Pages_model->display_a_page($id);
		
		$data['main_links'] = $this->Swan_model->links();
		
		$this->load->view('pages/pages_header');
		$this->load->view('swan/swan_menu',$data);
		$this->load->view('pages/pages_preview',$data);
		$this->load->view('swan/swan_footer');
	}
	
	//removes a page from the database
	public function remove_page($id)
	{
		$this->load->model('Pages_model');
		$this->load->helper('url');
		
		$this->Pages_model->remove_page($id);
		
		echo "<h3>Page removed</h3>";
		echo anchor("/pages","return");
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
	
	public function has_been_added($title,$postfix)
	{
		$this->load->helper('url');
		
		echo "<h3>" . $title . " has been " . $postfix;
		echo anchor("/pages","return");
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
		
		$this->has_been_added($data['title'],"added");
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
		
		$this->has_been_added($data['title'],"updated");
	}
	
	public function remove_lesson($id)
	{
		$this->load->model('Pages_model');
		$this->load->helper('url');
		
		$this->Pages_model->remove_lesson($id);
		
		echo "lesson removed";
		echo anchor('/pages','return');
	}
		
}
