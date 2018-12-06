<?php
/**
 * Created by PhpStorm.
 * User: 2
 * Date: 22.11.2018
 * Time: 20:02
 */

class Course_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_courses($slug = FALSE)
    {
        if($slug === FALSE){
            $this->db->order_by('courses.id', 'DESC');
            $this->db->join('categories', 'categories.id = courses.category');
            $query = $this->db->get('courses');
            return $query->result_array();
        }

        $query = $this->db->get_where('courses', array('slug' => $slug));
        return $query->row_array();

    }

    public function get_courses_by_user()
    {
            $user_id =  $this->session->userdata('user_id');
            $this->db->order_by('courses.id', 'DESC');
            $query = $this->db->get_where('courses', array('user_id' => $user_id));
            return $query->result_array();
    }

    public function create_post(){
        $slug = url_title($this->input->post('title'));

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'category' => $this->input->post('category'),
            'user_id' => $this->session->userdata('user_id'),
        );

            return $this->db->insert('courses',$data);
    }

    public function delete_post($id){
        $this->db->where('id',$id);
        $this->db->delete('courses');
        return true;
    }

    public function update_post($id){
        $slug = url_title($this->input->post('title'));

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'category' => $this->input->post('category')
        );

        $this->db->where('id',$id);
        return $this->db->update('courses',$data);
    }

    public function get_categories(){
        $this->db->order_by('name');
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    public function get_courses_by_category($id){
        $this->db->order_by('courses.id', 'DESC');
        $this->db->join('categories', 'categories.id = courses.category');
        $query = $this->db->get_where('courses', array('category' => $id));
        return $query->result_array();
    }
}