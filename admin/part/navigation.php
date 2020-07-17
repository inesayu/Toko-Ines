<a class="navbar-brand" href="javascript:void(0)">Toko Ines</a>
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navb">
  <!-- Links -->
  <ul class="navbar-nav">
    <!-- Dropdown Master -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Master</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?p=formInputUser.php">Data User</a>
        <a class="dropdown-item" href="index.php?p=formInputBarang.php">Data Barang</a>
      </div>
    </li>
    <!-- Dropdown Transaksi -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Transaksi</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?p=formInputTransaksi.php">Form Transaksi</a>
        <a class="dropdown-item" href="index.php?p=dataTransaksi.php">Data Transaksi</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
  </ul>
  <span class="text-light ml-auto">
    <div style="font-weight:bold">
      <span><?=$_SESSION['namaUser'];?></span>
       | 
      <span id="clock"></span>
    </div>
  </span>
</div>