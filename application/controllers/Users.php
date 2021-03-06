<?php

    class Users extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url_helper');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->model('user_model');
            $this->load->helper('date');
        }

        public function register(){
            $data['title'] = 'Registrieren';

            $this->form_validation->set_rules('name', 'Organisation', 'required|is_unique[users.name]', array('is_unique' => 'This %s already exists.'));
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]|valid_email', array('is_unique' => 'This %s already exists.'));
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm password', 'required|matches[password]');


        if($this->form_validation->run() === FALSE){
            $data['title'] = 'Registrieren';
            $this->load->view('templates/header', $data);
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer',$data);
    }else{

            $password = $this->input->post('password');
            $enc_password = password_hash($password, PASSWORD_ARGON2I);
            $this->user_model->register($enc_password);

            $this->session->set_flashdata('user_registered', 'Sie sind jetzt registriert.');

            redirect('users/login');

        }
    }

        public function login()
        {

            if (!$this->session->userdata('logged_in')) {

                $data['title'] = 'Anmelden';

                $this->form_validation->set_rules('email', 'E-Mail', 'required');
                $this->form_validation->set_rules('password', 'Passwort', 'required');


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
                        $this->session->set_flashdata('user_login_failed', 'Login gescheitert. Falsches Passwort oder E-Mail-Adresse.');

                        redirect('users/login');
                    }

                }
            } else {
                $this->session->set_flashdata('user_login_failed', 'Sie sind bereits eingeloggt.');
                redirect('courses/manage');
            }
        }


        public function logout(){

            if($this->session->userdata('logged_in')){
            $user_data = array('user_id', 'username', 'logged_in');
            $this->session->unset_userdata($user_data);
            $this->session->set_flashdata('user_logged_out', 'Sie sind nun ausgeloggt.');
            redirect('users/login');
        }else{
                redirect('');
            }
        }

        //öffnet das Zurücksetzformular
        public function reset($token = null)
        {
            $data['title'] = 'Passwort vergessen';
            $data['token1'] = $token;
            if (empty($token)) {
                $this->load->view('templates/header', $data);
                $this->load->view('users/reset/form', $data);
                $this->load->view('templates/footer', $data);
            }else{
                $token = $this->uri->segment(3);
                $data['token1'] = $token;
                $this->load->view('templates/header', $data);
                $this->load->view('users/reset/newpassword', $data);
                $this->load->view('templates/footer', $data);
            }
        }

        public function reset2($token){
            $data['title'] = 'Passwort vergessen';

            $this->form_validation->set_rules('password', 'Passwort bestätigen', 'required');
            $this->form_validation->set_rules('password2', 'Passwort bestätigen', 'required|matches[password]');

            if ($this->form_validation->run() === FALSE) {
                $token = $this->uri->segment(3);
                $data['token1'] = $token;
                $this->load->view('templates/header', $data);
                $this->load->view('users/reset/newpassword', $data);
                $this->load->view('templates/footer', $data);
            } else {

                $password = $this->input->post('password');
                $enc_password = password_hash($password, PASSWORD_ARGON2I);
                $this->user_model->update($token,$enc_password);

                redirect('users/login');

            }
        }

        public function activate($token = null){

        }

        public function sendtoken(){
            $email = $this->input->post('email');
            $this->user_model->send_token($email);
            $this->session->set_flashdata('reset_email_sent', 'Dein Link zum Zurücksetzen des Passworts wurde gesendet (bitte Spam-Ordner überprüfen).');

            redirect('users/login');
        }

    }


