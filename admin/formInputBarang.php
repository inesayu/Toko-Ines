<?php
require_once "../koneksi.php";
?>
<h3 class="text-center mb-5">FORM INPUT DATA BARANG</h3>
<form action="prosesInsertBarang.php" method="post">
  <div class="form-group row">
    <label class="control-label col-sm-3">Nama Barang :</label>
    <div class="col-sm-9">
      <input type="text" class="form-control w-100" id="namaBarang" name="namaBarang" placeholder="Masukkan Nama Barang" autocomplete="off" required="">
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-sm-3">Satuan Barang :</label>
    <div class="col-sm-9">
      <input type="text" class="form-control w-100" id="satuanBarang" name="satuanBarang" placeholder="Masukkan Satuan Barang" autocomplete="off" required="">
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-sm-3">Harga Barang :</label>
    <div class="col-sm-9">
      <input type="number" class="form-control w-100" id="hargaBarang" name="hargaBarang" placeholder="Masukkan Harga Barang" autocomplete="off" required="">
    </div>
  </div>
  <button type="submit" class="btn btn-secondary form-control">Simpan</button>
</form>
<!-- Tabel Data -->
<table class="table table-bordered table-hover mt-4">
  <thead class="thead-dark">
    <tr>
      <th>No.</th>
      <th>Nama Barang</th>
      <th>Satuan Barang</th>
      <th>Harga Barang</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      //Jika $_GET['q'] ada isinya
      if(isset($_GET['q'])){
        //yang dijalankan jika ada isinya
        $q = $_GET['q'];
        $sql = "SELECT * FROM tb_barang WHERE nama_barang LIKE '%$q%'";
      }else{
        //Jika $_GET['q'] tidak ada isinya
        $sql = "SELECT * FROM tb_barang";
      }
              
      $result = $conn->query($sql);

      if($result->num_rows > 0){
        //Akan dijalankan jika recordnya terisi
        while($row = $result->fetch_assoc()){ ?>
          <tr>
            <td><?=$row['id_barang']?></td>
            <td><?=$row['nama_barang']?></td>
            <td><?=$row['satuan_barang']?></td>
            <td><?=$row['harga_barang']?></td>
            <td>
              <a onclick="return confirm('Anda yakin akan menghapus record ini?')" title="Hapus" class="btn btn-danger" href="prosesDeleteBarang.php?id=<?=$row['id_barang']?>">Delete</a>
              <a title="Edit" class="btn btn-primary" href="" onclick="showUpdateForm('<?=$row['id_barang']?>', '<?=$row['nama_barang']?>', '<?=$row['satuan_barang']?>', '<?=$row['harga_barang']?>')" data-toggle="modal" data-target="#exampleModal">Update</a>
            </td>
          </tr>
        <?php
        }
      }else{
        //Akan dijalankan jika record tidak ada, kosong
        echo "<tr><td colspan='5'> Record masih kosong</td></tr>";
      }
    ?>
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM UPDATE DATA USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="prosesUpdateBarang.php" method="post">
          <div class="form-inline">
            <div class="col-12 col-md-3">
              <label for="idBarang">Id Barang:</label>
            </div>
            <div class="col-12 col-md-8">
              <input type="number" class="form-control w-100" id="modal-id-barang" name="idBarang" readonly>
            </div>
          </div><br>
          <div class="form-inline">
            <div class="col-12 col-md-3">
              <label for="namaBarang">Nama Barang:</label>
            </div>
            <div class="col-12 col-md-8">
              <input type="text" class="form-control w-100" id="modal-nama-barang" name="namaBarang" placeholder="Masukkan Nama Barang" autocomplete="off" required="">
            </div>
          </div><br>
          <div class="form-inline">
            <div class="col-12 col-md-3">
              <label for="satuanBarang">Satuan Barang:</label>
            </div>
            <div class="col-12 col-md-8">
              <input type="text" class="form-control w-100" id="modal-satuan-barang" name="satuanBarang" placeholder="Masukkan Satuan Barang" autocomplete="off" required="">
            </div>
          </div><br>
          <div class="form-inline">
            <div class="col-12 col-md-3">
              <label for="hargaBarang">Harga Barang:</label>
            </div>
            <div class="col-12 col-md-8">
              <input type="number" class="form-control w-100" id="modal-harga-barang" name="hargaBarang" placeholder="Masukkan Harga Barang" autocomplete="off" required="">
            </div>
          </div><br>
          <button type="submit" class="btn btn-secondary form-control" value="update">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  //Fungsi untuk menampilkan nilai pada form update
  function showUpdateForm(id,nama,satuan,harga){
    //document.getElementById adalah cara pada js DOM untuk mengambil elemen pada halaman HTML
    document.getElementById('modal-id-barang').value = id;
    document.getElementById('modal-nama-barang').value = nama;
    document.getElementById('modal-satuan-barang').value = satuan;
    document.getElementById('modal-harga-barang').value = harga;
  }
</script>