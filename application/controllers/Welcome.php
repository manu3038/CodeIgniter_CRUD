<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/index.php/welcome
	*	- or -
	* 		http://example.com/index.php/welcome/index
	*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see https://codeigniter.com/user_guide/general/urls.html
	*/
	// autoloaded libraries and helpers
	function __construct()
	{
		parent::__construct();
		$this->load->model('blogmodel');//loading the model of the blog
	}

// home page or add blog page
	public function index()
	{
		$this->load->view('header');
		$this->load->view('blog');
	}

// function to view blog page
	public function viewBlog()
	{
		$this->data['posts'] = $this->blogmodel->retrievepost();
		$this->load->view('header');
		$this->load->view('viewBlog',$this->data);
	}


	// controller function to store data
	public function saveData()
	{

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('head', 'Title', 'required',array('required' => 'Title for the post is mandatory'));//title cant be empty
		$this->form_validation->set_rules('body', 'Description', 'required',array('required' => 'Description can\'t be empty' ));// body cant be empty
		if ($this->form_validation->run() == FALSE) {//checking the form rules
			$this->load->view('header');
			$this->load->view('blog');
		}
		else {
			$this->blogmodel->process();
			$this->viewBlog();
		}
	}


	// controller function to edit the data of blog
	public function editBlog()
	{
		$pid=$this->input->get('id');
		$data['post'] = $this->blogmodel->editBlog($pid);
		$this->load->view('header');
		$this->load->view('editpost',$data);// loading view and giving the data from DB to display

	}


	//this is to update the blog
	public function updateBlog()
	{
		$pid=$this->input->post('id');
		$data['post']= $this->blogmodel->editBlog($pid);
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('head', 'Title', 'required',array('required' => 'Title for the post is mandatory'));//title cant be empty
		$this->form_validation->set_rules('body', 'Description', 'required',array('required' => 'Description can\'t be empty' ));// body cant be empty
		if ($this->form_validation->run() == FALSE){
			$this->load->view('header');
			$this->load->view('editpost',$data);
		}else{
			$this->blogmodel->updateBlog();
			$this->viewBlog();
		}
	}


	//controller function to delete the data
	public function deleteBlog()
	{
		$pid = $this->input->get('id');
		$this->blogmodel->deleteBlog($pid);
		$this->viewBlog();
	}
}
