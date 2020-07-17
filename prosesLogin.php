<?php
require_once "koneksi.php";
$username=$_POST['username'];
$password=md5($_POST['password']);

$sql = "SELECT * FROM tb_users WHERE nama_user='$username' AND password_user='$password'";

//jalankan query
$result = $conn->query($sql);

//tampilkan hasil query
if($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
    	session_start();
    	$_SESSION['statusLogin'] = 1;
    	$_SESSION['idUser'] = $row['id_user'];
    	$_SESSION['namaUser'] = $row['nama_user'];
    }
    header("location:admin");
}else{
    echo "<script>alert('Username atau Password Salah, ulangi kembali')</script>";
    echo "<script>window.location.assign('index.php')</script>";
}
?>