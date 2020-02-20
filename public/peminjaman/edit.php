<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}
require '../../function/PeminjamanController.php';
$id = $_GET["id"];
$peminjaman = query("SELECT * FROM peminjaman WHERE kode_peminjaman = $id")[0];

$buku    =query("SELECT * from buku");
$anggota =query("SELECT * from daftar_anggota");

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


<form action="" method="post">

  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="kode_Anggota">Kode Peminjaman</label>
      <input type="text" class="form-control" value="<?= $peminjaman['kode_peminjaman'] ?>" name="kode_peminjaman" readonly  id="kode_peminjaman">
    </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="nama_anggota">Kode Buku</label>
    <select id="inputState" name="kode_buku" class="form-control" required>
    <option  value="<?= $peminjaman['kode_buku'];  ?>"><?= $peminjaman['kode_buku'];  ?></option>
        <?php
        foreach ($buku as $b) : ?>
        <option value="<?= $b['kode_buku']?>"><?= $b['kode_buku']?></option>
        <?php endforeach?>
    </select>
   </div>
  </div>


  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="nama_anggota">Kode Anggota</label>
    <select id="inputState" name="kode_anggota" class="form-control" required>
    <option value="<?= $peminjaman['kode_anggota'];  ?>"><?= $peminjaman['kode_anggota'];  ?></option>
    <?php
        foreach ($anggota as $b) : ?>
        <option value="<?= $b['kode_anggota']?>"><?= $b['kode_anggota']?></option>
        <?php endforeach?>
    </select>
   </div>
  </div>

  
  <div class="form-row">
  <div class="form-group col-md-2">
    <label for="alamat">Tanggal Peminjaman</label>
    <input type="date" class="form-control" name="tanggal" value="<?= $peminjaman['tanggal_peminjaman']?>">
  </div>
  </div>

  <button type="submit" class="btn btn-primary" name="ubah">Save Data</button>
</form>


</div>



<?php
require_once '../template/footer.php'
?>
