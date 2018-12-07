<?php

    class Categories extends CI_Controller{

        public function  __construct()
        {
            parent::__construct();
            $this->load->model('category_model');
            $this->load->model('course_model');


            $this->load->helper('url_helper');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->helper('text');
            $this->load->helper('htmlpurifier');
        }

        public function index(){
            $data['title'] = 'Edugate';

            $data['categories'] = $this->category_model->get_categories();

            $this->load->view('templates/header', $data);
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer', $data);


        }


        public function courses($id){
            $data['title'] = $this->category_model->get_category($id)->name;
            $data['posts'] = $this->course_model->get_courses_by_category($id);

            $this->load->view('templates/header', $data);
            $this->load->view('courses/index', $data);
            $this->load->view('templates/footer', $data);
        }


    }