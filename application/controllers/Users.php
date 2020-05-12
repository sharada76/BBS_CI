<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('users_model');
			$this->load->helper('url_helper');
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->view('templates/header');
		$this->load->view('posts/login');
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'ユーザー名', 'required');
		$this->form_validation->set_rules('password', 'パスワード', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('posts/regist');
			$this->load->view('templates/footer');

		}
		else
		{
			$this->load->view('templates/header');
			$this->load->view('posts/login');
			$this->load->view('templates/footer');
		}
	}

	public function store()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'ユーザー名', 'required|is_unique[users.name]');
		$this->form_validation->set_rules('password', 'パスワード', 'required|trim');

		$this->form_validation->set_message("is_unique", "入力したユーザー名はすでに登録されています");

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('posts/regist');
			$this->load->view('templates/footer');
		}
		else
		{
			$this->users_model->set_user();

			$this->load->view('templates/header');
			$this->load->view('posts/login');
			$this->load->view('templates/footer');
		}
	}

	public function login()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');

		$this->form_validation->set_rules('name', 'ユーザー名', 'required');
		$this->form_validation->set_rules('password', 'パスワード', 'required|trim');
		$this->form_validation->set_rules('result', 'result', 'callback_check_login');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('posts/login');
			$this->load->view('templates/footer');
		}
		else
		{
			$newdata = array(
				'name' => $this->input->post("name"),
				'password' => $this->input->post("password"),
				'logged_in' => TRUE,
				'time' => time()
			);
			$this->session->set_userdata($newdata);
			$this->session->has_userdata('name');
			redirect('/posts/index');
		}
	}

	public function check_login()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		if($this->users_model->login()){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_login', '※ユーザー名かパスワードが異なります。');
			return FALSE;
		}
	}

	public function logout(){
		$this->load->library('session');

		$this->session->sess_destroy();
		redirect ("users/login");
	}
}
