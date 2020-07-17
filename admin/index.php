<?php
  require_once "../koneksi.php";

  session_start();
  if($_SESSION['statusLogin']!=1){
    header("location:../index.php");
  }
  if(isset($_GET['p'])){
    $page = $_GET['p'];
  }else{
    $page = "part/beranda.php";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Toko Ines</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body>
  <div class="container shadow">
    <!-- HEADER -->
    <div style="margin-bottom:0">
      <?php include_once('part/header.php');?>
    </div>
    <!-- NAVIGATION -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
        <?php include_once('part/navigation.php');?>
    </nav>
    <div class="row" style="margin-top:30px; margin-bottom:30px">
      <!-- CONTENT -->
      <div class="col-md-9">
        <?php include_once($page);?>
      </div>
      <!-- BANNER -->
      <div class="col-md-3">
        <?php include_once('part/banner.php');?>
      </div>
    </div>
    <!-- FOOTER -->
    <div class="bg-dark p-2 text-light text-center">
      <?php include_once('part/footer.php');?>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../assets/js/jquery-3.5.1.js"></script><!-- jquery harus di atas -->
  <script src="../assets/js/popper.min.js"></script> <!-- bootstrap 4 pakai poper -->
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/myScript.js"></script>
</body>
</html>