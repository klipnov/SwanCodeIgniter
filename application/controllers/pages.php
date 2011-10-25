<?php
class Pages extends CI_Controller {	
	
	public function index ()
	{
		$this->load->model('Swan_model');
		
		$data['main_links'] = $this->Swan_model->links();
		$data['content'] = "Pages Content";
		
		$this->load->view('swan_header');
		$this->load->view('swan_menu',$data);
		$this->load->view('swan_content',$data);
		$this->load->view('swan_footer');
	}
}
