<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/main.css");?>">
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon-32x32.png');?>"/>
</head>
<body class="is-preload">
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <div class="inner">

            <!-- Logo -->
            <a href="<?php echo base_url();?>" class="logo">
                <img src="<?php echo base_url('assets/images/edugate-schrift.png'); ?>" alt="logo" height="125" />
            </a>

            <!-- Nav -->
            <nav>
                <ul>
                    <li><a href="#menu">Menu</a></li>
                </ul>
            </nav>

        </div>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <h2>Menu</h2>
        <ul>
            <li><a href="<?php echo base_url();?>">Kategorien</a></li>
            <li><a href="<?php echo base_url();?>courses">Alle Kurse</a></li>
            <li><a href="<?php echo base_url();?>users/login">Anmelden</a></li>
            <li><a href="<?php echo base_url();?>users/register">Registrieren</a></li>

            <?php if($this->session->userdata('logged_in')) : ?>
                <li><a href="<?php echo base_url();?>courses/create">Kurs erstellen</a></li>
                <li><a href="<?php echo base_url();?>courses/manage">Kurse verwalten</a></li>
                <li><a href="<?php echo base_url();?>users/logout">Abmelden</a></li>
            <?php endif; ?>

        </ul>
    </nav>

    <div id="main">
        <div class="inner">

        <div class="container">
    <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success" role="alert">'.$this->session->flashdata('user_registered').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('course_created')): ?>
        <?php echo '<p class="alert alert-success" role="alert">'.$this->session->flashdata('course_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('course_updated')): ?>
        <?php echo '<p class="alert alert-success" role="alert">'.$this->session->flashdata('course_updated').'</p>'; ?>
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
</div>

