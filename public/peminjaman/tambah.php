<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}
require '../../function/PeminjamanController.php';
$buku    =query("SELECT * from buku");
$anggota =query("SELECT * from daftar_anggota");
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


<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="kode_Anggota">Kode Peminjaman</label>
      <input type="text" class="form-control"  name="kode_peminjaman" placeholder="Masukkan Kode Peminjaman" id="kode_anggota">
    </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="nama_anggota">Kode Buku</label>
    <select id="inputState" name="kode_buku" class="form-control" required>
    <option>Choose...</option>
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
    <option>Choose...</option>
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
    <input type="date" class="form-control" name="tanggal">
  </div>
  </div>

  <button type="submit" class="btn btn-primary" name="tambah">Save Data</button>
</form>

</div>



<?php
require_once '../template/footer.php'
?>
