<?php

    $this->load->view('header');

    if (isset($error))
    {
        echo '<div style="color:red;">' . $error . '</div>';
    }
    else if (isset($result))
    {
        echo '<div style="color:green;">' . $result . '</div>';
    }


    $st['class'] = 'form-horizontal';
    echo form_open_multipart('home/selectPhoto', $st);
    echo '<div class="col-md-offset-3">';
    echo form_label('Select photo','image',['class' => 'control-label']);
    echo form_upload('image', ['class' => 'control-label']);
    echo form_submit(['name' => 'send', 'value' => 'OK', 'class' => 'btn btn-success']);
    echo '</div>';
    echo form_close();

    $this->load->view('footer');



?>