<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter App</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>"/>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">                
                <li>
                    <a href="<?php echo site_url('home/index');?>">
                        Index
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('home/users');?>">
                        Users
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('home/getUserInfo'); ?>">
                        Get User Info
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('home/selectPhoto'); ?>">
                        Upload image
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('home/registration'); ?>">
                        Registration
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    
