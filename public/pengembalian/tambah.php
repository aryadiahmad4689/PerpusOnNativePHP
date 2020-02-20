<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}
require '../../function/PengembalianController.php';
$peminjaman = query("SELECT * FROM peminjaman");


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
    <label for="nama_anggota">Kode Peminjaman</label>
    <select id="inputState" name="kode" class="form-control kdPeminjaman" required>
    <option>Choose...</option>
    <?php
        foreach ($peminjaman as $b) : ?>
        <option value="<?= $b['kode_peminjaman']?>" data-id="<?= $b['tanggal_peminjaman'];?>"><?= $b['kode_peminjaman']?></option>
        <?php endforeach?>
    </select>
   </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="judu_buku">Tanggal Pengembalian</label>
    <input type="date" class="form-control tglPengembalian" id="judul_buku" name="tanggal" >
  </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="penulis">Denda</label>
    <input type="text" class="form-control" id="penulis" name="denda" placeholder="Masukkan Jumlah Denda">
  </div>
  </div>
 

  
  <button type="submit" class="btn btn-primary" name="tambah">Save Data</button>
</form>

</div>

<script>
const tanggalPeminjaman = new Date(document.querySelector('.kdPeminjaman').value);
const tanggalPengembalian = new Date(document.querySelector('.tglPengembalian').value);
document.querySelector('.kdPeminjaman').addEventListener('click', function(){
  let tanggalPeminjaman =$(this).find(':selected').data('id');
  console.log(tanggalPeminjaman);
})

document.querySelector('.tglPengembalian').addEventListener('change', function(){
  let tanggalPengembalian = document.querySelector('.tglPengembalian');

  console.log(tanggalPengembalian.value);
})


    var timeDiff=0
     if (tanggalPengembalian ) {
            timeDiff = (tanggalPeminjaman - tanggalPengembalian) / 1000;
        }
        console.log(Math.floor(timeDiff/(86400)))
//  $('#selisih').val(Math.floor(timeDiff/(86400))+' Hari')  

</script>

<?php
require_once '../template/footer.php'
?>
