<?php

    class Categories extends CI_Controller{

        public function  __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->helper('form');
        }

        public function create(){
            $data['title'] = 'Create category';

            $this->form_validation->set_rules('name', 'Name', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            }else{
                $this->category_model->create_category();
                redirect('categories');
            }
        }


    }