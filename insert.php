<?php
//panggil file config.php untuk menghubung ke server
//host yang digunakan
//99,9% tidak perlu dirubah
$host = 'localhost'; 
 
//username untuk login ke host
//biasanya didapatkan pada email konfirmasi order hosting
$user = 'root'; 
 
//jika menggunakan PC sendiri sebagai host,
//secara default password dikosongkan
$pass = '';
 
//isikan nama database sesuai database
//yang dibuat pada langkah-1
$dbname = 'smartcity';
 
//mengubung ke host
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
 
//memilih database yang akan digunakan
$dbselect = mysql_select_db($dbname);

//tangkap data dari form
$nopengisi = $_POST['nopengisi'];
$namapengisi = $_POST['namapengisi'];
$alamatpengisi = $_POST['alamatpengisi'];
$kampungpengisi = $_POST['kampungpengisi'];
$telponpengisi = $_POST['telponpengisi'];

//simpan data ke database
$query = mysql_query("insert into pengisi values('','$nopengisi','$namapengisi','$alamatpengisi','$kampungpengisi','$telponpengisi')") or die(mysql_error());

if ($query) {
	header('location:view.php?message=insert');
}
?>