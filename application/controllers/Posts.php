<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('posts_model');
			$this->load->model('comments_model');
			$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['posts'] = $this->posts_model->get_posts();

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($id = NULL)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['post_item'] = $this->posts_model->get_posts($id);
		$data['comments'] = $this->comments_model->get_comments($id);

		if (empty($data['post_item']))
		{
				show_404();
		}

		$this->load->view('templates/header');
		$this->load->view('posts/show', $data);
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			// $data['error'] = TRUE;
			$this->load->view('templates/header');
			$this->load->view('posts/create');
			$this->load->view('templates/footer');
		}
		else
		{
			$this->posts_model->set_posts();

			$data['posts'] = $this->posts_model->get_posts();
			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'content', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('posts/create');
			$this->load->view('templates/footer');

		}
		else
		{
		$this->load->view('templates/header');
		$this->load->view('posts/create');
		$this->load->view('templates/footer');
		}
	}

	public function edit($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['post_item'] = $this->posts_model->get_posts($id);

		$this->load->view('templates/header');
		$this->load->view('posts/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$data['post_item'] = $this->posts_model->get_posts($id);
			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->posts_model->edit_posts($id);

			$data['post_item'] = $this->posts_model->get_posts($id);
			$data['comments'] = $this->comments_model->get_comments($id);
			$this->load->view('templates/header');
			$this->load->view('posts/show', $data);
			$this->load->view('templates/footer');
		}
	}

	public function delete($id)
	{
		$this->posts_model->delete_posts($id);

		redirect('/posts/index');
	}
}
