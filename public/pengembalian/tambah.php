<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}
require '../../function/PengembalianController.php';
$peminjaman = query("SELECT * FROM peminjaman");
$denda = query("SELECT batas_waktu, denda from pengaturan_denda")[0];



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



<form action="" method="post" >



<div class="form-row">
  <div class="form-group col-md-6">
    <label for="judu_buku">Tanggal Pengembalian</label>
    <input type="date" class="form-control tglPengembalian" id="judul_buku" name="tanggal" >
  </div>
  </div>
  
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="nama_anggota">Kode Peminjaman</label>
    <select id="inputState" name="kode" class="form-control kdPeminjaman" required>
    <!-- <option>Choose...</option> -->
    <?php
        foreach ($peminjaman as $b) : ?>
        <option value="<?= $b['kode_peminjaman']?>" data-id="<?= $b['tanggal_peminjaman'];?>"><?= $b['kode_peminjaman']?></option>
        <?php endforeach?>
    </select>
   </div>
  </div>

  

  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="penulis">Denda</label>
    <input type="text" class="form-control" readonly id="jumlahDenda" name="denda" placeholder="Masukkan Jumlah Denda">
  </div>
  </div>
 

  
  <button type="submit" class="btn btn-primary" name="tambah">Save Data</button>
</form>

</div>

<script>
// var d1 = document.querySelector('.kdPeminjaman').value;
// var d2 = document.querySelector('.tglPengembalian').value;
document.querySelector('.kdPeminjaman').addEventListener('change', function(){
  let d1 =new Date($(this).find(':selected').data('id'));
 
  let d2 = new Date(document.querySelector('.tglPengembalian').value);
 

  // console.log(tanggalPengembalian.value);
 let selisih  =Math.round((d2-d1)/86400000);

 if (selisih > <?= $denda['batas_waktu']?>){
    document.querySelector('#jumlahDenda').value = <?= $denda['denda']?>
 }else{
  document.querySelector('#jumlahDenda').value = 0;
   
 }


})

 
</script>

<?php
require_once '../template/footer.php'
?>
