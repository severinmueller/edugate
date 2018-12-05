<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css");?>">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-light py-1">
    <a class="navbar-brand py-1" href="/"><img src=<?php echo base_url("assets/images/edugate-schrift.png");?> alt="edugate" height="80"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSuspportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if($this->uri->uri_string() == '') { echo 'active'; }?> py-1" >
                <a class="nav-link py-1" href="<?php echo base_url();?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'about') { echo 'active'; }?> py-1">
                <a class="nav-link py-1" href="<?php echo base_url();?>about">About </a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'posts') { echo 'active'; }?> py-1">
                <a class="nav-link py-1" href="<?php echo base_url();?>posts">Posts </a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'categories') { echo 'active'; }?> py-1">
                <a class="nav-link py-1" href="<?php echo base_url();?>categories">Categories </a>
            </li>
            <?php if(!$this->session->userdata('logged_in')) : ?>
            <li class="nav-item <?php if($this->uri->uri_string() == 'users/register') { echo 'active'; }?> py-1">
                <a class="nav-link py-1" href="<?php echo base_url();?>users/register">Register </a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'users/login') { echo 'active'; }?> py-1">
                <a class="nav-link py-1" href="<?php echo base_url();?>users/login">Login </a>
            </li>
            <?php endif; ?>

            <?php if($this->session->userdata('logged_in')) : ?>
            <li class="nav-item <?php if($this->uri->uri_string() == 'users/logout') { echo 'active'; }?> py-1">
                <a class="nav-link py-1" href="<?php echo base_url();?>users/logout">Logout </a>
            </li>
            <?php endif; ?>
        </ul>

        <?php if($this->session->userdata('logged_in')) : ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php if($this->uri->uri_string() == 'posts/create') { echo 'active'; }?> py-1">
                <a class="nav-link py-1" href="<?php echo base_url();?>posts/create">Create post </a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'categories/create') { echo 'active'; }?> py-1">
                <a class="nav-link py-1" href="<?php echo base_url();?>categories/create">Create category </a>
            </li>
        </ul>
        <?php endif; ?>

    </div>
</nav>

<div class="container">
    <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success" role="alert">'.$this->session->flashdata('user_registered').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<p class="alert alert-success" role="alert">'.$this->session->flashdata('post_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<p class="alert alert-success" role="alert">'.$this->session->flashdata('post_updated').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_logged_in')): ?>
        <?php echo '<p class="alert alert-success" role="alert">'.$this->session->flashdata('user_logged_in').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_login_failed')): ?>
        <?php echo '<p class="alert alert-alarm" role="alert">'.$this->session->flashdata('user_login_failed').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_logged_out')): ?>
        <?php echo '<p class="alert alert-success" role="alert">'.$this->session->flashdata('user_logged_out').'</p>'; ?>
    <?php endif; ?>



    <?php  echo phpversion() ?>


