<?php
class Likes_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_like($id)
        {
                $this->db->where('user_name', $_SESSION['name']);
                $this->db->where('post_id', $id);
                $query = $this->db->get('likes');
                return $query->result_array();
        }

        public function get_likes_post($name)
        {
                $this->db->select('post_id');
                $this->db->where('user_name', $name);
                $this->db->where('comment_id', NULL);
                $query = $this->db->get('likes');
                return $query->result_array();
        }

        public function get_likes_comment($name)
        {
                $this->db->where('user_name', $name);
                $this->db->where('post_id', NULL);
                $query = $this->db->get('likes');
                return $query->result_array();
        }

        public function set_likes_post($id)
        {
                $this->load->helper('url');

                $data = array(
                    'post_id' => $id,
                    'user_name' => $_SESSION['name']
                );

                return $this->db->insert('likes', $data);
        }

        public function set_likes_comment($id)
        {
                $this->load->helper('url');

                $data = array(
                    'comment_id' => $id,
                    'user_name' => $_SESSION['name']
                );

                return $this->db->insert('likes', $data);
        }

        public function delete_likes_post($id)
        {
                $this->db->where('post_id', $id);
                $this->db->where('user_name', $_SESSION['name']);
                $this->db->delete('likes');

                return;
        }

        public function delete_likes_comment($id)
        {
                $this->db->where('comment_id', $id);
                $this->db->where('user_name', $_SESSION['name']);
                $this->db->delete('likes');

                return;
        }
}
