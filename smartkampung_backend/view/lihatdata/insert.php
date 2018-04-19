<?php
//panggil file config.php untuk menghubung ke server
include('config.php');

//tangkap data dari form
$namaadmin = $_POST['namaadmin'];
$password = $_POST['passwordadmin'];
$alamatadmin = $_POST['alamatadmin'];
$telponadmin = $_POST['telponadmin'];

//simpan data ke database
$query = mysql_query("insert into admin values('', '$namaadmin', '$password', '$alamatadmin', '$telponadmin', '".date('Y-m-d')."')") or die(mysql_error());

if ($query) {
	header('location:view.php?message=insert');
}
?>