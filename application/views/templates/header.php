<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light py-1">
    <a class="navbar-brand py-1" href="/"><img src=<?php echo base_url("assets/images/edugate-schrift.png");?> alt="edugate" height="80"></a>

    <div class="collapse navbar-collapse" id="navbarSuspportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if($this->uri->uri_string() == '') { echo 'active'; }?> py-1" >
                <a class="nav-link py-1" href="<?php echo base_url();?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'about') { echo 'active'; }?> py-1">
                <a class="nav-link py-1" href="<?php echo base_url();?>about">About </a>
            </li>
        </ul>
    </div>
</nav>







