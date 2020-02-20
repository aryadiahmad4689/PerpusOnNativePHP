
<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}
require '../../function/PengembalianController.php';

$id = $_GET["id"];
$pengembalian = query("SELECT * FROM pengembalian WHERE kode_peminjaman = $id")[0];
$peminjaman = query("SELECT * FROM peminjaman");


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


<form action="" method="post" >


<div class="form-row">
  <div class="form-group col-md-6">
    <label for="nama_anggota">Kode Peminjaman</label>
    <select id="inputState" name="kode" class="form-control" required>
    <option  value="<?= $pengembalian['kode_peminjaman'];  ?>"><?= $pengembalian['kode_peminjaman'];  ?></option>
        <?php
        foreach ($peminjaman as $b) : ?>
        <option value="<?= $b['kode_peminjaman']?>"><?= $b['kode_peminjaman']?></option>
        <?php endforeach?>
    </select>
   </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="judu_buku">Tanggal Pengembalian</label>
    <input type="date" class="form-control" id="judul_buku" name="tanggal" value="<?= $pengembalian['tanggal_pengembalian'];  ?>" >
  </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="penulis">Denda</label>
    <input type="text" class="form-control" id="penulis" name="denda" placeholder="Masukkan Jumlah Denda" value="<?= $pengembalian['denda'];  ?>">
  </div>
  </div>
 

  <button type="submit" class="btn btn-primary" name="ubah">Save Data</button>
</form>

</div>


<?php
require_once '../template/footer.php'
?>