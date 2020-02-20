<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}
require '../../function/AnggotaController.php';
if( isset($_POST["tambah"]) ) {
	if( tambah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			  </script>";
	} else {
		echo "<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
			  </script>";
	}
}
?>

<?php
require_once '../template/header.php'
?>
<div class="container">


<form action="" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="kode_Anggota">Kode Anggota</label>
      <input type="text" class="form-control"  name="kode" placeholder="Masukkan Kode Anggota" id="kode_anggota">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="nama_anggota">Nama Anggota</label>
    <input type="text" class="form-control" id="nama_anggota" name="nama" placeholder="Masukkan Nama Buku">
  </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
  <label for="inputState">State</label>
      <select id="inputState" name="jk" class="form-control">
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
      </select>
  </div>
  </div>
  
  <div class="form-row">
  <div class="form-group col-md-7">
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="ex:Jl.Manuruki Raya Lorong 6">
  </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-3">
    <label for="foto">Photo</label>
    <input type="file" class="form-control" id="foto" name="gambar">
  </div>
  </div>

  <button type="submit" class="btn btn-primary" name="tambah">Save Data</button>
</form>

</div>



<?php
require_once '../template/footer.php'
?>
