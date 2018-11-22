<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">ciBlog</a>
        </div>
        <div id="navbar">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url();?>">Home</a> </li>
                <li><a href="<?php echo base_url()?>about">About</a> </li>
            </ul>
        </div>
    </div>


</nav>

<h1><?php echo $title; ?></h1>