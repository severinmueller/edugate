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

        $token_user_id = $result->row(0)->user_id;
            $data = array(
                'password' => $enc_password,
            );


            $this->db->where('id',$token_user_id);
            $this->db->update('users', $data);

            $this->db->where('user_id',$token_user_id);
            $this->db->set('expired', TRUE);
            $this->db->update('user_tokens');

        }

    public function send_token($email){
        $token = bin2hex(random_bytes(40));
        $this->db->where('email',$email);
        $result = $this->db->get('users');
        $userid =  $result->row(0)->id;
        $link = base_url() .'users/reset/'.$userid.".".$token;

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
        $this->email->to($email);
        $this->email->subject('Reset link');
        $this->email->message('Dein Link zum Passwort-Reset: '.$link);
        $this->email->send();

        $data = array(
            'user_id' => $userid,
            'token' => $token,
            'purpose' => 'reset',
            'expired' => FALSE,
            'date' => date('Y-m-d')
        );

        $this->db->insert('user_tokens', $data);

    }

}
