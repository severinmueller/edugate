<?php
    class Comments extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->model('post_model');
            $this->load->helper('url_helper');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->helper('text');
            $this->load->model('comment_model');


        }

        public function create($post_id){
            $slug = $this->input->post('slug');
            $data['post'] = $this->post_model->get_posts($slug);

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->$this->form_validation->run()===FALSE){
                $this->load->view('templates/header', $data);
                $this->load->view('posts/view', $data);
                $this->load->view('templates/footer', $data);
            }else{
                $this->comment_model->create_comment($post_id);
                redirect('post/'.$slug);
            }

        }


    }