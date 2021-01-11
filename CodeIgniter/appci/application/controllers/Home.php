<?php

class Home extends CI_Controller
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
    } 

    public function index()
    {
        $this->load->view('index');
    }

    public function Users()
    {
        $data['users'] = $this->home_model->getUsers();
        $this->load->view('users', $data);
    }
}

?>