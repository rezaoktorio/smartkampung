<?php
//host yang digunakan
//99,9% tidak perlu dirubah
$host = 'mysql.hostinger.co.id';

//username untuk login ke host
//biasanya didapatkan pada email konfirmasi order hosting
$user = 'u156760488_admin';

//jika menggunakan PC sendiri sebagai host,
//secara default password dikosongkan
$pass = 'eoWFjOYK0SdwBd';

//isikan nama database sesuai database
//yang dibuat pada langkah-1
$dbname = 'u156760488_smart';

//mengubung ke host
$connect = mysqli_connect($host, $user, $pass) or die(mysql_error());

//memilih database yang akan digunakan
$dbselect = mysqli_select_db($koneksi, $dbname);
?>
