<?php

    $this->load->view('header');
    echo "<div class='col-md-offset-1'>";
    echo '<h2>' . $title . '</h2>';
    echo '<h3> NAME: ' . $user[0]['name'] . '</h3>';
    echo '<h3> LASTNAME: ' . $user[0]['lastname'] . '</h3>';
    echo '<h3> LOGIN: ' . $user[0]['login'] . '</h3>';
    echo '<h3> BIRTHDAY: ' . date("d-m-Y",strtotime($user[0]['birthday'])) . '</h3>';

?>
    <a href="<?php echo site_url('home/selectPhoto'); ?>">
                        Choose photo
    </a>

<?php
    echo "</div>";

?>