<?php
require_once "../koneksi.php";
?>
<h3 class="text-center mb-5">FORM INPUT DATA USER</h3>
<form action="prosesInsert.php" method="post">
  <div class="form-group row">
    <label class="control-label col-sm-3">Nama User :</label>
    <div class="col-sm-9">
      <input type="text" class="form-control w-100" id="namaUser" name="namaUser" placeholder="Masukkan Nama" autocomplete="off" required="">
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-sm-3">Email User :</label>
    <div class="col-sm-9">
      <input type="email" class="form-control w-100" id="emailUser" name="emailUser" placeholder="Masukkan Email" autocomplete="off" required="">
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-sm-3">Password User :</label>
    <div class="col-sm-9">
      <input type="password" class="form-control w-100" id="passwordUser" name="passwordUser" placeholder="Masukkan Password" autocomplete="off" required="">
    </div>
  </div>
  <button type="submit" class="btn btn-secondary form-control">Simpan</button>
</form>
<!-- Tabel Data -->
<table class="table table-bordered table-hover mt-4">
  <thead class="thead-dark">
    <tr>
      <th>No.</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      //Jika $_GET['q'] ada isinya
      if(isset($_GET['q'])){
        //yang dijalankan jika ada isinya
        $q = $_GET['q'];
        $sql = "SELECT * FROM tb_users WHERE nama_user LIKE '%$q%'";
      }else{
        //Jika $_GET['q'] tidak ada isinya
        $sql = "SELECT * FROM tb_users";
      }

      $result = $conn->query($sql);

      if($result->num_rows > 0){
        //Akan dijalankan jika recordnya terisi
        while($row = $result->fetch_assoc()){
    ?>
        <tr>
          <td><?=$row['id_user']?></td>
          <td><?=$row['nama_user']?></td>
          <td><?=$row['email_user']?></td>
          <td>
            <a onclick="return confirm('Anda yakin akan menghapus record ini?')" title="Hapus" class="btn btn-danger" href="prosesDeleteUser.php?id=<?=$row['id_user']?>">Delete</a>
            <a title="Edit" class="btn btn-primary" href="" onclick="showUpdateForm('<?=$row['id_user']?>', '<?=$row['nama_user']?>', '<?=$row['email_user']?>')" data-toggle="modal" data-target="#exampleModal">Update</a>
          </td>
        </tr>
    <?php
        }
      }else{
        //Akan dijalankan jika record tidak ada, kosong
        echo "<tr><td colspan='4'> Record masih kosong</td></tr>";
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
        <form action="prosesUpdateUser.php" method="post">
          <div class="form-inline">
            <div class="col-12 col-md-3">
              <label for="idUser">Id User:</label>
            </div>
            <div class="col-12 col-md-8">
              <input type="number" class="form-control w-100" id="modal-id-user" name="idUser" readonly>
            </div>
          </div><br>
          <div class="form-inline">
            <div class="col-12 col-md-3">
              <label for="namaUser">Nama User:</label>
            </div>
            <div class="col-12 col-md-8">
              <input type="text" class="form-control w-100" id="modal-nama-user" name="namaUser" placeholder="Masukkan Nama" autocomplete="off" required="">
            </div>
          </div><br>
          <div class="form-inline">
            <div class="col-12 col-md-3">
              <label for="emailUser">Email User:</label>
            </div>
            <div class="col-12 col-md-8">
              <input type="email" class="form-control w-100" id="modal-email-user" name="emailUser" placeholder="Masukkan Email" autocomplete="off" required="">
            </div>
          </div><br>
          <div class="form-inline">
            <div class="col-12 col-md-3">
              <label for="passwordUser">Password User:</label>
            </div>
            <div class="col-12 col-md-8">
              <input type="password" class="form-control w-100" id="modal-password-user" name="passwordUser" placeholder="Masukkan Password" autocomplete="off" required="">
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
  function showUpdateForm(id,nama,email,password){
    //document.getElementById adalah cara pada js DOM untuk mengambil elemen pada halaman HTML
    document.getElementById('modal-id-user').value = id;
    document.getElementById('modal-nama-user').value = nama;
    document.getElementById('modal-email-user').value = email;
    document.getElementById('modal-password-user').value = password;
  }
</script>