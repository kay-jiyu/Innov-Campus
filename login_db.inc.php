<?php

$host = 'localhost';
$user = '';
$password = '';
$db = 'innov_campus';

$con = mysqli_connect($host, $user, $password, $db) or die("Message d'erreur : " . mysqli_connect_error());
