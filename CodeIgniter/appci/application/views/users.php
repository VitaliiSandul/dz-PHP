<?php

$this->load->view('header');

echo '<h1>List of Users</h1>';

echo '<table class="table table-striped">';

echo '<tr>';
    echo '<th>Id</th>';
    echo '<th>Photo</th>';
    echo '<th>Name</th>';
    echo '<th>Lastname</th>';
    echo '<th>Login</th>';
    echo '<th>Birthday</th>';
echo '</tr>';

foreach ($users as $user)
{
    echo '<tr>';
    echo '<td>' . $user['id'] . '</td>';
    echo '<td> <img src="'; 
    echo base_url('assets/images/' . $user['imagepath']);
    echo '" alt="" width="100" height="100"></td>';
    echo '<td>' . $user['name'] . '</td>';
    echo '<td>' . $user['lastname'] . '</td>';
    echo '<td>' . $user['login'] . '</td>';
    echo '<td>' . date("d-m-Y",strtotime($user['birthday'])) . '</td>';
    echo '</tr>';
}

echo '</table>';

$this->load->view('footer');

?>