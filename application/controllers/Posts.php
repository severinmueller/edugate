<?php
class Posts extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['title'] = 'Latest Posts';
        $data['posts'] = $this->post_model->get_posts();

        $this->load->view('templates/header', $data);
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($id = NULL)
    {
        $data['post'] = $this->post_model->get_posts($id);
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

    }

    public function delete($id){
        $this->post_model->delete_post($id);
        redirect('posts');
    }

    public function edit($slug){

        $data['post'] = $this->post_model->get_posts($slug);
        $data['title'] = 'Edit post';

        if (empty($data['post'])) {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer', $data);

    }

    public function update($id){
        $this->post_model->update_post($id);
        redirect('posts');
    }
}
