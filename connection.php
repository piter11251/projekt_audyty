<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    $dbname = 'test2';

    if(!$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname)){
        die("Nie udało się połączyć");
    }