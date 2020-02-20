<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}
require '../../function/AnggotaController.php';
$id = $_GET["id"];
$anggota = query("SELECT * FROM daftar_anggota WHERE kode_anggota = $id")[0];

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
<input type="hidden" class="form-control" name="gambar_lama" value="<?= $anggota['foto']; ?>"  id="kode_buku">

  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="kode_Anggota">Kode Anggota</label>
      <input type="text" class="form-control"  name="kode" readonly value="<?= $anggota['kode_anggota'];?>" id="kode_anggota">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="nama_anggota">Nama Anggota</label>
    <input type="text" class="form-control" id="nama_anggota" name="nama" value="<?= $anggota['nama'];?>" >
  </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
  <input type="hidden" name="jk_lama" value="<?= $anggota['jk'] ?>">
  <label for="inputState">State</label>
      <select id="inputState" name="jk" class="form-control">
       <option value="">Choose...</option>
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
      </select>
  </div>
  </div>
  
  <div class="form-row">
  <div class="form-group col-md-7">
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $anggota['alamat'];?>" placeholder="ex:Jl.Manuruki Raya Lorong 6">
  </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-3">
  <img src="<?= $baseURL; ?>/img/<?= $anggota['foto'] ?>" alt="" width="80px" height="80px">
    <label for="foto">Photo</label>
    <input type="file" class="form-control" id="foto" name="gambar">
  </div>
  </div>

  <button type="submit" class="btn btn-primary" name="ubah">Save Data</button>
</form>

</div>



<?php
require_once '../template/footer.php'
?>
