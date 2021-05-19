<?php
$db = mysqli_connect('localhost', 'root', '', 'convertedcodes');
if (mysqli_connect_errno()) {
    echo 'connection failed: ' . mysqli_connect_error();
    die();
}