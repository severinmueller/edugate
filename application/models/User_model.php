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
        $tokenexploded = explode(".", $token);
        $userpart = $tokenexploded[0];
        $tokenpart = $tokenexploded[1];
        $this->db->where('user_id', $userpart);
        $this->db->where('purpose', 'reset');
        $this->db->where('token', $tokenpart);
        $this->db->where('expired', FALSE);
        $this->db->where('date', date('Y-m-d'));
        $result = $this->db->get('user_tokens');

        if(!(empty($result))){
            $data = array(
                'password' => $enc_password,
            );
            $this->db->where('id',$userpart);
            return $this->db->update('users', $data);
        }
    }


}
