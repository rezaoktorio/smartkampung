<?php
include('config.php');

//tangkap data dari form
$id = $_POST['idadmin'];
$namaadmin = $_POST['namaadmin'];
$password = $_POST['passwordadmin'];
$alamatadmin = $_POST['alamatadmin'];
$telponadmin = $_POST['telponadmin'];

//update data di database sesuai user_id
$query = mysql_query("update admin set namaadmin='$namaadmin', password='$password', alamatadmin='$alamatadmin', telponadmin='$telponadmin' where idadmin='$id'") or die(mysql_error());

if ($query) {
	header('location:view.php?message=success');
}
?>