<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Likes extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('likes_model');
			$this->load->model('comments_model');
			$this->load->helper('url_helper');
	}

	public function store($type, $id)
	{
		$this->load->library('session');

		if ($type === 'index')
		{
			$this->likes_model->set_likes_post($id);

			redirect('/posts/index/');
		}
		elseif ($type === 'view')
		{
			$this->likes_model->set_likes_post($id);

			redirect('/posts/view/' . $id);
		}
		else
		{
			$this->likes_model->set_likes_comment($id);
			$data = $this->comments_model->get_postid_by_commentid($id);

			redirect('/posts/view/' . $data->post_id);
		}
	}

	public function delete($type, $id)
	{
		$this->load->library('session');

		if ($type === 'index')
		{
			$this->likes_model->delete_likes_post($id);

			redirect('/posts/index/');
		}
		elseif ($type === 'view')
		{
			$this->likes_model->delete_likes_post($id);

			redirect('/posts/view/' . $id);
		}
		else
		{
			$this->likes_model->delete_likes_comment($id);
			$data = $this->comments_model->get_postid_by_commentid($id);

			redirect('/posts/view/' . $data->post_id);
		}
	}
}
