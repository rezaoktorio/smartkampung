<?php
//lanjutkan session yang sudah dibuat sebelumnya
session_start();

//hapus session yang sudah dibuat
session_destroy();

//redirect ke halaman login
header('http://smartcity.webplussolution.com/smartcity_backend/view/admin/');
?>