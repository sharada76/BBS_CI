<?php
class Users_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_comments($id = FALSE)
        {
                $this->db->order_by('created_at', 'DESC');
                $query = $this->db->get_where('comments', array('post_id' => $id));
                return $query->result_array();
        }

        public function set_user()
        {
                $this->load->helper('url');

                $data = array(
                    'name' => $this->input->post('name'),
                    'password' => $this->input->post('password'),
                );

                return $this->db->insert('users', $data);
        }

	public function login(){

		$this->db->where("name", $this->input->post("name"));
		$this->db->where("password",$this->input->post("password"));
		$query = $this->db->get("users");

		if($query->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}
}
