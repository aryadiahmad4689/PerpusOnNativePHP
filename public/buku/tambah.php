<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}
require '../../function/BukuController.php';
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
      <label for="kode_buku">Kode Buku</label>
      <input type="text" class="form-control"  name="kode" placeholder="Masukkan Kode Buku" id="kode_buku">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="judu_buku">Judul Buku</label>
    <input type="text" class="form-control" id="judul_buku" name="judul" placeholder="Masukkan Judul Buku">
  </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="penulis">Penulis Buku</label>
    <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Masukkan Judul Buku">
  </div>
  </div>
  
  <div class="form-row">
  <div class="form-group col-md-7">
    <label for="penerbit">Penerbit</label>
    <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="ex:Gramedia">
  </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-2">
    <label for="penerbit">Tahun Terbit</label>
    <input type="text" class="form-control" id="penerbit" name="tahun" placeholder="ex:2019">
  </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-3">
    <label for="penerbit">Gambar</label>
    <input type="file" class="form-control" id="penerbit" name="gambar">
  </div>
  </div>

  <button type="submit" class="btn btn-primary" name="tambah">Save Data</button>
</form>

</div>



<?php
require_once '../template/footer.php'
?>
