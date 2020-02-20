
<?php

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}
require '../../function/BukuController.php';

$id = $_GET["id"];
$buku = query("SELECT * FROM buku WHERE kode_buku = $id")[0];


if( isset($_POST["ubah"]) ) {
	if( ubah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			  </script>";
	} else {
		echo "<script>
				alert('data gagal diubah!');
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

      <input type="hidden" class="form-control"name="gambar_lama" value="<?= $buku['gambar']; ?>"  name="gambar_lama" id="kode_buku">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-3">
      <input type="hidden" class="form-control" value="<?= $buku['kode_buku']; ?>"  name="kode" id="kode_buku">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="judu_buku">Judul Buku</label>
    <input type="text" class="form-control" id="judul_buku" value="<?= $buku['judul']; ?>" name="judul" placeholder="Masukkan Judul Buku">
  </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="penulis">Penulis Buku</label>
    <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $buku['penulis']; ?>">
  </div>
  </div>
  
  <div class="form-row">
  <div class="form-group col-md-7">
    <label for="penerbit">Penerbit</label>
    <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $buku['penerbit']; ?>">
  </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-2">
    <label for="penerbit">Tahun Terbit</label>
    <input type="text" class="form-control" id="penerbit" name="tahun" value="<?= $buku['tahun_terbit']; ?>">
  </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-3">
  <img src="<?= $baseURL; ?>/img/<?= $buku['gambar'] ?>" alt="" width="80px" height="80px">
    <label for="gambar">Gambar</label>
    <input type="file" class="form-control" id="gambar" name="gambar">
  </div>
  </div>

  <button type="submit" class="btn btn-primary" name="ubah">Save Data</button>
</form>

</div>


<?php
require_once '../template/footer.php'
?>