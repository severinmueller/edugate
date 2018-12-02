<?php

    class Users extends CI_Controller{
        public function register(){
            $data['title'] = 'Sign up';

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm password', 'required|matches[password]');


        if($this->form_validation->run() === FALSE){
            $this->load->view('template/header',$data);
            $this->load->view('users/register',$data);
            $this->load-view('template/header');
    }else{
            die('Continue');
}
    }
}

