<?php
session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}

require '../../function/DendaController.php';



$denda = query("SELECT * FROM pengaturan_denda")[0];

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

?>

<?php
require_once '../template/header.php'
?>
  

  <div class="container">
  <h1>Pengaturan Denda</h1>
  <form action="" method="post">
<div class="form-group col-md-4">
    <label for="exampleInputEmail1">Batas Waktu</label>
    <input type="text" class="form-control" name="batasWaktu" value="<?= $denda['batas_waktu']?>" required >
  </div>

  <div class="form-group col-md-4">
    <label for="exampleInputPassword1">Jumlah Denda</label>
    <input type="text" name="denda"  class="form-control" value="<?= $denda['denda']?>" required>
  </div>
  <button type="submit" class="btn btn-warning ml-3" name="ubah">Ubah Pengaturan</button>
	
</form>

</div>

   <?php
require_once '../template/footer.php'
?>