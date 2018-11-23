<?php
class Posts extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
    }


    public function index()
    {
        $data['title'] = 'Latest Posts';
        $data['posts'] = $this->post_model->get_posts();

        $this->load->view('templates/header', $data);
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($slug = NULL)
    {
        $data['post'] = $this->post_model->get_posts($slug);
        $data['title'] = $data['post']['title'];

        if (empty($data['post'])) {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create(){

        $data['title'] = 'Create post';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer', $data );
        }else {
            $this->post_model->create_post();
            redirect('posts');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('posts/create', $data);
        $this->load->view('templates/footer', $data);
    }
}
