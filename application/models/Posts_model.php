<?php
class Posts_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_posts($id = FALSE)
        {
        if ($id === FALSE)
        {
            $sql = "SELECT *, (SELECT count(*) from comments AS C WHERE C. post_id = P.id) as count FROM posts AS P ORDER BY created_at desc";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        $query = $this->db->get_where('posts', array('id' => $id));
        return $query->row_array();
        }

        public function set_posts()
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
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'name' => $name
            );

            return $this->db->insert('posts', $data);
        }

        public function edit_posts($id)
        {
            $this->load->helper('url');

            $data = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content')
            );

            $this->db->where('id', $id);
            return $this->db->update('posts', $data);
        }

        public function delete_posts($id)
        {
            $this->db->delete('posts', array('id' => $id));
            $this->db->delete('comments', array('post_id' => $id));

            return;
        }
}
