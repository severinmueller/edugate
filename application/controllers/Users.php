<?php

    class Users extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url_helper');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->model('user_model');
        }



        public function register(){
            $data['title'] = 'Sign up';

            $this->form_validation->set_rules('name', 'Organisation', 'required|is_unique[users.name]', array('is_unique' => 'This %s already exists.'));
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]|valid_email', array('is_unique' => 'This %s already exists.'));
            $this->form_validation->set_rules('password', 'Password', 'required');
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

            redirect('users/login');

        }
    }

        public function login()
        {

            if (!$this->session->userdata('logged_in')) {

                $data['title'] = 'Sign in';

                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');


                if ($this->form_validation->run() === FALSE) {
                    $this->load->view('templates/header', $data);
                    $this->load->view('users/login', $data);
                    $this->load->view('templates/footer', $data);
                } else {


                    $email = $this->input->post('email');

                    $hash = $this->user_model->get_hash($email);

                    if (password_verify($this->input->post('password'), $hash)) {
                        $user_id = $this->user_model->get_userid($email);

                        $user_data = array(
                            'user_id' => $user_id,
                            'email' => 'email',
                            'logged_in' => true
                        );

                        $this->session->set_userdata($user_data);


                        $this->session->set_flashdata('user_logged_in', 'Sie sind jetzt eingeloggt');

                        redirect('courses/manage');


                    } else {
                        $this->session->set_flashdata('user_login_failed', 'Login gescheitert. Falsches Passwort oder Name');

                        redirect('users/login');
                    }

                }
            } else {
                $this->session->set_flashdata('user_login_failed', 'Already logged in.');
                redirect('courses/manage');
            }
        }


        public function logout(){

            if($this->session->userdata('logged_in')){
            $user_data = array('user_id', 'username', 'logged_in');
            $this->session->unset_userdata($user_data);
            $this->session->set_flashdata('user_logged_out', 'You are now logged out.');
            redirect('users/login');
        }else{
                redirect('');
            }
        }
    }


