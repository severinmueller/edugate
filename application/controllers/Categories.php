<?php

    class Categories extends CI_Controller{

        public function  __construct()
        {
            parent::__construct();
            $this->load->model('category_model');
            $this->load->helper('url_helper');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->helper('text');
        }

        public function index(){
            $data['title'] = 'Categories';

            $data['categories'] = $this->category_model->get_categories();

            $this->load->view('templates/header', $data);
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer', $data);


        }

        public function create(){
            $data['title'] = 'Create category';

            $this->form_validation->set_rules('name', 'Name', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header', $data);
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer', $data);
            }else{
                $this->category_model->create_category();
                redirect('categories');
            }
        }

        public function posts($id){
            $data['title'] = $this->category_model->get_category($id)->name;
            $data['posts'] = $this->post_model->get_posts_by_category($id);

            $this->load->view('templates/header', $data);
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer', $data);
        }


    }