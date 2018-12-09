<?php

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
