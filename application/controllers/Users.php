<?php

    class Users extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url_helper');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->model('user_model');
        }



        public function register(){
            $data['title'] = 'Sign up';

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]', array('is_unique' => 'This %s already exists.'));
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm password', 'required|matches[password]');


        if($this->form_validation->run() === FALSE){
            $data['title'] = 'Sign up';
            $this->load->view('templates/header', $data);
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer',$data);
    }else{

            $password = $this->input->post('password');
            $enc_password = password_hash($password, PASSWORD_ARGON2I);
            $this->user_model->register($enc_password);

            $this->session->set_flashdata('user_registered', 'You are now registered.');

            redirect('posts');

        }
    }

        public function login(){
            $data['title'] = 'Sign in';

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');


            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header', $data);
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer',$data);
            }else {

                $username = $this->input->post('username');

                $hash = $this->user_model->get_hash($username);

                if(password_verify($this->input->post('password'), $hash)){
                    $this->session->set_flashdata('user_logged_in', 'You are now logged in.');
                    die('SUCCESS');
                    redirect('posts');


                }else{
                    $this->session->set_flashdata('user_login_fail', 'Login invalid.');

                    redirect('posts');


                }

            }
        }
    }


