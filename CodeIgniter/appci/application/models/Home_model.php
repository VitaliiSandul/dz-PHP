<?php

class Home_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getUsers()
    {
        $res = $this->db->get('users');
        return $res->result_array();
    }
}

?>