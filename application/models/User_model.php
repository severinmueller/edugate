<?php
/**
 * Created by PhpStorm.
 * User: 2
 * Date: 05.12.2018
 * Time: 03:28
 */

class User_model extends CI_Model {
    public function register($enc_password){
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'zipcode' => $this->input->post('zipcode')
        );
        return $this->db->insert('users', $data);

}

    public function get_hash($username)
    {
        $this->db->where('username', $username);
        $this->db->select('password');
        $query = $this->db->get('users');
        return $query;



    }

}
