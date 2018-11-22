<?php
class Posts extends CI_Controller {

    public function index()
    {
        $this->load->helper('url_helper');

        $data['title'] = 'Latest Posts';

        $this->load->view('templates/header', $data);
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer', $data);
    }
}