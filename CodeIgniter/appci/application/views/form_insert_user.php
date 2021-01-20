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
?>

<?php echo form_open_multipart('home/addUser') ?>

    <div class="form-group">
        <label for="name">Name: </label>
        <input type="text" name="name">
    </div>

    <div class="form-group">
        <label for="lastname">Lastname: </label>
        <input type="text" name="lastname">
    </div>

    <div class="form-group">
        <label for="login">Login: </label>
        <input type="text" name="login">
    </div>

    <div class="form-group">
        <label for="birthday">Birthday: </label>         
        <input type="date" name="birthday" value="<?php date('y-m-d') ?>">     
    </div>


    <div class="form-group">
        <label for="imagepath">Choose photo</label>
        <input name="imagepath" id="fileupload" type="file">
    </div>

    <input type="submit" name="send">

<?php echo form_close() ?>

<?php 
    $this->load->view('footer');
?>