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


    }