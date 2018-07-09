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
	 function __construct()
	{
		parent::__construct();
		$this->load->model('blogmodel');
	}

	public function index()
	{
		$this->data['posts'] = $this->blogmodel->retrievepost();
		$this->load->view('blog',$this->data);// loading view and giving the data from DB to display
	}

	// controller function to store data
	public function saveData()
	{
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('head', 'Title', 'required',array('required' => 'Title for the post is mandatory'));//title cant be empty
		$this->form_validation->set_rules('body', 'Description', 'required',array('required' => 'Description can\'t be empty' ));// body cant be empty
		if ($this->form_validation->run() == FALSE) {//checking the form rules
		$this->data['posts'] = $this->blogmodel->retrievepost();
		$this->load->view('blog',$this->data); }// loading view and giving the data from DB to display
		else {
		$this->blogmodel->process();
		redirect(base_url());
	}}
	// controller function to edit the data
	public function editBlog()
	{
	$pid=$this->input->get('id');
	$data['post'] = $this->blogmodel->editBlog($pid);
	$this->load->view('editpost',$data);
	}

	//this is to update the blog
	public function updateBlog()
	{
		$title=$this->input->post('head');
		$desc=$this->input->post('body');
		$id=$this->input->post('id');

		$this->blogmodel->updateBlog($title,$desc,$id);
		redirect(base_url());
	}
	//controller function to delete the data
	public function deleteBlog()
	{
		$pid = $this->input->get('id');
		$this->blogmodel->deleteBlog($pid);
		redirect(base_url());
	}
}
