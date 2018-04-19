<?php
    $server = "mysql.hostinger.co.id";
    $username = "u573987905_admin";
    $password = "Pumi0xVNmnKp";
    $database = "u573987905_smart";
    mysql_connect($server,$username,$password) or die("Koneksi gagal");
    mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
