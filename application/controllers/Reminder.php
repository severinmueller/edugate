<?php

class Reminder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('course_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('text');
        $this->load->helper('htmlpurifier');
    }

    public function send(){

        $this->load->library('email');

        $this->email->initialize(array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_user' => getenv("SENDGRID_USERNAME"),
            'smtp_pass' => getenv("SENDGRID_PASSWORD"),
            'smtp_port' => 587,
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ));

        $this->email->from('edugate@sendgrid.me');
        $this->email->to('severin.mueller@students.fhnw.ch');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        $this->email->send();

    }
}

$obj = new reminder();
echo $obj->send();