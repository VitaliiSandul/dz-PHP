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
    
    public function getUserInfo()
    {
        if (!$this->input->post('send'))
        {
            $data['list'] = $this->home_model->getUsers();
            $this->load->view('form_user_id', $data);
        }
        else 
        {
            $id = $this->input->post('userid');
            $user = $this->home_model->getUserById($id);
            $data['user'] = $user;
            $data['title'] = 'Information about user ' . $id;
            $this->load->view('user_info', $data);
        }
    }

    public function selectPhoto()
    {
        $send = $this->input->post('send');
        if (!$send)
        {
            $this->load->view('form_upload');
        }
        else 
        {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image'))
            {
                $data = ['error' => $this->upload->display_errors()];
                $this->load->view('form_upload', $data);
            }
            else
            {
                $this->load->helper('url');
                    redirect('home/index');
            }
        }
    }
    
    public function registration()
    {
        if (!$this->input->post('send'))
        {            
            $this->load->view('form_insert_user');  
        }
        else 
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Name', 'trim|required',
                                             ['required'=>'You have not filled %s.']);
            $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required',
                                             ['required'=>'You have not filled %s.']);
            $this->form_validation->set_rules('login', 'Login', 'trim|required|min_length[5]|max_length[12]|is_unique[users.login]',
                                             ['required'=>'You have not filled %s.',
                                              'is_unique' => 'Value %s already exists.',
                                              'min_length' => 'Login should have from 5 to 12 characters',
                                              'max_length' => 'Login should have from 5 to 12 characters']);
            $this->form_validation->set_rules('birthday', 'Birthday', 'required',
                                             ['required'=>'You have not filled %s.']);

            $array = array(
                'name' => $this->input->post('name'),
                'lastname' => $this->input->post('lastname'),
                'login' => $this->input->post('login'),
                'birthday' => $this->input->post('birthday')
            );

            if ($this->form_validation->run() == true) 
            {
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2048;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('imagepath'))
                {
                    $data = ['error' => $this->upload->display_errors()];
                    $this->load->view('form_insert_user', $data);
                }
                else
                {
                    $upload_data = $this->upload->data(); 
                    $file_name = $upload_data['file_name'];
                    $array['imagepath'] = $file_name;                    
                    $this->home_model->addData('users', $array);
                    $this->load->helper('url');
                    redirect('home/users');
                }
            } 
            else
            {                
                $this->load->view('form_insert_user');
            }           
        }
    }


}

?>