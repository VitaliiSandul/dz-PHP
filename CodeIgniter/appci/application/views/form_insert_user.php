<?php

    $this->load->view('header');

    echo '<span style="color:red;margin-left: 20px;">';
    echo validation_errors();
    echo '</span>';
    
    $st['class'] = 'form-horizontal';
    echo form_open_multipart('home/registration',$st);

    echo '<div class="row" style="margin:2px;">';
    echo form_label('Enter your name: ','name', 
                    ['class'=>'control-label col-md-3']);
    $data = ['name' => 'name', 'size' => '50', 'class' => '', 'value' => set_value('name')];
    echo form_input($data);
    echo '</div>';

    echo '<div class="row" style="margin:2px;">';
    echo form_label('Enter your lastname: ','lastname', 
                    ['class'=>'control-label col-md-3']);
    $data = ['name' => 'lastname', 'size' => '50', 'class' => '', 'value' => set_value('lastname')];
    echo form_input($data);
    echo '</div>';

    echo '<div class="row" style="margin:2px;">';
    echo form_label('Enter your login: ','login', 
                    ['class'=>'control-label col-md-3']);
    $data = ['name' => 'login', 'size' => '50', 'class' => '', 'value' => set_value('login')];
    echo form_input($data);
    echo '</div>';

    echo '<div class="row" style="margin:2px;">';
    echo form_label('Enter your birthday: ','birthday', 
                    ['class'=>'control-label col-md-3']);
    $data = ['name' => 'birthday', 'size' => '50', 'class' => '', 'value' => set_value('birthday'), 'type'=>'date'];
    echo form_input($data);
    echo '</div>';

    echo '<div class="row" style="margin:2px;">';
    echo form_label('Choose photo: ','imagepath', 
                    ['class'=>'control-label col-md-3']);
    $data = ['name' => 'imagepath', 'size' => '50', 'class' => '', 'value' => set_value('imagepath'), 'type'=>'file'];
    echo form_upload($data);
    echo '</div>';

    echo '<div class="row" style="margin:2px;">';
    echo form_submit(['class'=>'btn btn-success col-md-offset-4', 'name' => 'send', 'value' => 'Register']);
                    
    echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-info']);
    echo '</div>';

    echo form_close();

    $this->load->view('footer');
?>