<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('posts_model');
			$this->load->model('comments_model');
			$this->load->helper('url_helper');
	}

	public function store($id)
	{
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('content', '本文', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$data['post_item'] = $this->posts_model->get_posts($id);
			$data['comments'] = $this->comments_model->get_comments($id);
			$this->load->view('templates/header');
			$this->load->view('posts/show', $data);
			$this->load->view('templates/footer');
		}
		else
		{

			$this->comments_model->set_comments();

			redirect('/posts/view/' . $id);
		}
	}

	public function delete($id)
	{
		$data =$this->comments_model->delete_comments($id);

		redirect('/posts/view/'. $data->post_id);
	}
}
