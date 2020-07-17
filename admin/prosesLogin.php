<?php
require_once "../koneksi.php";
$username=$_POST['username'];
$password=md5($_POST['password']);

$sql = "SELECT nama_user, password_user FROM tb_users WHERE nama_user='$username' AND password_user='$password'";

//jalankan query
$result = $conn->query($sql);

//tampilkan hasil query
if($result->num_rows > 0){
    echo "<script>alert('Selamat Datang $username. Anda Berhasil Login.')</script>";
    echo "<script>window.location.assign('index.php?p=formInputUser.php')</script>";
}else{
    echo "<script>alert('Anda tidak berhak masuk sistem')</script>";
    echo "<script>window.location.assign('index.php?p=formLoginUser.php')</script>";
}
?>