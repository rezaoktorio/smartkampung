<?php 
session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
	//redirect ke halaman login
	header('http://smartcity.webplussolution.com/smartcity_backend/view/admin/login.php');
}
?>