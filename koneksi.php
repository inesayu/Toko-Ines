<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "db_toko_ines";

//Create connection
$conn = new mysqli($serverName, $userName, $password, $dbName);
//Check connection
if ($conn->connect_error) {
	die("Koneksi Gagal");
}
?>