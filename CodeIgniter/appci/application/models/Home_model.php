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

    public function getUserById($id)
    {
        $query = $this->db->get_where('users', ['id' => $id]);
        return $query->result_array();
    }
    
    public function addData($table, $array)
    {
        $this->db->insert($table, $array);
        return $this->db->insert_id();
    }
}

?>