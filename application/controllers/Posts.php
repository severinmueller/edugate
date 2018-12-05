<?php
class Posts extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->model('comment_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('text');
        $this->load->helper('htmlpurifier');

    }


    public function index()
    {
        $data['title'] = 'Latest Posts';
        $data['posts'] = $this->post_model->get_posts();

        $this->load->view('templates/header', $data);
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($slug = NULL){
        $data['post'] = $this->post_model->get_posts($slug);
        $post_id = $data['post']['id'];
        $data['comments'] = $this->comment_model->get_comments($post_id);
        if(empty($data['post'])){
            show_404();
        }
        $data['title'] = $data['post']['title'];
        $this->load->view('templates/header', $data);
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer',$data);
    }

    public function create(){
        // Check login
        $data['title'] = 'Create Post';
        $data['categories'] = $this->post_model->get_categories();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');
        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');
        } else {
            // Upload Image
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload()){
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.jpg';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }
            $this->post_model->create_post($post_image);

            $this->session->set_flashdata('post_created', 'Your post has been created.');

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

        $data['categories'] = $this->post_model->get_categories();


        if (empty($data['post'])) {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer', $data);

    }

    public function update($id){
        $this->post_model->update_post($id);

        $this->session->set_flashdata('post_updated', 'Your post has been updated.');

        redirect('posts');
    }
}
