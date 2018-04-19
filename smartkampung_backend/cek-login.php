<?php
session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
	//redirect ke halaman login
	header('http://localhost/smartcity_backend/login.php');
}
?>
