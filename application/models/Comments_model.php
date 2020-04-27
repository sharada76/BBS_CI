<?php
class Comments_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_comments($id = FALSE)
        {
                $query = $this->db->get_where('comments', array('post_id' => $id));
                return $query->result_array();
        }

        public function set_comments()
        {
                $this->load->helper('url');

                if (empty($this->input->post('name')))
                {
                        $name = 'anonymous';
                }
                else
                {
                        $name =$this->input->post('name');
                }

                $data = array(
                    'post_id' => $this->input->post('id'),
                    'content' => $this->input->post('content'),
                    'name' => $name
                );

                return $this->db->insert('comments', $data);
        }

        public function delete_comments($id)
        {
                $query = $this->db->get_where('comments', array('id' => $id));
                $this->db->delete('comments', array('id' => $id));

                return $query->row();
        }
}
