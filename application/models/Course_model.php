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
            $this->db->order_by('courses.title', 'DESC');
            $this->db->join('categories', 'categories.id = courses.category_id');
            $this->db->join('users', 'users.id = courses.user_id');
            $query = $this->db->get('courses');
            return $query->result_array();
        }

        $this->db->join('users', 'users.id = courses.user_id');
        $query = $this->db->get_where('courses', array('slug' => $slug));
        return $query->row_array();

    }

    public function get_courses_by_id($id)
    {
        $query = $this->db->get_where('courses', array('courseid' => $id));
        return $query->row_array();

    }

    public function get_courses_by_user()
    {
            $user_id =  $this->session->userdata('user_id');
        $this->db->order_by('courses.title', 'DESC');
        $this->db->join('categories', 'categories.id = courses.category_id');
        $this->db->join('users', 'users.id = courses.user_id');
            $query = $this->db->get_where('courses', array('user_id' => $user_id));
            return $query->result_array();
    }

    public function create_course(){
        $slug = url_title($this->input->post('title'));

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'location' => $this->input->post('location'),
            'start_date' => $this->input->post('start_date'),
            'category_id' => $this->input->post('category'),
            'user_id' => $this->session->userdata('user_id'),
        );

            return $this->db->insert('courses',$data);


        $this->load->library('email');

        $this->email->initialize(array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_user' => getenv("SENDGRID_USERNAME"),
            'smtp_pass' => getenv("SENDGRID_PASSWORD"),
            'smtp_port' => 587,
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ));

        $user_id =  $this->session->userdata('user_id');
        $this->db->where('id',$user_id);
        $result = $this->db->get('users');
        $email =  $result->row(0)->email;
        $invoicenumber = rand(0,999999);

        $this->email->from('edugate@sendgrid.me');
        $this->email->to($email);
        $this->email->subject('Rechnung - Kursanzeige für '.$coursetitle);
        $this->email->message('Guten Tag, \n Sie haben eine Kursanzeige gekauft für den Kurs '.$coursetitle.' gekauft. \n Kosten: 50 CHF. \n Bitte begleichen Sie die Rechnung unter Angabe der Referenz '.$invoicenumber.' auf das Konto XXXXXXXX. \n \n Freundliche Grüsse \n edugate');
        $this->email->send();


    }

    public function delete_course($id){
        $this->db->where('courseid',$id);
        $this->db->delete('courses');
        return true;
    }

    public function update_course($id){
        $data = array(
            'location' => $this->input->post('location'),
            'start_date' => $this->input->post('start_date'),
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category')
        );

        $this->db->where('courseid',$id);
        return $this->db->update('courses',$data);
    }

    public function get_categories(){
        $this->db->order_by('name');
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    public function get_courses_by_category($id){
        $this->db->order_by('courses.title', 'DESC');
        $this->db->join('categories', 'categories.id = courses.category_id');
        $this->db->join('users', 'users.id = courses.user_id');
        $query = $this->db->get_where('courses', array('category_id' => $id));
        return $query->result_array();
    }

    public function get_course_userid($id){
        $this->db->where('courseid', $id);
        $result = $this->db->get('courses');
        return $result->row(0)->user_id;
    }
}