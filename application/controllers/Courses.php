<?php
class Courses extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('course_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('text');
        $this->load->helper('htmlpurifier');

    }


    public function index()
    {
        $data['title'] = 'Kurse';
        $data['courses'] = $this->course_model->get_courses();


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

$this->email->from('severin.students.fhnw.ch');
$this->email->to('severin.students.fhnw.ch');
$this->email->subject('Email Test');
$this->email->message('Testing the email class.');
$this->email->send();




        $data['emaildebug'] = $this->email->print_debugger();

        $this->load->view('templates/header', $data);
        $this->load->view('courses/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function manage()
    {
        if ($this->session->userdata('logged_in')) {
            $data['title'] = 'Kursverwaltung';
            $data['courses'] = $this->course_model->get_courses_by_user();

            $this->load->view('templates/header', $data);
            $this->load->view('courses/manage', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('users/login');
        }
    }

    public function view($slug = NULL){
        $data['course'] = $this->course_model->get_courses($slug);
        if(empty($data['course'])){
            show_404();
        }
        $data['title'] = $data['course']['title'];
        $this->load->view('templates/header', $data);
        $this->load->view('courses/view', $data);
        $this->load->view('templates/footer',$data);
    }

    public function create(){
        // Check login
        if($this->session->userdata('logged_in')) {
            $data['title'] = 'Kurs erstellen';
            $data['categories'] = $this->course_model->get_categories();
            $this->form_validation->set_rules('title', 'Title', 'required|is_unique[courses.title]');
            $this->form_validation->set_rules('body', 'Body', 'required');
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header',$data);
                $this->load->view('courses/create', $data);
                $this->load->view('templates/footer');
            }else{
                $this->course_model->create_course();

                $this->session->set_flashdata('course_created', 'Your course has been created.');

                redirect('courses');
            }
        }else{
            redirect('users/login');
        }



    }
    public function delete($id){

        if($this->session->userdata('logged_in')) {

            $this->course_model->delete_course($id);
            redirect('courses');
        }else{
            redirect('users/login');
        }

    }

    public function edit($slug){

        if($this->session->userdata('logged_in')) {

            $data['course'] = $this->course_model->get_courses($slug);
            $data['title'] = 'Edit course';

            $data['categories'] = $this->course_model->get_categories();


            if (empty($data['course'])) {
                show_404();
            }

            $this->load->view('templates/header', $data);
            $this->load->view('courses/edit', $data);
            $this->load->view('templates/footer', $data);

        }else{
            redirect('users/login');
        }

    }

    public function update($id){

        if($this->session->userdata('logged_in')) {

            $this->course_model->update_course($id);
            $this->session->set_flashdata('course_updated', 'Your course has been updated.');
            redirect('courses');

        }else{
            redirect('users/login');
        }

    }



}
