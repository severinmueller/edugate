<?php
/**
 * Created by PhpStorm.
 * User: 2
 * Date: 28.11.2018
 * Time: 17:47
 */

class Category_model extends CI_Model{

    public function __construct(){
        $this->load->database();
}


public function create_category(){
        $data = array(
            'name' => $this->input->post('name')
        );

        return $this->db->insert('categories', $data);

}


}