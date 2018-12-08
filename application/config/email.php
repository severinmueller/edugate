<?php
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.sendgrid.net';
$config['smtp_user'] = getenv("SENDGRID_USERNAME");
$config['smtp_password'] = getenv("SENDGRID_PASSWORD");
$config['smtp_port'] = 587;
$config['crlf'] = "\r\n";
$config['newline'] = "\r\n";
