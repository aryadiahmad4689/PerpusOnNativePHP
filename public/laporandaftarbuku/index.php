<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: ../Auth/login.php");
	exit;
}
require '../../function/PeminjamanController.php';
$sql = "SELECT p.kode_buku, b.judul, p.tanggal_peminjaman,a.nama FROM peminjaman p join buku b on p.kode_buku =b.kode_buku join daftar_anggota a on p.kode_anggota=a.kode_anggota";
$peminjaman = query($sql);

?>

<?php
require_once '../template/header.php'
?>

  <div class="container">
    <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">Kode Buku</th>
        <th scope="col">Judul</th>
        <th scope="col">Tanggal Peminjaman</th>
        <th scope="col">Nama Angggota</th>

      </tr>
    </thead>
    <tbody>
    <?php
    foreach($peminjaman as $b) :?>
      <tr>
        <th><?php echo $b['kode_buku']; ?></th>
        <td><?php echo $b['judul']; ?></td>
        <td><?php echo $b['tanggal_peminjaman']; ?></td>
        <td><?php echo $b['nama']; ?></td>
      </tr>
      <?php endforeach ?>
      </tbody>
  </table>


</div>


<?php
require_once '../template/footer.php'
?>




