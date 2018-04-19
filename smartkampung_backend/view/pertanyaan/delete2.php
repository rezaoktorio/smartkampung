<?php
//panggil file config.php untuk menghubung ke server
$server = "mysql.hostinger.co.id";
$username = 'u156760488_admin';
$password = "gmdw66ZmXBMY";
$database = 'u156760488_smart';

// Create connection
$conn = new mysqli($server, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//tangkap data dari form
$id = $_GET['id'];

//simpan data ke database
$sql = "DELETE FROM kampung;";
$sql .= "ALTER TABLE kampung AUTO_INCREMENT = 1";

if ($conn->multi_query($sql) === TRUE) {
		header('location:index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
