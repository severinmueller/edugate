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
        $this->load->database();

    }

        public function send(){

            $this->db->join('users', 'users.id = courses.user_id');
            $this->db->select('email');
            $this->db->select('slug');
            $query = $this->db->get_where('courses', array('start_date' => date('Y-m-d')));
            $result = $query->result_array();

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
            foreach($result as $row) {
                $this->email->from('reminder@edugate.ch');
                $this->email->bcc($row['email']);
                $this->email->subject('Erinnerung - Startdatum Kurs');
                $this->email->message('Guten Tag, das Startdatum ihres Kurses '.$row['slug'].' ist abgelaufen. Bitte überprüfen Sie den entsprechenden Kurs auf https://edugate-ch.herokuapp.com/courses/manage');
                $this->email->send();
}
    }
}

$obj = new reminder();
echo $obj->send();