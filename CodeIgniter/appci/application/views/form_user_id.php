<?php

    $this->load->view('header');

    $data['class'] = 'form-horizontal';
    $data['accept-charset'] = 'utf8';
    echo form_open('home/getUserInfo', $data);
    echo "<div class='col-md-offset-4'>";
    
    echo form_label('Select user', '',['class'=>'control-label']);

    echo '<select name="userid">';

    foreach ($list as $l)
    {
        echo '<option value='.$l['id'].'>';
        echo $l['login'];
        echo '</option>';
    }

    echo '</select>';
    echo form_submit(['name' => 'send', 'value' => 'OK',
    'class' => 'btn btn-sm btn-success col-sm-2']);


    echo "</div>";
    echo form_close();

    $this->load->view('footer');
?>