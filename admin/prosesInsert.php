<?php
require_once "../koneksi.php";
$nama = $_POST['namaUser'];
$email = $_POST['emailUser'];
$password = md5($_POST['passwordUser']);

$sql = "INSERT INTO tb_users VALUES(null,'$nama','$email','$password')";

if($conn->query($sql)===TRUE){
	echo "<script>alert('Data berhasil dimasukkan')</script>";
	echo "<script>window.location.assign('index.php?p=formInputUser.php')</script>";
}else{
	echo "<script>alert('Data gagal dimasukkan $conn->error')</script>";
	echo "<script>window.location.assign('index.php?p=formInputUser.php')</script>";
}
?>