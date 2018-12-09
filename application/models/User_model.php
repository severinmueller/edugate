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
            'password' => $enc_password,
        );
        return $this->db->insert('users', $data);
}

    public function get_hash($email)
    {
        $this->db->where('email', $email);
        $result = $this->db->get('users');
        return $result->row(0)->password;
    }

public function get_userid($email)
{
    $this->db->where('email', $email);
    $result = $this->db->get('users');
    return $result->row(0)->id;

}

    public function update($token, $enc_password){

        $data = array(
            'password' => $enc_password,
        );
        //return $this->db->update('users', $data);
        return true;
    }


}
